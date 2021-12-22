<?php

/**
 * Namespace for Brain\Games\Calc
 *
 * @category None
 * @package  None
 * @author   Sunchea <sunchea.qomo@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     None
 */

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;
use function cli\out;
use function Brain\Games\Engine\welcomePrompt;

/**
 * Function runGame()
 *
 * @return void
 */
function runGame(): void
{
    line('');
    $name = welcomePrompt();
    line('What is the result of the expression?');

    $count = 0;
    do {
        $randomX = rand(1, 25);
        $randomY = rand(1, $randomX);
        $randomOperation = rand(1, 3);
        $strQuestion = '';
        $resQuestion = 0;
        switch ($randomOperation) {
            case 1:
                $strQuestion = "{$randomX} + {$randomY}";
                $resQuestion = $randomX + $randomY;
                break;
            case 2:
                $strQuestion = "{$randomX} - {$randomY}";
                $resQuestion = $randomX - $randomY;
                break;
            case 3:
                $strQuestion = "{$randomX} * {$randomY}";
                $resQuestion = $randomX * $randomY;
                break;
        }
        $isCorrectAnswer = question($strQuestion, $resQuestion);
        if (!$isCorrectAnswer) {
            line("Let's try again, %s!", $name);
        }
        $count++;
    } while ($count < 3 && $isCorrectAnswer);

    if ($isCorrectAnswer) {
        line("Congratulations, %s!", $name);
    }
}

/**
 * Function question($strQuestion, $resQuestion)
 *
 * @param string $strQuestion show string
 * @param int    $resQuestion check number
 *
 * @return bool
 */
function question(string $strQuestion, int $resQuestion): bool
{
    line("Question: %s", $strQuestion);
    $answer = prompt('Your answer');

    if (intval($answer) === $resQuestion) {
        line("Correct!");
        return true;
    }

    out("'%s' is wrong answer ;(. ", $answer);
    line("Correct answer was '%d'.", $resQuestion);

    return false;
}
