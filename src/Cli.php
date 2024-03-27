<?php

namespace src\Cli;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function gameSelector(): string
{
    $menu = array(
        'even' => 'Игра на угадывание четного/нечетного',
        'calc' => 'Калькулятор',
        'quit' => 'Выход',
    );

    $choice = '';

    while (true) {
        $choice = \cli\menu($menu, null, 'Выбирите игру');
        \cli\line();
        break;
    }

    return $choice;
}

function answer(): string
{
    return prompt('Your answer');
}

function question(string $message): void
{
    line($message);
}
