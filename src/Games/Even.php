<?php

/**
 * Namespace for Brain\Games\Even
 *
 * @category None
 * @package  None
 * @author   Sunchea <sunchea.qomo@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     None
 */

namespace Brain\Games\Even;

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
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $count = 0;
    do {
        $random = rand(1, 25);
        $isCorrectAnswer = question($random);
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
 * Function even($num)
 *
 * @param int $num check number
 *
 * @return bool
 */
function even(int $num): bool
{
    return ($num % 2 === 0) ? true : false;
}

/**
 * Function question($random)
 *
 * @param int $random random number
 *
 * @return bool
 */
function question(int $random): bool
{
    line("Question: %s", $random);
    $answer = prompt('Your answer');

    if (even($random) && $answer === 'yes') {
        line("Correct!");
        return true;
    }

    if (!even($random) && $answer === 'no') {
        line("Correct!");
        return true;
    }

    out("'%s' is wrong answer ;(. ", $answer);
    line("Correct answer was '%s'.", (even($random)) ? 'yes' : 'no');

    return false;
}
