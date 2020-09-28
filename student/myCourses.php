
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>My Courses | Techademics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset="utf-8"> 
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../gen.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
	<style>
		@import 'https://fonts.googleapis.com/css?family=Baloo+Bhai|Roboto+Condensed';
	</style>
	<script>
	$(document).ready(function(){
		$("#logout").click(function(){
			window.location='../logout.php';
		});
			$(".goto").click(function(){
    		var string = $(this).attr('data').split(',') ;
        	var type= string[0];
        	var uri= string[1];
        	if(type==0){
				window.location=uri;
        	} else if(type==1){
        		window.open(uri,'_blank');
        	}
        	
    	});

		
	});
	</script>
	<meta name="theme-color" content="#42bcf4">
</head>

<body>

<div id="php" >
<?PHP
if (session_status() === PHP_SESSION_NONE) session_start();
include ('../gen.php');
if(isset($_SESSION['usr'])){
	$userarr=explode('.',$_SESSION['usr']);
	if($userarr[0]!='s'){
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
if ($result2=mysqli_query($con,"SELECT `batch` FROM `stud` where `id`=".$userarr[1]))
  					{
 		 	// $num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $batch=$rowe[0];

  			 }
  			
  			 // Free result set
  			// mysqli_free_result($result2);
}
?>


</div>

<div class="fixed-top">
  <header class="topbar">
      <div class="container">
        <div class="row">
          <!-- social icon-->
          <div class="col-sm-12">
		  <p style="color: white; margin-top:25px; float: right; font-size:20px; margin-bottom:15px; margin-right:465px; text-transform: uppercase;">Techademics </p>
		
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
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" >
    <div class="container" >
      <a class="navbar-brand" href="index.php" style=" font-size:30px; "> Student's Portal: <?php  echo $_SESSION['name'];?> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto" style="float: right;">

          <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
		  <a class="nav-link" href="../logout.php">
			<img id="logout" style="z-index:15; background-color:white;  float:right;" src="../logout.png">
            <span class="sr-only">(current)</span>
            </a>
          </li>
		  
		  <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
            <a class="nav-link" href="index.php">Home </a>
          </li>
		  

          <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
            <a class="nav-link" href="../about.php">About</a>
          </li>

         <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
            <a class="nav-link" href="../help.php">Help</a>
          </li>
		  <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
			<a class="nav-link" href="../contact.php">Contact</a>
			
          </li>
         
         
        </ul>
      </div>
    </div>
  </nav>
</div>


	<div class="container"><center>
	
	
<br>
<div class="form-submit" style="height:20%;"><?PHP echo 'Batch: '.$batch; ?></div>

<br>
		<?PHP 
			if ($result24=mysqli_query($con,"SELECT `cid`,`cname` FROM `cnroll` where `batch`='".$batch."'"))
  					{
 		 	// $num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowere=mysqli_fetch_row($result24))
  			 {

 		       echo '<button type="button" class="btn btn-warning goto" data="0,course.php?cid='.$rowere[0].'" style="width:90%;margin:10px">'.$rowere[1].'</button>';

  			 }
  			 
}
		?>
		

		<br><br>
				
				
				<br>
		<div class="row">
			
		</div>
		
	</center></div>
</body>
</html>