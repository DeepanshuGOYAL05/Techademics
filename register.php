<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="theme-color" content="#42bcf4">
    <title>Register | Techademics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="gen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Baloo+Bhai|Roboto+Condensed';
    </style>
    <script>
        $(document).ready(function () {
            var myvar = '<div class="container"><center><h1>Account created!</h1><h2>user ID is<br></h2></center></div>';
            var btnvar = '<div class="container"><center><button type="button" class="form-submit goto" style="width:81%" data="0,index.php">Go to login page</button></center></div>';
            <?PHP
            include 'gen.php';
            $con = mysqli_connect($servername, $username, $password, $dbname);

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            //$_SESSION['usr'];
            if (!isset($_GET['submit'])) {
                $_GET['submit'] = '';
            }
            if (isset($_SESSION['usr'])) {
                if ($_SESSION['usr'] != '' || $_SESSION['usr'] != null) {
                    $sessionarr = explode('.', $_SESSION['usr']);
                    if ($sessionarr[0] == 's') {
                        //redirect to student
                        echo 'window.location="student/";});</script></head></html>';
                        exit();
                    } elseif ($sessionarr[0] == 't') {
                        //redirect to teacher
                        echo 'window.location="student/";});</script></head></html>';
                        exit();
                    } elseif ($sessionarr[0] == 'p') {
                        //redirect to parent
                        echo 'window.location="student/";});</script></head></html>';
                        exit();
                    }

                }
            } elseif ($_GET['submit'] == 'true') {


                //form validation
                if ($_POST['name'] == null || $_POST['name'] == '') {
                    //code for name missing
                    $work = 0;
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("Name cant be blank");';
                } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === true) {
                    $work = 0;
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("Invalid email");';
                } elseif ($_POST['pswd'] == null || $_POST['pswd'] == '') {
                    $work = 0;
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("password must be set");';
                } elseif ($_POST['type'] == 'p' && !isset($_POST['studid'])) {
                    $work = 0;
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("Student ID must be filled for parent account");';
                } elseif ($_POST['type'] == 'p' && $_POST['studid'] == '') {
                    $work = 0;
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("Student ID must be filled for parent account");';
                } elseif ($_POST['pswd'] != $_POST['pswdvar']) {
                    $work = 0;
                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("passwords are not same");';
                } else {//all fine!
                    $work = 1;
                }

                if ($_POST['type'] == 's') {
                    $query2 = 'SELECT `id` FROM `stud` ORDER BY `id` ASC';
                    //student

                    $hashed_password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

                    $sql = "INSERT INTO `stud` (`id`, `sname`, `points`, `email`, `pwd`, `batch`) VALUES (NULL, '" . $_POST['name'] . "', '0', '" . $_POST['email'] . "', '" . $hashed_password . "','" . $_POST['batch'] . "');";

                } elseif ($_POST['type'] == 't') {

                    $query1 = 'SELECT `teacher_key` FROM `formkeys` LIMIT 1';
                    $result = mysqli_query($con, $query1);

                    if ($result !== false) {
                        $row = mysqli_fetch_array($result);
                        if ($row[0] == $_POST['teacherkey']) {
                            $query2 = 'SELECT `id` FROM `teachr`  ORDER BY `id` ASC';

                            $hashed_password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);

                            $sql = "INSERT INTO `teachr` (`id`, `tname`, `email`, `pwd`) VALUES (NULL, '" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $hashed_password . "');";
                        } else {
                            echo '$("#error_wrap").fadeIn();';
                            echo '$("#error").text("Please enter correct key!");';
                        }
                    }
                } elseif ($_POST['type'] == 'p') {
                    $query2 = 'SELECT `id` FROM `parent`  ORDER BY `id` ASC';
                    $studidsplit = explode('.', $_POST['studid']);
                    if ($result2 = mysqli_query($con, "SELECT `sname` FROM `stud` where `id`=" . $studidsplit[1])) {
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
                        // Free result set
                        // mysqli_free_result($result2);
                    }

                    $hashed_password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `parent` (`id`, `pname`, `sid`, `sname`, `email`, `pwd`) VALUES (NULL, '" . $_POST['name'] . "', '" . $studidsplit[1] . "', '" . $sname . "', '" . $_POST['email'] . "', '" . $hashed_password . "');";

                } else {

                    echo '$("#error_wrap").fadeIn();';
                    echo '$("#error").text("Invalid account type");';
                    $work = 0;
                }


                if ($work == 1) {
                    // echo'$("#error_wrap").fadeIn();';
                    // 			echo'$("#error").text("valid");';
                    if ($result = mysqli_query($con, $sql)) {

                        if ($result3 = mysqli_query($con, $query2)) {
                            while ($row31 = mysqli_fetch_row($result3)) {

                                $num_rows12 = $row31[0];
                            }


                            echo '$("#mainccontent").html(myvar);';
                            echo '$("#mainccontent").append("' . $_POST['type'] . '"+".' . $num_rows12 . '");';
                            echo '$("#after").append(btnvar);';

                            // Fetch one and one row
                            // while ($row=mysqli_fetch_row($result))
                            //   {

                            //       // printf ("%s",$row[0]);
                            //   }
                            // // Free result set
                            // mysqli_free_result($result);
                        }
                    }

                    mysqli_close($con);
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


            $(".goto").click(function () {
                var string = $(this).attr('data').split(',');
                var type = string[0];
                var uri = string[1];
                if (type == 0) {
                    window.location = uri;
                } else if (type == 1) {
                    window.open(uri, '_blank');
                }

            });
            // $("#email").focus(function(){alert($("#acctype").val());});
        });
    </script>

</head>

<body>


<div class="fixed-top">
    <header class="topbar">
        <div class="container">
            <div class="row">
                <!-- social icon-->
                <div class="col-sm-12">
                    <ul class="social-network">
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="text-transform: uppercase; font-size:35px;  ">
                Techademics</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ml-auto" style="float: right;">

                    <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                        <a class="nav-link" href="about.php">About</a>
                    </li>

                    <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>


                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container">

    <center>
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
                        <input type="text" class="form-input" value="<?PHP if ($_GET['submit'] == 'true') {
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
                        <input type="text" class="form-input" value="<?PHP if ($_GET['submit'] == 'true') {
                            echo $_POST['studid'];
                        } ?>" id="s_uid" name="studid">

                        <label for="teacherkey" id="teacherkeylabel"><h3>Enter teacher's key:</h3></label>
                        <input type="text" class="form-input" value="<?PHP if ($_GET['submit'] == 'true') {
                            echo $_POST['teacherkey'];
                        } ?>" id="teacherkey" name="teacherkey">

                        <select class="form-control" name="batch" id="batchk" style="height:30%;"
                                value="<?PHP if ($_GET['submit'] == 'true') {
                                    echo $_POST['batch'];
                                } ?>">

                            <?PHP
                            if ($result22 = mysqli_query($con, "SELECT * FROM `abatches` ")) {

                                while ($rowewe = mysqli_fetch_row($result22)) {
                                    printf("<option value='%s'>%s</option>", $rowewe[0], $rowewe[0]);

                                }
                            }
                            ?>
                        </select>
                        <label for="email"><h3>email:</h3></label>
                        <input type="text" class="form-input" value="<?PHP if ($_GET['submit'] == 'true') {
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
    </center>
</div>
</body>
</html>