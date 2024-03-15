<?php

namespace src\games\Calc;

use function src\Cli\answer;
use function src\Cli\question;

const SIGN = ['-', '+', '*', '/'];

function start(string $playerName, int $roundCount): bool
{
    $playerWin = false;
    $score = 0;

    question($playerName, ', посчитайте и введите результат');

    while ($score < $roundCount) {
        $randFirst = rand(1, 100);
        $randSecond = rand(1, 100);

        $randSign = rand(0, 3);

        question($randFirst . ' ' . SIGN[$randSign] . ' ' . $randSecond);
        $answer = answer();

        $success = (int) $answer === calc($randFirst, $randSecond, $randSign);
        $fail = (int) $answer !== calc($randFirst, $randSecond, $randSign);

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

function calc(int $firstNumber, int $secondNumber, int $sign): int
{
    $result = 0;

    switch ($sign) {
        case 0:
            $result = $firstNumber - $secondNumber;
            break;
        case 1:
            $result = $firstNumber +  $secondNumber;
            break;
        case 2:
            $result = $firstNumber * $secondNumber;
            break;
        case 3:
            $result = $firstNumber / $secondNumber;
            break;
    }

    return $result;
}
