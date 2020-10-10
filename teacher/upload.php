<?php
require_once('../src/bootstrap.php');

if (isset($_SESSION['table']) && $_SESSION['table'] !== 'teachr') {
    header("Location: /");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php \App\Utility\WebsiteUtility::renderHeader('Upload'); ?>
</head>

<body>
    <?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12" id="head">Techademics</div>
        </div>
        Hi, !
        <div class="row">
            <div class="col-sm-12"></div>
        </div>
        <div class="row">
            <div class="col-sm-12"></div>
        </div>
    </div>

    <?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
