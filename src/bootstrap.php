<?php
require_once('Utility/Singleton.php');

require_once('Utility/SessionUtility.php');
require_once('Utility/DatabaseUtility.php');
require_once('Utility/WebsiteUtility.php');

$configDatabase = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'Schooldata',
];

$configDatabase = [
    'host' => 'global-db',
    'username' => 'root',
    'password' => 'root',
    'database' => 'Techademics',
];

$databaseUtility = \App\Utility\DatabaseUtility::getInstance();
$databaseUtility->connect($configDatabase['host'], $configDatabase['username'], $configDatabase['password'], $configDatabase['database']);

$task = isset($_POST['task']) ? $_POST['task'] : '';
$sessionUtility = \App\Utility\SessionUtility::getInstance();
if ($task === 'logout') {
    $sessionUtility->logout();
} else if ($task === 'login') {
    $performLogin = $sessionUtility->performLogin();
} else {
    $sessionUtility->checkSession();
}

