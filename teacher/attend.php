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
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
<html>
    <body>
        <form method="POST">
        <label>Course ID</label>
            <input type="text" id="cid" name="cid">
            <label>Student ID</label>
            <input type="text" id="sid" name="sid">
            <label>Status</label>
            <select name="value" id="value">
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
            <input id="submit" name="submit" type="submit">
        </form>
    </body>
    <script>
    // if ( window.history.replaceState ) {
    //     window.history.replaceState( null, null, window.location.href );
    // }
</script>
</html>