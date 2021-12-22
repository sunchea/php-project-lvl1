<?php

/**
 * Namespace for Brain\Games\Prime
 *
 * @category None
 * @package  None
 * @author   Sunchea <sunchea.qomo@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     None
 */

namespace Brain\Games\Prime;

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
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $count = 0;
    do {
        $strQuestion = rand(1, 101);
        $resQuestion = isPrime($strQuestion);

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
 * Function isPrime($num)
 *
 * @param int $num check number
 *
 * @return bool
 */
function isPrime($num)
{
    if ($num === 1) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

/**
 * Function question($strQuestion, $resQuestion)
 *
 * @param string $strQuestion show string
 * @param bool   $resQuestion check bool
 *
 * @return bool
 */
function question(string $strQuestion, bool $resQuestion): bool
{
    line("Question: %s", $strQuestion);
    $answer = prompt('Your answer');

    if ($answer === "yes" && $resQuestion) {
        line("Correct!");
        return true;
    }

    if ($answer === "no" && !$resQuestion) {
        line("Correct!");
        return true;
    }

    out("'%s' is wrong answer ;(. ", $answer);
    line("Correct answer was '%s'.", $resQuestion ? 'yes' : 'no');

    return false;
}
