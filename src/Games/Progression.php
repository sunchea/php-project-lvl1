<?php

/**
 * Namespace for Brain\Games\Progression
 *
 * @category None
 * @package  None
 * @author   Sunchea <sunchea.qomo@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     None
 */

namespace Brain\Games\Progression;

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
    line('What number is missing in the progression?');

    $count = 0;
    do {
        $randomResult = [];

        $randomStart = rand(1, 9);
        $randomStep = rand(2, 7);
        $randomStop = rand(8, 10);
        $randomPosition = rand(0, $randomStop - 1);

        $randomSalt = rand(1, 3);

        if ($randomPosition !== 0) {
            $randomResult[] = $randomStart + $randomSalt;
        } elseif ($randomPosition === 0) {
            $randomResult[] = '..';
            $resQuestion = $randomStart + $randomSalt;
        }

        for ($i = 1; $i < $randomStop; $i += 1) {
            if ($i !== $randomPosition) {
                $randomResult[] = $randomStart + $i * $randomStep + $randomSalt;
            } elseif ($i === $randomPosition) {
                $randomResult[] = '..';
                $resQuestion = $randomStart + $i * $randomStep + $randomSalt;
            }
        }

        $strQuestion = implode(" ", $randomResult);

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
