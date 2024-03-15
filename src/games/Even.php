<?php
namespace src\games\Even;

use function src\Cli\answer;
use function src\Cli\question;

const YES_ANSWER_VARIANT = ['yes', 'y', 'yep', 'да', 'д', 'конечно', 'тупой вопрос конечно, да'];
const NO_ANSWER_VARIANT = ['no', 'n', 'nope', 'нет', 'н', 'нет конечно', 'тупой вопрос конечно, нет'];

function start($playerName)
{
    $playerWin = false;
    $score = 0;
    question($playerName , ', Ответе "да", если число чётное, или "нет", если число нечётное');
    while ($score < 3) {
        $randomNumber = rand(1, 100);
        question($randomNumber . ' чётное число?');
        $answer = answer();
        
        $fail = (isEven($randomNumber) && in_array($answer, NO_ANSWER_VARIANT)) || (!isEven($randomNumber) && in_array($answer, YES_ANSWER_VARIANT));
        $success = (!isEven($randomNumber) && in_array($answer, NO_ANSWER_VARIANT)) || (isEven($randomNumber) && in_array($answer, YES_ANSWER_VARIANT));

        if ($success) {
            $score++;
            question('Это правильный ответ!');
        }    

        if ($fail) {
            question('Ответ не верный, Вы проиграли(');
            $playerWin = false;
            break;
        } 
    }

    if ($score === 3) {
        $playerWin = true;
    }

    return $playerWin;
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}