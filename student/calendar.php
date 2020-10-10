<?php
require_once('../src/bootstrap.php');

if(isset($_SESSION['table']) && $_SESSION['table'] !== 'stud') {
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
    <?php \App\Utility\WebsiteUtility::renderHeader('Student'); ?>
</head>

<body>
    <?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

    <?php
    // @todo This can't be right
    $rows = $databaseUtility->queryRows("SELECT * FROM `stud` where `id`=" . $user->id);
    if ($rows && count($rows) > 0) {
        foreach ($rows as $row) {
            // @todo requested only one item?!
            $sname = $rowe[1];
            $batch = $rowe[5];
        }
    }
    ?>

    <div class="panel-body text-center" style="background:#16d8ad; color: white;">
        <?PHP echo 'This is your marked calendar :)'; ?>
    </div>

    <?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
