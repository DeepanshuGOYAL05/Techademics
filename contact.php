<?php
require_once('src/bootstrap.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php \App\Utility\WebsiteUtility::renderHeader('Contact'); ?>
</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

<div class="container-fluid" style="background:black; opacity:0.60;">
    <h1 style="color:white; text-align:center; text-transform:uppercase;">Contact Us at:</h1>
    <p style="color:white; text-align:center; font-size:25px;"></p>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="container-fluid text-center" style="background:white; opacity:0.60;">
                <i class="material-icons" style="font-size:100px; ">email</i>
                <h2>Queries</h2>
                <a href="mailto:educationtechademics@gmail.com" target="_blank">
                    <h2>educationtechademics@gmail.com</h2>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="container-fluid text-center" style="background:white; opacity:0.60;">
                <i class="material-icons" style="font-size:100px;">call</i>
                <h2>Techademics Mon-Sat</h2>
                <h2>+91-7988587806</h2>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="container-fluid" style="background:black; opacity:0.60; width: 50%;">
                    <h2 style="color:white; text-align:center; text-transform:uppercase; ">Admin </h2>
                    <i class="material-icons" style="font-size:100px; color: white;">email</i>

                    <a href="mailto:educationtechademics@gmail.com" target="_blank">
                        <h2 style="color:white">admin@techademics.com</h2>
                    </a>
            </div>
        </div>
    </div>
</div>

<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
