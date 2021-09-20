<?php

/**
 * Namespace for function welcomePrompt()
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

/**
 * Function runGame()
 *
 * @return void
 */
function runGame(): void
{
    $name = welcomePrompt();

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
 * Function welcomePrompt()
 *
 * @return $name
 */
function welcomePrompt(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
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
    line('Answer "yes" if the number is even, otherwise answer "no".');
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
