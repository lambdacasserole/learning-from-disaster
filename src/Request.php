<?php

namespace LearningFromDisaster;

/**
 * Contains useful functions for inspecting the request.
 *
 * @author Saul Johnson <saul.a.johnson@gmail.com>
 * @package LearningFromDisaster
 */
class Request
{
    /**
     * Returns true if all given keys are set in the get super-global.
     *
     * @param array $keys   the keys to check
     * @return bool         true if all keys were set, otherwise false
     */
    public static function allSet($keys) {
        $present = true;
        foreach ($keys as $key) {
            $present = $present && isset($_GET[$key]);
        }
        return $present;
    }
}