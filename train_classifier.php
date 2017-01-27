<?php

require_once __DIR__ . '/vendor/autoload.php';

use Camspiers\StatisticalClassifier\Classifier\ComplementNaiveBayes;
use Camspiers\StatisticalClassifier\DataSource\DataArray;

$source = new DataArray();

function redact($row) {
    return $row['sex'] . " "
        . $row['age'] . " "
        . $row['class'] . " ";
}

$training_db = new \Condense\Database('passengers_training');
$data = $training_db->select();
foreach ($data as $row) {
    $source->addDocument($row['survived'] == 0 ? 'died' : 'survived', $row['class']);
}

$classifier = new ComplementNaiveBayes($source);

$testing_db = new \Condense\Database('passengers_testing');
$data = $testing_db->select();
$correct = 0;
$incorrect = 0;
foreach ($data as $row) {
    $ss = $classifier->classify($row['class']);
    if ($ss == 'died' && $row['survived'] == 0) {
        $correct++;
    } else {
        $incorrect++;
    }
}

echo $correct . '/' . ($correct + $incorrect);
