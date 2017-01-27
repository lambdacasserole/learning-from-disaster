<?php

require_once __DIR__ . '/vendor/autoload.php';

$databases = ['training', 'testing'];
foreach ($databases as $name) {
    // Initialize database, delete it if it exists.
    $db = new \Condense\Database('passengers_' . $name);
    $db->delete();

    // Load entries from JSON.
    $entries = json_decode(file_get_contents(__DIR__ . '/data/db_' . $name . '.json'));

    // Insert each entry into database.
    foreach ($entries as $entry) {
        $db->insert($entry);
    }
}
