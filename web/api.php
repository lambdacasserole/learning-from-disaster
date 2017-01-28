<?php

require_once __DIR__ . '/../neural.php';
require_once __DIR__ . '/../training/functions.php';

/**
 * Returns true if all given keys are set in the get super-global.
 *
 * @param array $keys   the keys to check
 * @return bool         true if all keys were set, otherwise false
 */
function allSet($keys) {
    $present = true;
    foreach ($keys as $key) {
        $present = $present && isset($_GET[$key]);
    }
    return $present;
}

// Check required fields have been supplied.
if (allSet(['sex', 'age', 'class'])) {

    // Initialize neural network.
    $network = new NeuralNetwork(5, 6, 1);
    $network->setVerbose(false);

    // Load pre-trained network.
    $network->load(__DIR__ . '/../network.nn');
    $result = $network->calculate(quantify([
        'sex' => $_GET['sex'],
        'age' => $_GET['age'],
        'class' => $_GET['class']
    ]));

    // Result.
    echo json_encode([
        'probability' => $result[0],
    ]);
} else {

    // Some fields not supplied.
    echo json_encode([
        'message' => 'Some required fields were not supplied.'
    ]);
}