<?php
require_once('../src/bootstrap.php');

if (isset($_SESSION['table']) && $_SESSION['table'] !== 'stud') {
    header("Location: /");
    exit();
}

$databaseUtility = \App\Utility\DatabaseUtility::getInstance();
$sessionUtility = \App\Utility\SessionUtility::getInstance();
$user = $sessionUtility->getUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php \App\Utility\WebsiteUtility::renderHeader('My Courses'); ?>
</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>
<?php
$cid = isset($_GET['cid']) ? (int)$_GET['cid'] : 0;

$course = null;
$teacher = null;
$rows = $databaseUtility->queryRows("SELECT `cname`,`tid` FROM `course` where `id`=" . $cid . " LIMIT 1;");
if ($rows && count($rows) > 0) {
    $course = $rows[0];

    $rows = $databaseUtility->queryRows("SELECT `tname` FROM `teachr` where `id`=" .$course->tid . " LIMIT 1;");
    if ($rows && count($rows) > 0) {
        $teacher = $rows[0];
    }
}

if ($course && $teacher) {
    ?>
    <div class="container text-center">
        <br>
        <div class="panel-heading" style="color:white">Professor: <?PHP echo $teacher->tname ?></div>
        <br><br><br>
        <div class="panel panel-primary">
            <div class="panel-heading" style="background:black; color:white;"><h3><?PHP echo $course->cname ?></h3></div>
            <div class="panel-body">

                <?php
                $rows = $databaseUtility->queryRows("SELECT `title`,`descr`,`url` FROM `cwork` where `cid`=" . $cid . " ORDER BY `id` DESC");
                if ($rows && count($rows) === 0) {
                    foreach ($rows as $row) {
                        echo '<a type="button" target="_blank" href="' . $row->tid . '" class="btn btn-success goto" style="width:90%;margin:10px; height:45px;"><h4>' . $row->id . '</h4>' . $row->cid . '</a>';
                    }
                }
                ?></div>
        </div>
        <br><br<br>
    </div>
    <?php
} else {
    ?>
    <div class="alert alert-danger" role="alert">
        Not found
    </div>
    <?php
}
?>
<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
