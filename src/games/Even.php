<?php

namespace src\games\Even;

use function src\Cli\answer;
use function src\Cli\question;

const YES_ANSWER_VARIANT = ['yes', 'y', 'yep', 'да', 'д', 'конечно', 'тупой вопрос конечно, да'];
const NO_ANSWER_VARIANT = ['no', 'n', 'nope', 'нет', 'н', 'нет конечно', 'тупой вопрос конечно, нет'];

function start(string $playerName, int $roundCount): bool
{
    $playerWin = false;
    $score = 0;

    question($playerName, ', Ответе "да", если число чётное, или "нет", если число нечётное');

    while ($score < $roundCount) {
        $randomNumber = rand(1, 100);
        question($randomNumber . ' чётное число?');
        $answer = answer();

        $evnNo = (isEven($randomNumber) && in_array($answer, NO_ANSWER_VARIANT));
        $noEvnYes = (!isEven($randomNumber) && in_array($answer, YES_ANSWER_VARIANT));
        $noEvnNo = (!isEven($randomNumber) && in_array($answer, NO_ANSWER_VARIANT));
        $evnYes = (isEven($randomNumber) && in_array($answer, YES_ANSWER_VARIANT));

        $fail = $evnNo || $noEvnYes;
        $success = $noEvnNo || $evnYes;

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

    if ($score === $roundCount) {
        $playerWin = true;
    }

    return $playerWin;
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
