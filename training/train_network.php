<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Brainy\NeuralNetwork;
use Condense\Database;
use LearningFromDisaster\Console;
use LearningFromDisaster\Training;

// Load training database.
$training_db = new Database('training');
$training_data = $training_db->select();
$training_data_size = count($training_data);

// Initialize network, turn verbose output off.
$network = new NeuralNetwork(5, 6, 1);

// Add training data.
$message_length = 0;
$row_number = 1;
foreach ($training_data as $row) {
    Console::erase($message_length); // Remove previous message.
    $message_length = Console::countAndPrint("Adding row $row_number of $training_data_size");
    $network->addTrainingData(Training::quantify($row), [intval($row['survived'])]);
    $row_number++;
}
echo "\nFinished adding training data.\n";

// Try to train network.
$max_training_rounds = 3;
$current_training_round = 0;
$success = false;
while (!$success && ++$current_training_round < $max_training_rounds) {
    $success = $network->train(500, 0.4);
	if (!$success) {
		echo "No success in training round $current_training_round...\n";
	}
}

// Check for success.
if ($success) {
    $epochs = $network->getEpoch();
	echo "Network successfully trained in $epochs epochs.\n";
} else {
    echo "Failed to train network, aborting.\n";
    die();
}

// Load testing data.
$testing_db = new Database('testing');
$testing_data = $testing_db->select();

// Test network on other half of data.
$total = 0;
$correct = 0;
foreach($testing_data as $row) {
    $certainty = $network->calculate(Training::quantify($row));
    $answer = $certainty[0] < 0.5 ? 0 : 1;
    if ($answer == intval($row['survived'])) {
        $correct++;
    }
    $total++;
}

// Print result
$percentage = round(($correct / $total) * 100);
echo "Network guessed correctly in $correct/$total cases ($percentage%)\n";

// Save network.
$network->save(__DIR__ . '/../network.nn');
