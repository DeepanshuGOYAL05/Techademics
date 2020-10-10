<?php
require_once('../src/bootstrap.php');

if (isset($_SESSION['table']) && $_SESSION['table'] !== 'teachr') {
    header("Location: /");
    exit();
}

$databaseUtility = \App\Utility\DatabaseUtility::getInstance();
$sessionUtility = \App\Utility\SessionUtility::getInstance();
$user = $sessionUtility->getUser();

$cid = isset($_POST['cid']) ? $_POST['cid'] : 0;
if ($cid > 0) {
    $courses = $databaseUtility->queryRows("SELECT `cname` FROM `course` where `id`=" . $cid . ' LIMIT 1');
    if ($courses && count($courses) > 0) {
        $course = $courses[0];

        $cnrolls = $databaseUtility->queryRows("SELECT `batch` FROM `cnroll` where `cid`=" . $cid . ' LIMIT 1');
        if ($cnrolls && count($cnrolls) > 0) {
            $cnroll = $cnrolls[0];

            if (
                $databaseUtility->query("INSERT INTO `cwork` (`tid`,`cid`,`title`,`url`) VALUES ('" . $user->id . "','" . $cid . "','" . $_POST['title'] . "','" . $_POST['url'] . "');")
                && $databaseUtility->query("INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`,`batch`) VALUES ('" . $user->id . "','" . $_SESSION['name'] . "','<a href=" . $_POST['url'] . " >Professor " . $_SESSION['name'] . " added " . $_POST['title'] . " to the coursework on " . $course->cname . " </a>',CURDATE() + INTERVAL 5 DAY,'" . $cnroll->batch . "');")
            ) {
                header("Location: index.php");
                exit();
            }
        }
    }
}
echo 'Something goes wrong';