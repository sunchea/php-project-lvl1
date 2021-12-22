<?php

/**
 * Namespace for Brain\Games\Engine
 *
 * @category None
 * @package  None
 * @author   Sunchea <sunchea.qomo@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     None
 */

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * Function welcomePrompt()
 *
 * @return string
 */
function welcomePrompt(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name', '', '? ', false);
    line("Hello, %s!", $name);

    return $name;
}
