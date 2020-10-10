<?php
require_once('src/bootstrap.php');

$databaseUtility = \App\Utility\DatabaseUtility::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    \App\Utility\WebsiteUtility::renderHeader('Contact us');
    ?>
    <link rel="stylesheet" href="/assets/css/contact.css">
</head>

<body>
    <?php \App\Utility\WebsiteUtility::renderNavigation(); ?>

    <div class="container-fluid">
        <img src="contact.bmp" width="100%">
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-8" style="padding:20px; border:1px solid #F0F0F0;">
                <?php
                if (isset($_POST['message'])) {
                    $name = isset($_POST['name']) ? $_POST['name'] : '';
                    $email = isset($_POST['email']) ? $_POST['email'] : '';
                    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
                    $msgtxt = isset($_POST['msgtxt']) ? $_POST['msgtxt'] : '';

                    $result = $databaseUtility->query("insert into tblmessage(fld_name,fld_email,fld_phone,fld_msg) values ('$name','$email','$phone','$msgtxt')");
                    if ($result) {
                        echo "<script> alert('We will be Connecting You shortly')</script>";
                    } else {
                        echo "failed";
                    }
                }
                ?>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name*" name="name" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="email*" name="email" required/>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" pattern="[6-9]{1}[0-9]{9}" name="phone"
                               placeholder="Phone(optinal) EX 9213298761"/>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" placeholder="Message*" name="msgtxt" rows="3" col="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="message" class="btn btn-danger">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4" style="padding:30px;">
                <div class="form-group">
                    Contact:<br>
                    <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<b>+91-7988587806/8198952284</b><br><br>
                    <i class="fa fa-home" aria-hidden="true"></i>&nbsp; Old Railway Road, Mohindergarh<br>
                </div>
            </div>
        </div>
    </div>

    <?php \App\Utility\WebsiteUtility::renderFooter(); ?>
</body></html>
