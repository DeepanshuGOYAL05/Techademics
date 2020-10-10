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
    <?php \App\Utility\WebsiteUtility::renderHeader('Teacher'); ?>
    <script>
        $(document).ready(function () {
            $(".nowr").click(function () {
                alert('This function is not available yet.');
            });
            $(".btn").click(function () {
                $("#success").fadeOut();
            });

            $("#ptabtn").click(function () {
                $("html, body").animate({scrollTop: $(document).height()}, 1000);
            });
        });
    </script>
</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-sm-12" id="head"></div>
    </div>
    <br><br>
    <?php
    $batch = '';
    $rows = $databaseUtility->queryRows("SELECT `batch` FROM `cnroll` where `cid`=" . $_POST['cid'] . ' LIMIT 1');
    if ($rows && count($rows) > 0) {
        $row = $rows[0];
        $batch = $row->batch;
    }

    $success = [];
    $error = [];
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'newBatch') {
            if ($databaseUtility->query("INSERT INTO `abatches` (`name`) VALUES ('" . $_POST['batchname'] . "');")) {
                $success[] = 'New Batch Created!';
            } else {
                $error[] = 'New Batch not created!';
            }
        } elseif ($_GET['action'] == 'createdNewCourse') {
            $success[] = 'New Course Created!';
        } elseif ($_GET['action'] == 'holiday') {
            if (
                $databaseUtility->query("INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`) VALUES ('" . $user->id . "','" . $_SESSION['name'] . "','<span class=imp>" . $_POST['hdate'] . " has been declared a holiday!</span>','" . $_POST['hdate'] . "');")
                && $databaseUtility->query("INSERT INTO `days` (`date`,`type`,`tid`) VALUES ('" . $_POST['hdate'] . "','2','" . $user->id . "');")
            ) {
                $success[] = 'Holiday added!';
            } else {
                $error[] = 'Holiday not added!';
            }
        } elseif ($_GET['action'] == 'addClass') {
            if (
                $databaseUtility->query("INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`,`batch`) VALUES ('" . $user->id . "','" . $_SESSION['name'] . "','There is a class by Prof. " . $_SESSION['name'] . " on " . $_POST['cdate'] . " ','" . $_POST['cdate'] . "','" . $batch . "');")
                && $databaseUtility->query("INSERT INTO `days` (`date`,`type`,`tid`,`cid`) VALUES ('" . $_POST['cdate'] . "','1','" . $user->id . "','" . $_POST['cid'] . "');")
            ) {
                $success[] = 'Class added!';
            } else {
                $error[] = 'Class not added!';
            }
        } elseif ($_GET['action'] == 'ptm') {
            if (
                $databaseUtility->query("INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`) VALUES ('" . $user->id . "','" . $_SESSION['name'] . "','<span class=imp>There is parent teacher meet with Prof. " . $_SESSION['name'] . " on " . $_POST['pdate'] . " </span>','" . $_POST['pdate'] . "');")
                && $databaseUtility->query("INSERT INTO `days` (`date`,`type`,`tid`) VALUES ('" . $_POST['pdate'] . "','4','" . $user->id . "');")
            ) {
                $success[] = 'Pta added!';
            } else {
                $error[] = 'Pta not added!';
            }
        } elseif ($_GET['action'] == 'addAssign') {
            if (
                $databaseUtility->query("INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`) VALUES ('" . $user->id . "','" . $_SESSION['name'] . "','There will be an " . $_POST['aaname'] . " exam of " . $_POST['maxmarks'] . " marks on " . $_SESSION['name'] . " on " . $_POST['aadate'] . " ','" . $_POST['aadate'] . "');")
                && $databaseUtility->query("INSERT INTO `days` (`date`,`type`,`tid`,`cid`) VALUES ('" . $_POST['aadate'] . "','3','" . $user->id . "','" . $_POST['cid'] . "');")
                && $databaseUtility->query("INSERT INTO `tests` (`cid`,`tid`,`name`,`date`,`maxmarks`,`batch`) VALUES ('" . $_POST['cid'] . "','" . $user->id . "','" . $_POST['aaname'] . "','" . $_POST['aadate'] . "','" . $_POST['maxmarks'] . "','" . $_POST['abatch'] . "');")
            ) {
                $success[] = 'Assessment added!';
            } else {
                $error[] = 'Assessment not added!';
            }
        }
    }

    if (count($error) > 0) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo implode('<br>', $error);?>
        </div>
        <?php
    }
    if (count($success) > 0) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo implode('<br>', $success);?>
        </div>
        <?php
    }
    $courses = $databaseUtility->queryRows("SELECT * FROM `course` where `tid`=" . $user->id);
    ?>
    <div class="bgvd inner">
        <div class="row">
            <div class="col-sm-12"><br><br>
                <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#newBatch"
                        style="width:90%">Create a new batch
                </button>

                <div id="newBatch" class="collapse">
                    <div class="form-group">
                        <form method="post" action="index.php?action=newBatch">
                            <label for="usr"><h3>Name of batch:</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="batchname"
                                   id="batchname" autocomplete="off">
                            <br>
                            <input type="submit" value="Create!" class="btn btn-success" style="width:80%">
                        </form>
                    </div>
                </div>
                <br><br>
                <button type="button" class="btn btn-warning goto" style="width:90%" data="1,newCourse.php">Create
                    new course
                </button>
                <br><br>

                <button type="button" class="btn btn-success" style="width:90%" data-toggle="collapse"
                        data-target="#cwork">Upload Coursework
                </button>
                <br>
                <div id="cwork" class="collapse">
                    <div class="form-group">
                        <form method="post" action="addcw.php">
                            <label for="usr"><h3>Select course:</h3></label>
                            <br>
                            <?php
                            if ($courses && count($courses) > 0) {
                                echo '<select style="width:80%; height: 60%;" class="form-control" name="cid">';
                                foreach ($courses as $course) {
                                    echo '<option value="' . $course->id . '">' . $course->cname . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                            <br><label for="usr"><h3>Title:</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="title" id="title"
                                   autocomplete="off">
                            <label for="usr"><h3>url:</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="url" id="url"
                                   autocomplete="off"><br>
                            <input type="submit" value="Update!" class="btn btn-success" style="width:80%">
                        </form>
                    </div>
                </div>
                <br>
                <hr class="hr1">
                <br>
                <button type="button" class="btn btn-info" style="width:90%" data-toggle="collapse"
                        data-target="#viewC">View courses
                </button>
                <br><br><!-- Add students option in this plus create new course -->
                <div id="viewC" class="collapse">
                    <ul>
                        <?php
                        if ($courses && count($courses) > 0) {
                            foreach ($courses as $course) {
                                echo '<li>' . $course->cname . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addClass"
                        style="width:90%">Schedule a class
                </button>
                <div id="addClass" class="collapse">
                    <div class="form-group">
                        <form method="post" action="index.php?action=addClass">
                            <label for="hdate"><h3>Course:</h3></label>
                            <?php
                            if ($courses && count($courses) > 0) {
                                echo '<select style="width:80%; height: 60%;" class="form-control" name="cid">';
                                foreach ($courses as $course) {
                                    echo '<option value="' . $course->id . '">' . $course->cname . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                            <label for="cdate"><h3>Date(YYYY-MM-DD):</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="cdate" id="cdate"
                                   autocomplete="off">
                            <br>
                            <input type="submit" value="Add a class!" class="btn btn-success" style="width:80%">
                        </form>
                    </div>
                </div>
                <br><br>
                <button type="button" class="btn btn-info goto" style="width:90%"
                        data="1,https://docs.google.com/forms/d/18bLy5n8Hk3VJjNzE7GZAVL5DhfFXynbC85T4ajS_pY4/edit?usp=sharing">
                    Schedule a Quiz
                </button>
                <br><br>

                <hr class="hr1">
                <br>
                <button type="button" class="btn btn-success " style="width:90%" data-toggle="collapse"
                        data-target="#addAssign">Add an assessment
                </button>

                <div id="addAssign" class="collapse">
                    <div class="form-group">
                        <form method="post" action="index.php?action=addAssign">
                            <label for="aaname"><h3>Name of assessment:</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="aaname" id="aaname"
                                   autocomplete="off">
                            <label for="hdate"><h3>Course:</h3></label>
                            <?php
                            if ($courses && count($courses) > 0) {
                                echo '<select style="width:80%; height: 60%;" class="form-control" name="cid">';
                                foreach ($courses as $course) {
                                    echo '<option value="' . $course->id . '">' . $course->cname . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                            <label for="abatch"><h3>Name of batch:</h3></label>
                            <?php
                            $rows = $databaseUtility->queryRows('SELECT * FROM `abatches`');
                            if ($rows && count($rows) > 0) {
                                echo '<select style="width:80%; height: 60%;" class="form-control" name="abatch">';
                                foreach ($rows as $row) {
                                    echo '<option value="' . $row->name . '">' . $row->name . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                            <label for="maxmarks"><h3>Max marks:</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="maxmarks" id="maxmarks"
                                   autocomplete="off">
                            <label for="hdate"><h3>Date(YYYY-MM-DD):</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="aadate" id="aadate"
                                   autocomplete="off">
                            <br>
                            <input type="submit" value="Add!" class="btn btn-success" style="width:80%">
                        </form>
                    </div>
                </div>
                <br><br><!-- notify for dates from here -->
                <button type="button" class="btn btn-info " style="width:90%" data-toggle="collapse"
                        data-target="#viewAssign">View assessments
                </button>
                <br><br>
                <div id="viewAssign" class="collapse">
                    <ul>
                        <?php
                        $rows = $databaseUtility->queryRows("SELECT * FROM `tests` where `tid`=" . $user->id);
                        if ($rows && count($rows) > 0) {
                            foreach ($rows as $row) {
                                echo '<li>' . $row->name . '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div><!-- add marks here -->
                <hr class="hr1">
                <br>
                <!-- <button type="button" class="btn btn-success nowr" style="width:90%" data="1,attend.php">	Add a project</button><br><br> -->


                <button type="button" class="btn btn-warning" style="width:90%" data-toggle="collapse"
                        data-target="#holiday">Declare a holiday
                </button>
                <br>
                <div id="holiday" class="collapse">
                    <div class="form-group">
                        <form method="post" action="index.php?action=holiday">
                            <label for="hdate"><h3>Date(YYYY-MM-DD):</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="hdate" id="hdate"
                                   autocomplete="off">
                            <br>
                            <input type="submit" value="Declare a holiday!" class="btn btn-success"
                                   style="width:80%">
                        </form>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-danger" style="width:90%" data-toggle="collapse" id="ptabtn"
                        data-target="#pta">Call for a PTM
                </button>
                <br><br>
                <div id="pta" class="collapse">
                    <div class="form-group">
                        <form method="post" action="index.php?action=ptm">
                            <label for="pdate"><h3>Date(YYYY-MM-DD):</h3></label>
                            <input type="text" style="width:80%" class="form-control" name="pdate" id="pdate"
                                   autocomplete="off">
                            <br>
                            <input type="submit" value="Notify!" class="btn btn-danger" style="width:80%">
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12"></div>
        </div>
</div>

<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
