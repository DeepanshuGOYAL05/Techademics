<?php
require_once('src/bootstrap.php');

$databaseUtility = \App\Utility\DatabaseUtility::getInstance();
$sessionUtility = \App\Utility\SessionUtility::getInstance();
$user = $sessionUtility->getUser();

if ($user) {
    header("Location: /");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php \App\Utility\WebsiteUtility::renderHeader('Register'); ?>
    <script>
        $(document).ready(function () {
            var myvar = '<div class="container"><center><h1>Account created!</h1><h2>user ID is<br></h2></center></div>';
            var btnvar = '<div class="container"><center><button type="button" class="form-submit goto" style="width:81%" data="0,index.php">Go to login page</button></center></div>';
            <?php
            $con = $databaseUtility->getConnection();

            $errors = [];
            if ($_GET['submit'] == 'true') {
                $work = 0;
                //form validation
                if ($_POST['name'] == null || $_POST['name'] == '') {
                    //code for name missing
                   $errors[] = 'Name cant be blank';
                } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === true) {
                   $errors[] = 'Invalid email';
                } elseif ($_POST['pswd'] == null || $_POST['pswd'] == '') {
                   $errors[] = 'password must be set';
                } elseif ($_POST['type'] == 'p' && !isset($_POST['studid'])) {
                   $errors[] = 'Student ID must be filled for parent account';
                } elseif ($_POST['type'] == 'p' && $_POST['studid'] == '') {
                   $errors[] = 'Student ID must be filled for parent account';
                } elseif ($_POST['pswd'] != $_POST['pswdvar']) {
                   $errors[] = 'passwords are not same';
                } else {
                    //all fine!
                    $work = 1;
                }
                if (count($errors) > 0) {
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("' . implode('<br>', $errors) . '");';
                }

                if ($_POST['type'] == 's') {
                    $query2 = 'SELECT `id` FROM `stud` ORDER BY `id` ASC';
                    //student
                    $sql = "INSERT INTO `stud` (`id`, `sname`, `points`, `email`, `pwd`, `batch`) VALUES (NULL, '" . $_POST['name'] . "', '0', '" . $_POST['email'] . "', '" . $_POST['pswd'] . "','" . $_POST['batch'] . "');";

                } elseif ($_POST['type'] == 't') {
                    $result = $databaseUtility->query('SELECT `teacher_key` FROM `formkeys` LIMIT 1');
                    if ($result !== false) {
                        $row = mysqli_fetch_array($result);
                        if ($row[0] == $_POST['teacherkey']) {
                            $query2 = 'SELECT `id` FROM `teachr`  ORDER BY `id` ASC';
                            $sql = "INSERT INTO `teachr` (`id`, `tname`, `email`, `pwd`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['pswd'] . "');";
                        } else {
                            echo '$("#error_wrap").fadeIn();';
                            echo '$("#error").text("Please enter correct key!");';
                        }
                    }
                } elseif ($_POST['type'] == 'p') {
                    $query2 = 'SELECT `id` FROM `parent`  ORDER BY `id` ASC';
                    $studidsplit = explode('.', $_POST['studid']);
                    if ($result2 = $databaseUtility->query("SELECT `sname` FROM `stud` where `id`=" . $studidsplit[1])) {
                        $num_rows11 = mysqli_num_rows($result2);
                        if ($num_rows11 < 1) {
                            $work = 0;
                            echo '$("#error_wrap").fadeIn();';
                            echo '$("#error").text("Student DNE");';
                        }
                        // Fetch one and one row
                        while ($rowe = mysqli_fetch_row($result2)) {
                            $sname = $rowe[0];
                        }
                    }

                    $sql = "INSERT INTO `parent` (`id`, `pname`, `sid`, `sname`, `email`, `pwd`) VALUES (NULL, '" . $_POST['name'] . "', '" . $studidsplit[1] . "', '" . $sname . "', '" . $_POST['email'] . "', '" . $_POST['pswd'] . "');";
                } else {
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("Invalid account type");';
                    $work = 0;
                }

                if ($work == 1) {
                    // echo'$("#error_wrap").fadeIn();';
                    // 			echo'$("#error").text("valid");';
                    if ($result = $databaseUtility->query($sql)) {

                        if ($result3 = $databaseUtility->query($query2)) {
                            while ($row31 = mysqli_fetch_row($result3)) {
                                $num_rows12 = $row31[0];
                            }

                            echo '$("#mainccontent").html(myvar);';
                            echo '$("#mainccontent").append("' . $_POST['type'] . '"+".' . $num_rows12 . '");';
                            echo '$("#after").append(btnvar);';

                            // Fetch one and one row
                            // while ($row=mysqli_fetch_row($result)) {
                            //       // printf ("%s",$row[0]);
                            //   }

                        }
                    }
                }
            }
            ?>
            $("#acctype").change(function () {
                $("#s_uid").fadeOut();
                $("#ls_uid").fadeOut();
                $("#batchk").fadeOut();
                $("#teacherkeylabel").fadeOut();
                $("#teacherkey").fadeOut();
                if ($("#acctype").val() == 'p') {
                    $("#s_uid").fadeIn();
                    $("#ls_uid").fadeIn();
                } else if ($("#acctype").val() == 's') {
                    $("#batchk").fadeIn();
                } else if ($("#acctype").val() == 't') {
                    $("#teacherkeylabel").fadeIn();
                    $("#teacherkey").fadeIn();
                }
            });

            $("#acctype").blur(function () {
                if ($("#acctype").val() == 'p') {
                    $("#s_uid").fadeIn();
                    $("#ls_uid").fadeIn();
                } else if ($("#acctype").val() == 's') {
                    $("#batchk").fadeIn();
                }
            });
            // $("#email").focus(function(){alert($("#acctype").val());});
        });
    </script>

</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

<div class="container text-center">
    <div class="row">

    </div>
    <br><br><br>

    <div class="row"><!-- register screen-->
        <!--<button type="button" class="form-submit goto" style="width:21%" data="0,index.php">Go to Login page</button>-->
        <div class="panel panel-danger" id="error_wrap">
            <div class="panel-heading" id="error"></div>

        </div>
        <div class="panel panel-primary" id="mainc">
            <div class="panel-heading" style="font-size: 2em">Register</div>
            <div class="panel-body" id="mainccontent">
                <form method="post" action="register.php?submit=true" autocomplete="off">
                    <label for="name"><h3>Name:</h3></label>
                    <input type="text" class="form-input" value="<?php if ($_GET['submit'] == 'true') {
                        echo $_POST['name'];
                    } ?>" id="name" name="name" autocomplete="off" required="true">
                    <label for="acctype"><h3>Account type:</h3></label>
                    <select class="form-input" name="type" id="acctype" required="true">
                        <option value="default">Select Account Type</option>
                        <option value="t">Teacher</option>
                        <option value="s">Student</option>
                        <option value="p">Parent</option>

                    </select>

                    <label for="studid" id="ls_uid"><h3>Enter ward's userid:</h3></label>
                    <input type="text" class="form-input" value="<?php if ($_GET['submit'] == 'true') {
                        echo $_POST['studid'];
                    } ?>" id="s_uid" name="studid">

                    <label for="teacherkey" id="teacherkeylabel"><h3>Enter teacher's key:</h3></label>
                    <input type="text" class="form-input" value="<?php if ($_GET['submit'] == 'true') {
                        echo $_POST['teacherkey'];
                    } ?>" id="teacherkey" name="teacherkey">

                    <select class="form-control" name="batch" id="batchk" style="height:30%;"
                            value="<?php if ($_GET['submit'] == 'true') {
                                echo $_POST['batch'];
                            } ?>">

                        <?php
                        if ($result22 = mysqli_query($con, "SELECT * FROM `abatches` ")) {

                            while ($rowewe = mysqli_fetch_row($result22)) {
                                printf("<option value='%s'>%s</option>", $rowewe[0], $rowewe[0]);

                            }
                        }
                        ?>
                    </select>
                    <label for="email"><h3>email:</h3></label>
                    <input type="text" class="form-input" value="<?php if ($_GET['submit'] == 'true') {
                        echo $_POST['email'];
                    } ?>" id="email" name="email" autocomplete="off" required="true"/>
                    <label for="pwd"><h3>Password:</h3></label>
                    <input type="password" class="form-input" id="pwd" name="pswd" required="true">
                    <label for="pwd"><h3>Confirm Password:</h3></label>
                    <input type="password" class="form-input" id="pwd" name="pswdvar" required="true">
                    <br>
                    <br>
                    <input type="submit" value="Register" class="form-submit" style="width:90%">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12" id="after"></div>
    </div>
</div>

<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
