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
namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Function welcomePrompt()
 * 
 * @return void
 */
function welcomePrompt()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
