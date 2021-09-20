<?php
/**
 * Namespace for function welcomePrompt()
 * @category none
 * @package none
 * @author Sunchea
 * @license none
 * @link none 
 */
namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Function welcomePrompt()
 * @return void
 */
function welcomePrompt()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
