<?php

namespace src\Cli;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Добро пожаловать в "Игры разума"!');
    $name = prompt('Как Вас зовут?');
    line("Привет, %s!", $name);

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
    return prompt('Ваш ответ:');
}

function question(string $message): void
{
    line($message);
}
