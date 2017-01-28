<?php

/**
 * Expands a cabin class number to an array of binary inputs.
 *
 * @param int $class    the class number to expand
 * @return array        an array of binary inputs
 */
function expandClass($class) {
    return [
        [1, 0, 0],
        [0, 1, 0],
        [0, 0, 1]
    ][$class - 1];
}

/**
 * Expands a sex to a binary input.
 *
 * @param string $sex   the sex to expand
 * @return array        the binary input
 */
function expandSex($sex) {
    return [
        $sex == 'male' ? 0 : 1
    ];
}

/**
 * Expands an age to a binary input, adult or child
 *
 * @param int $age  the age to expand
 * @return array    the binary input
 */
function expandAge($age) {
    return [
        $age > 17 ? 1 : 0
    ];
}

/**
 * Quantifies a data row into numbers for input into the neural network training data set.
 *
 * @param array $row    the data row to quantify
 * @return array        the quantified data row
 */
function quantify($row) {
    return array_merge(
        expandAge($row['age']),
        expandSex($row['sex']),
        expandClass($row['class'])
    );
}

/**
 * Prints a message and returns its length.
 *
 * @param string $msg   the message to print
 * @return int          the length of the printed message
 */
function countAndPrint($msg) {
    echo $msg;
    return strlen($msg);
}

/**
 * Erases the given number of characters on the command line.
 *
 * @param int $count    the number of characters to erase
 */
function erase($count) {
    for ($i = 0; $i < $count; $i++) {
        echo chr(8); // Echo a backspace.
    }
}
