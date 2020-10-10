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

    <div class="container text-center">
        <br>
        <div class="form-submit" style="height:20%;"><?PHP echo 'Batch: ' . $user->batch; ?></div>

        <br>
        <?php
        // @todo This can't be right
        $rows = $databaseUtility->queryRows("SELECT `cid`,`cname` FROM `cnroll` where `batch`='" . $user->batch . "'");
        if ($rows && count($rows) > 0) {
            foreach ($rows as $row) {
                echo '<button type="button" class="btn btn-warning goto" data="0,course.php?cid=' . $row->cid . '" style="width:90%;margin:10px">' . $row->sid . '</button>';
            }
        }
        ?>
    </div>

    <?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
