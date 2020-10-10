<?php
require_once('src/bootstrap.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php \App\Utility\WebsiteUtility::renderHeader('About'); ?>
</head>

<body>
<?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

<div class="container-fluid">
    <img src="about.jpg" width='100%'/>
</div>
<br><br>
<div class="container-fluid" style="background:black; opacity:0.60;">
    <h1 style="color:white; text-align:center; text-transform:uppercase;">Our Mission</h1>

    <p style="color:white; text-align:center; font-size:25px;">Our school's mission is to learn leadership, the common
        core, and relationships for life. Our mission is to provide a safe, disciplined learning environment that
        empowers all students to develop their full potential. We feel strongly about helping to build leaders that have
        the ability to succeed in whatever endeavor they undertake. Winning is not always the measure of success. Our
        students understand the "Win, win" philosophy and use it in their daily life. Common standards keeps us
        focused on learning appropriate content and preparing our students to graduate. Last but just as importantly,
        setting examples for our students of meaningful and lasting relationships will go with them throughout their
        lifetime.</p>
    <h1 style="color:white; text-align:center; text-transform:uppercase;">Our Reach</h1>
    <p style="color:white; text-align:center; font-size:25px;">
        The people who visit Education.com are the most important part of what we do.
        We provide learning resources in over 20 countries and six continents.
        Every user is different, but they share the same goal: to improve the lives of children through education.
    </p>
</div>

<?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
