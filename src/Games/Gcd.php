<?php

/**
 * Namespace for Brain\Games\Gcd
 *
 * @category None
 * @package  None
 * @author   Sunchea <sunchea.qomo@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     None
 */

namespace Brain\Games\Gcd;

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
    line('');
    $name = welcomePrompt();
    line('Find the greatest common divisor of given numbers.');

    $count = 0;
    do {
        $randomX = rand(1, 100);
        $randomY = rand(1, 100);

        $strQuestion = "{$randomX} {$randomY}";
        $resQuestion = gmp_gcd($randomX, $randomY);

        $isCorrectAnswer = question($strQuestion, gmp_strval($resQuestion));
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
    $name = prompt('May I have your name', false, '? ', false);
    line("Hello, %s!", $name);

    return $name;
}

/**
 * Function question($strQuestion, $resQuestion)
 *
 * @param string $strQuestion show string
 * @param string $resQuestion check string
 *
 * @return bool
 */
function question(string $strQuestion, string $resQuestion): bool
{
    line("Question: %s", $strQuestion);
    $answer = prompt('Your answer');

    if (intval($answer) === intval($resQuestion)) {
        line("Correct!");
        return true;
    }

    out("'%s' is wrong answer ;(. ", $answer);
    line("Correct answer was '%d'.", $resQuestion);

    return false;
}
