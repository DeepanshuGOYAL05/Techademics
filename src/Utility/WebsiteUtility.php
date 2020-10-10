<?php
namespace App\Utility;

class WebsiteUtility {
    public static function renderHeader($title = '') {
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="theme-color" content="#42bcf4">
        <title><?php echo (!empty($title) ? $title . ' | ' : ''); ?>Techademics</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">

        <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <?php // @todo font not found: <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css"> ?>

        <link rel="stylesheet" href="/assets/css/gen.css">
        <link rel="stylesheet" href="/assets/css/app.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="/assets/js/app.js"></script>
        <?php
    }

    public static function renderNavigation() {
        $sessionUtility = \App\Utility\SessionUtility::getInstance();
        $user = $sessionUtility->getUser();
        $firstName = explode(' ', $_SESSION['name'])[0];
        ?>
        <div class="fixed-top">
            <header class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                        &nbsp;
                        </div>
                        <div class="col-sm-6 text-center">
                        <?php if ($user) { ?>
                            <p style="color: white; margin-top:25px; font-size:20px; text-transform: uppercase;">Techademics
                        <?php } else { ?>
                            &nbsp;
                        <?php } ?>
                        </div>
                        <div class="col-sm-3">
                            <ul class="social-network">
                                <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a class="waves-effect waves-dark" href="#"><i class="fab fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" >
                <div class="container" >
                    <?php if ($user) { ?>
                    <a class="navbar-brand" href="/" style=" font-size:25px;">
                        <?php
                        $mapPortalText = ['stud' => 'Student\'s', 'teachr' => 'Teacher\'s', 'parent' => 'Parent\'s'];
                        echo $mapPortalText[$_SESSION['table']] . ' Portal: Welcome, ' . $firstName;  ?>
                    </a>
                    <?php } else { ?>
                    <a class="navbar-brand" href="/" style="text-transform: uppercase; font-size:35px;">Techademics</a>
                    <?php } ?>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto" style="float: right;">
                            <?php if ($user) { ?>
                            <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                                <a href="/?logout=true">
                                    <img id="logout" style="z-index:15; background-color:white;  float:right;" src="/logout.png">
                                </a>
                            </li>
                            <?php } ?>

                            <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                                <a class="nav-link" href="/">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
                                <a class="nav-link" href="/about.php">About</a>
                            </li>
                            <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                                <a class="nav-link" href="/contact.php">Contact Us</a>
                            </li>

                            <?php if ($user) { ?>
                                <?php $mapLink = ['stud' => 'student', 'teachr' => 'teacher', 'parent' => 'parent']; ?>
                                <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                                    <a class="nav-link" href="/<?php echo $mapLink[$_SESSION['table']]; ?>/">Member Area</a>
                                </li>
                            <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
                                <a class="nav-link" href="/help.php">Help</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?php
    }

    public function renderFooter() {
        ?>
        <!-- Footer -->
        <?php
    }
}