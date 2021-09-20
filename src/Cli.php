<?php
/**
 * Namespace for function welcomePrompt()
 */
namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Function welcomePrompt()
 */
function welcomePrompt()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
