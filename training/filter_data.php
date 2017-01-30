<?php

// Load database from JSON.
$input_path = __DIR__ . '/../data/data.json';
$raw = file_get_contents($input_path);
$database = json_decode($raw, true);

echo "Loaded raw data from '$input_path'.\n";
echo "Filtering...\n";

// Filter out any rows with unset fields.
$filtered = [];
foreach ($database as $row) {
    $add = true;
    foreach ($row as $column) {
        if ($column === "") {
            $add = false;
        }
    }
    if ($add) {
        $filtered[] = $row;
    }
}

// Output filtered data.
$output_path = __DIR__ . '/../data/data_filtered.json';
file_put_contents($output_path, json_encode($filtered));

echo "Saved filtered data to '$output_path'.\n";
