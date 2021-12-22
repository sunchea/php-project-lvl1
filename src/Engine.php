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
 * @return $name
 */
function welcomePrompt(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name', false, '? ', false);
    line("Hello, %s!", $name);

    return $name;
}
