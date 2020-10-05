<?php
error_reporting(0);
include('../gen.php');
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_POST["submit"])
{
    
    $sid=$_POST["sid"];
    $cid=$_POST["cid"];
    $date=date('Y-m-d');
    $tid=$_SESSION["usr"];
    $val=$_POST["value"];
    

    $sql = "INSERT INTO attend (cid, date, sid, tid, value) VALUES ('$cid', '$date', '$sid', '$tid', '$val')";

    if (mysqli_query($con, $sql)) {
        echo "New record created successfully";
        $_SESSION["success"]=1;
        header("Location:index.php");
    } else {
        $_SESSION["success"]=0;
        header("Location:index.php");
    }
    
    mysqli_close($conn);
}
?>
<html>
    <body>
       
    </body>
    <script>
    // if ( window.history.replaceState ) {
    //     window.history.replaceState( null, null, window.location.href );
    // }
</script>
</html>