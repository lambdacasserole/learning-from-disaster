<html>
<body>
<?php

/**
 * Returns true if all given keys are set in the request super-global.
 *
 * @param array $keys   the keys to check
 * @return bool         true if all keys were set, otherwise false
 */
function allSet($keys) {
    $present = true;
    foreach ($keys as $key) {
        $present = $present && isset($_REQUEST[$key]);
    }
    return $present;
}

// If all keys set, we have a form submission.
if (allSet(['sex', 'age', 'class'])) {
    require_once __DIR__ . '/../neural.php';
    require_once __DIR__ . '/../training/functions.php';
// Initialize network, turn verbose output off.
    $network = new NeuralNetwork(5, 6, 1);
    $network->setVerbose(false);
    $network->load(__DIR__ . '/../network.nn');
    $gg = $network->calculate(quantify([
        'sex' => $_GET['sex'],
        'age' => $_GET['age'],
        'class' => $_GET['class']
    ]));
    echo $gg[0];
}
?>
<form method="get">
    Age:<input type="text" name="age"><br>
    Sex:<input type="text" name="sex"><br>
    Class:<input type="text" name="class"><br>
    <input type="submit">
</form>
</body>
</html>