<?php

namespace LearningFromDisaster;

/**
 * Contains useful functions for writing to the console.
 *
 * @author Saul Johnson <saul.a.johnson@gmail.com>
 * @package LearningFromDisaster
 */
class Console
{
    /**
     * Prints a message and returns its length.
     *
     * @param string $msg the message to print
     * @return int          the length of the printed message
     */
    public static function countAndPrint($msg)
    {
        echo $msg;
        return strlen($msg);
    }

    /**
     * Erases the given number of characters on the command line.
     *
     * @param int $count the number of characters to erase
     */
    public static function erase($count)
    {
        for ($i = 0; $i < $count; $i++) {
            echo chr(8); // Echo a backspace.
        }
    }
}