<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Condense\Database;

// Names of databases to move.
$databases = ['training', 'testing'];
foreach ($databases as $name) {

    // Initialize database, delete it if it exists.
    $db = new Database($name);
    $db->delete();

    // Load entries from JSON.
    $entries = json_decode(file_get_contents(__DIR__ . '/../data/data_' . $name . '.json'));

    // Insert each entry into database.
    foreach ($entries as $entry) {
        $db->insert($entry);
    }
}
