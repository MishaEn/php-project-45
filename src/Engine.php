<?php

namespace src\Engine;

use function src\Cli\welcome;
use function src\Cli\gameSelector;
use function src\games\Even\start as evenStart;
use function src\games\Calc\start as calcStart;
use function src\Cli\question;

const ROUND_COUNT = 3;

function start(): void
{
    $userName = welcome();
    $selected = gameSelector();

    if ($selected === 'quit') {
        return;
    }

    switch ($selected) {
        case 'even':
            $reuslt = evenStart($userName, ROUND_COUNT);
            break;
        case 'calc':
            $reuslt = calcStart($userName, ROUND_COUNT);
            break;
    }

    if ($reuslt) {
        question('Поздравляю, ' . $userName);
    }

    if (!$reuslt) {
        question('Попробуйте еще раз, ' . $userName);
    }
}
