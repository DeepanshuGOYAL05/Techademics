<?php
require_once('src/bootstrap.php');
$databaseUtility = \App\Utility\DatabaseUtility::getInstance();
$sessionUtility = \App\Utility\SessionUtility::getInstance();
$user = $sessionUtility->getUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php \App\Utility\WebsiteUtility::renderHeader(); ?>
    <script>
        $(document).ready(function () {
            <?php
            $task = isset($_POST['task']) ? $_POST['task'] : '';
            if ($task === 'login' && isset($performLogin) && $performLogin === false) {
                echo '$("#error_wrap").fadeIn();';
                echo '$("#error").text("Invalid");';
            }
            ?>
        });
    </script>
</head>

<body>
    <?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

    <div class="container text-center">
        <div class="row"><!-- login screen-->
            <div class="panel panel-danger" id="error_wrap">
                <div class="panel-heading" id="error"></div>
            </div>
            <div class="main">
                <section class="signup">
                    <!-- <img src="images/signup-bg.jpg" alt=""> -->
                    <div class="container">
                        <div class="signup-content">
                            <?php if ($user) { ?>
                                <a href="/?logout=true" class="form-submit">Logout</a>
                            <?php } else { ?>
                                <form method="POST" action="/">
                                    <input type="hidden" name="task" value="login"/>

                                    <h2 class="form-title">Login</h2>
                                    <div class="form-group">
                                        <!--	<label for="usr"><h3>User Id:</h3></label>-->
                                        <input type="text" class="form-input" name="userid" id="usr"
                                               placeholder="User id" autocomplete="off"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-input" name="pswd" id="pwd"
                                               placeholder="Password" autocomplete="off"/>
                                        <span toggle="#password"
                                              class="zmdi zmdi-eye field-icon toggle-password"></span>
                                    </div>
                                    <input type="submit" value="Login" class="form-submit" style="width:90%">
                                </form>
                                <p class="loginhere">
                                    Not registered yet? <a href="register.php" class="loginhere-link">Register here</a>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
