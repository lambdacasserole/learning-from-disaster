<?php

// Load database from JSON.
$raw = file_get_contents(__DIR__ . '/../data/data.json');
$database = json_decode($raw, true);

// Randomize entries.
shuffle($database);

// Count number of entries, half it.
$entries = count($database);
$half = floor($entries / 2);

// Divide into two halves, one for training and one for testing.
$training = array_slice($database, 0, $half);
$testing = array_slice($database, $half);

// Write training and testing files.
file_put_contents(__DIR__ . '/../data/data_training.json', json_encode($training));
file_put_contents(__DIR__ . '/../data/data_testing.json', json_encode($testing));
