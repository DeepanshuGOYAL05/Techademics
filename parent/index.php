<?php
require_once('../src/bootstrap.php');

if (isset($_SESSION['table']) && $_SESSION['table'] !== 'parent') {
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
    <?php \App\Utility\WebsiteUtility::renderHeader('Teacher'); ?>
</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-12" id="head"></div>
    </div>
    <br><br>
    <button type="button" class="form-submit goto" style="width:90%" data-toggle="collapse" data-target="#menu">
        Menu
    </button>
    <br><br>
    <div id="menu" class="collapse">
        <button type="button" class="btn btn-warning " style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; ">
            View enrolled Courses of your Child
        </button>
        <br>
        <button type="button" class="btn btn-warning " style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; ">
            View calendar
        </button>
        <button type="button" class="btn btn-warning " style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; ">
            View performances of your Child
        </button>
        <br>
    </div>

    <br>

    <div class="row">
        <div class="col-sm-12"><br>
            <div class="panel panel-info" style="background:#16d8ad">
                <div class="panel-heading" style="background:#000000; color: white;">Feed</div>
                <div class="panel-body" style="background:white"></div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12"></div>
    </div>
</div>

<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>