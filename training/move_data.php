<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LearningFromDisaster\Console;
use Condense\Database;

// Names of databases to move.
$databases = ['training', 'testing'];
foreach ($databases as $name) {

    echo "Creating database '$name'...\n";

    // Initialize database, delete it if it exists.
    $db = new Database($name);
    $db->delete();

    // Load entries from JSON.
    $entries = json_decode(file_get_contents(__DIR__ . '/../data/data_' . $name . '.json'));

    // Insert each entry into database.
    $total = count($entries);
    $current = 1;
    $message_length = 0;
    foreach ($entries as $entry) {
        Console::erase($message_length);
        $message_length = Console::countAndPrint("Inserting row $current/$total...");
        $db->insert($entry);
        $current++;
    }

    echo "\n";
}
