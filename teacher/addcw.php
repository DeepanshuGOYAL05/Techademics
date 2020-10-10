<?PHP
if (session_status() === PHP_SESSION_NONE) session_start();
include ('../gen.php');
if(isset($_SESSION['usr'])){
	$userarr=explode('.',$_SESSION['usr']);
	if($userarr[0]!='t'){
	header("Location: ../index.php");
	die();}
	}else{
	$userarr=explode('.',$_SESSION['usr']);
header("Location: ../index.php");
die();
}
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if ($result2=mysqli_query($con,"SELECT `cname` FROM `course` where `id`=".$_POST['cid']))
  					{
 		 	// $num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $cname=$rowe[0];

  			 }
  			 
  			 
}
if ($result2=mysqli_query($con,"SELECT `batch` FROM `cnroll` where `cid`=".$_POST['cid']))
            {
      // $num_rows11 = mysqli_num_rows($result2);
        
       // Fetch one and one row
           while ($rowewq=mysqli_fetch_row($result2))
         {

           $batch=$rowewq[0];

         }
         
         
}
if ($resultann=mysqli_query($con,"INSERT INTO `cwork` (`tid`,`cid`,`title`,`url`) VALUES ('".$userarr[1]."','".$_POST['cid']."','".$_POST['title']."','".$_POST['url']."');"))
            {}
if ($resultannq=mysqli_query($con,"INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`,`batch`) VALUES ('".$userarr[1]."','".$_SESSION['name']."','<a href=".$_POST['url']." >Professor ".$_SESSION['name']." added ".$_POST['title']." to the coursework on ".$cname." </a>',CURDATE() + INTERVAL 5 DAY,'".$batch."');"))
            {header("Location: index.php");
}

        
?>