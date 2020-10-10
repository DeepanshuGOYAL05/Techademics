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
    <?php \App\Utility\WebsiteUtility::renderHeader('Student'); ?>
</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

<div class="container text-center">
    <br><br>
    <button type="button" class="form-submit goto" style="width:90%; border-color:black;" data-toggle="collapse"
            data-target="#menu">Menu
    </button>
    <br><br>
    <div id="menu" class="collapse">
        <button type="button" class="btn btn-warning goto"
                style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; "
                data="1,myCourses.php"><b>View enrolled Courses</b></button>
        <br>
        <button type="button" class="btn btn-warning goto"
                style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white;"
                data="1,calendar.php"><b>View calendar</b></button>
        <button type="button" class="btn btn-warning "
                style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% );border-color:black; color:white;">
            <b>---View performances</b></button>
        <br>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12"><br>
            <div class="panel panel-info" style="background:#16d8ad">
                <div class="panel-heading" style="background:#000000; color: white;">Bulletin Board</div>
                <div class="panel-body" style="background: white">
                    <?php
                    $rows = $databaseUtility->queryRows("SELECT * FROM `feed` WHERE (exp_date >= CURDATE()) AND (`batch`='" . $user->batch . "' OR `batch`='all') ORDER BY `id` DESC ");
                    if ($rows && count($rows) > 0) {
                        foreach ($rows as $row) {
                            echo '<h4>' . $row->title . '</h4>' . $row->exp_datey;
                            echo '<hr class="hr1">' . 'Due';
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
