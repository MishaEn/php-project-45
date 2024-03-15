<?php

namespace src\Engine;

use function src\Cli\welcome;
use function src\Cli\gameSelector;
use function src\games\Even\start as evenStart;
use function src\Cli\question;

function start():void
{
    $userName = welcome();
    $selected = gameSelector();

    if ($selected === 'quit') {
        return;
    }

    switch ($selected) {
        case 'even':
            $reuslt = evenStart($userName);
    }

    if ($reuslt) {
        question('Поздравляю, ' . $userName);
    }

    if (!$reuslt) {
        question('Попробуйте еще раз, ' . $userName);
    } 
}