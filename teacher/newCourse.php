<?php
require_once('../src/bootstrap.php');

if (isset($_SESSION['table']) && $_SESSION['table'] !== 'teachr') {
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
    <?php \App\Utility\WebsiteUtility::renderHeader('Add Course'); ?>
</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>
<?php
if (isset($_GET['submit']) && $_GET['submit'] == 'true') {
    $rows = $databaseUtility->queryRows("select `batch` from `stud` group by `batch`;");
    if ($rows && count($rows) > 0) {
        foreach ($rows as $row) {
            echo '<option value="' . $row->batch . '">' . $row->batch . '</option>';
        }
    }

    if ($databaseUtility->query("INSERT INTO `course` (`id`, `cname`, `tid`, `tname`, `nclass`) VALUES (NULL,'" . $_POST['cname'] . "','" . $user->id . "','" . $_SESSION['name'] . "','" . $_POST['date'] . "' );")) {
        $courses = $databaseUtility->queryRows("SELECT `id` from `course` where `cname`='" . $_POST['cname'] . "' LIMIT 1");
        if ($courses && count($courses) > 0) {
            $course = $courses[0];

            if ($databaseUtility->query("INSERT INTO `cnroll` (`cid`, `cname`, `tid`, `tname`, `batch`) VALUES ('" . $course->id . "','" . $_POST['cname'] . "','" . $user->id . "','" . $_SESSION['name'] . "','" . $_POST['batch'] . "' );")) {
                header("Location: index.php?action=createdNewCourse");

                $databaseUtility->query("INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`,`batch`) VALUES ('" . $user->id . "','" . $_SESSION['name'] . "','You have been added to a new course " . $_POST['cname'] . " by instructor " . $_SESSION['name'] . "','" . $_POST['date'] . "','" . $_POST['batch'] . "');");

                $batches = $databaseUtility->queryRows("SELECT `id` from `stud` WHERE `batch`='" . $_POST['batch'] . "' LIMIT 1");
                if ($batches && count($batches) > 0) {
                    foreach ($batches as $batch) {
                        if ($databaseUtility->query("INSERT INTO `cenroll` (`cid`, `sid`, `grade`) VALUES ('" . $course->id . "','" . $batch->id . "','0','" . $_SESSION['name'] . "','" . $_POST['date'] . "' );")) {
                            // header("Location: index.php?action=createdNewCourse");
                            //add to indivisual student not working
                        }
                    }
                }
            }
        }
    }
}
?>
<div class="container text-center">
    <div class="row">
        <div class="col-sm-12" id="head"></div>
    </div>
    <br><br>
    <!--<button type="button" class="form-submit goto" style="width:15%; float:right;" data="0,index.php">Go to Main Menu</button>
    <br><br><br>-->
    <div id="toalter">
        <form method="POST" action="newCourse.php?submit=true">
            <div class="col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading" style="background:black; color:white;">Course Details</div>
                    <div class="panel-body"
                         style="	background-image: linear-gradient(to top, #d299c2 0%, #fef9d7 100%);">
                        <div class="form-group">
                            <label for="usr"><h3>Course name:</h3></label>
                            <input type="text" class="form-control" name="cname" autocomplete="off" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="usr"><h3>Course starts (YYYY-MM-DD):</h3></label>
                            <input type="text" class="form-control" name="date" autocomplete="off" id="date">
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading" style="background:black; color:white;">Add Students</div>
                    <div class="panel-body"
                         style="	background-image: linear-gradient(to top, #d299c2 0%, #fef9d7 100%);">
                        <div class="form-group">
                            <label for="batch"><h4>Add Students of Particular Batch:</h4></label>
                            <select class="form-control" style="height:60%;" name="batch" id="batch">
                                <?php
                                $rows = $databaseUtility->queryRows("select `batch` from `stud` group by `batch`;");
                                if ($rows && count($rows) > 0) {
                                    foreach ($rows as $row) {
                                        echo '<option value="' . $row->batch . '">' . $row->batch . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Create!" class="form-submit goto" style="width:90%">
        </form>
        <br><br><br>
    </div>
    <div class="row">
        <div class="col-sm-12"></div>
    </div>
</div>

<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
