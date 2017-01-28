<?php

namespace LearningFromDisaster;

/**
 * Contains useful functions for training the neural network.
 *
 * @author Saul Johnson <saul.a.johnson@gmail.com>
 * @package LearningFromDisaster
 */
class Training
{
    /**
     * Expands a cabin class number to an array of binary inputs.
     *
     * @param int $class the class number to expand
     * @return array        an array of binary inputs
     */
    public static function expandClass($class)
    {
        return [
            [1, 0, 0],
            [0, 1, 0],
            [0, 0, 1]
        ][$class - 1];
    }

    /**
     * Expands a sex to a binary input.
     *
     * @param string $sex the sex to expand
     * @return array        the binary input
     */
    public static function expandSex($sex)
    {
        return [
            $sex == 'male' ? 0 : 1
        ];
    }

    /**
     * Expands an age to a binary input, adult or child
     *
     * @param int $age the age to expand
     * @return array    the binary input
     */
    public static function expandAge($age)
    {
        return [
            $age > 17 ? 1 : 0
        ];
    }

    /**
     * Quantifies a data row into numbers for input into the neural network training data set.
     *
     * @param array $row the data row to quantify
     * @return array        the quantified data row
     */
    public static function quantify($row)
    {
        return array_merge(
            self::expandAge($row['age']),
            self::expandSex($row['sex']),
            self::expandClass($row['class'])
        );
    }
}