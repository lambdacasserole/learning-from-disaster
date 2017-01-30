<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Brainy\NeuralNetwork;
use LearningFromDisaster\Request;
use LearningFromDisaster\Training;

// Check required fields have been supplied.
if (Request::allSet(['sex', 'age', 'class'])) {

    // Initialize neural network.
    $network = new NeuralNetwork(5, 6, 1);

    // Load pre-trained network.
    $network->load(__DIR__ . '/../network.nn');
    $result = $network->calculate(Training::quantify([
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