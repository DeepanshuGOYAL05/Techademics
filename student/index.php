
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>Student | Techademics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset="utf-8"> 
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../gen.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		@import 'https://fonts.googleapis.com/css?family=Baloo+Bhai|Roboto+Condensed';
	</style>
	<script>
	$(document).ready(function(){

		$("h4 a").attr('target','_blank');
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
if ($result2=mysqli_query($con,"SELECT * FROM `stud` where `id`=".$userarr[1]))
  					{
 		 	$num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $sname=$rowe[1];
 		       $batch=$rowe[5];
  			 }
  			 $fname=explode(' ', $sname);  ////////first name////////////
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
		
		 
			
          </div>

        </div>
      </div>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" >
    <div class="container" >
      <a class="navbar-brand" href="index.php" style=" font-size:25px;  "> 
	  
	  Student's Portal: <?PHP  echo 'Welcome, '.$fname[0];  ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto" style="float: right;">

          <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
		  <a  href="../logout.php">
			<img id="logout" style="z-index:15; background-color:white;  float:right;" src="../logout.png">
            <span class="sr-only">(current)</span>
            </a>
          </li>
		  <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
            <a class="nav-link" href="index.php">Home</a>
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
		<div class="row">
	<!--		<div class="col-sm-12" id="head">Techademics<a href="../logout.php"><img id="logout" style="z-index:10" src="../logout.png"></a></div>-->
		</div><br><br><button type="button" class="form-submit goto" style="width:90%; border-color:black;"  data-toggle="collapse" data-target="#menu">Menu</button><br><br>
				<div id="menu" class="collapse">
				<button type="button" class="btn btn-warning goto" style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; " data="1,myCourses.php"><b>View enrolled Courses</b></button><br>
				<button type="button" class="btn btn-warning goto" style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white;" data="1,calendar.php"><b>View calendar</b></button>
				<button type="button" class="btn btn-warning " style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% );border-color:black; color:white;" ><b>---View performances</b></button><br>
				</div>
	           <br>
				<!--<div class="form-submit" style="font-size:25px; color: white;">
		<?PHP  //echo 'Hi '.$fname[0].'! Glad to see you :)';  ?>
</div>-->
		<div class="row">
			<div class="col-sm-12"><br>
				<div class="panel panel-info" style="background:#16d8ad">
      <div class="panel-heading" style="background:#000000; color: white;"  >Bulletin Board</div>
      <div class="panel-body" style="background: white">
      	<?PHP
      		if ($result223=mysqli_query($con,"SELECT * FROM `feed` WHERE (exp_date >= CURDATE()) AND (`batch`='".$batch."' OR `batch`='all') ORDER BY `id` DESC "))
  					{
 		 	$num_rows223 = mysqli_num_rows($result223);
  			$counter=0;
 			 // Fetch one and one row
  				 while ($roweq=mysqli_fetch_row($result223))
  			 {$counter++;
				   echo '<h4>'.$roweq[3].'</h4>'.$roweq[4];
				   if($counter<$num_rows223){
					   
					echo '<hr class="hr1">'.'Due';}
			}
				   
  			 	
  			 $fname=explode(' ', $sname);  ////////first name////////////
  			 // Free result set
  			// mysqli_free_result($result223);
}
      	?>
      </div>
    </div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12"></div>
		</div>
	</center></div>
</body>
</html>