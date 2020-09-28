
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>Teacher | Techademics</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset="utf-8"> 
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
	if($userarr[0]!='p'){
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
if ($result2=mysqli_query($con,"SELECT * FROM `parent` where `id`=".$userarr[1]))
  					{
 		 	$num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $sname=$rowe[1];

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
		  
		 <p style="color: white; margin-top:25px; float: right; font-size:20px; margin-bottom:15px; margin-right:465px;">TECHADEMICS</p>
		
		 
			
          </div>

        </div>
      </div>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" >
    <div class="container" >
      <a class="navbar-brand" href="index.html" style=" font-size:30px;  "> Parent's Portal: <?PHP 		if(!isset($_GET['action'])){ echo 'Welcome, '.explode(' ', $_SESSION['name'])[0]; }  ?></a>
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
		  <li class="nav-item active" style="margin-top:10px; margin-right:10px; color:white;">
			<a class="nav-link" href="index.php">Home</a>
			
          </li>
          <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
            <a class="nav-link" href="../about.php">About</a>
          </li>

         
          <li class="nav-item active" style="margin-top:10px; margin-right:10px; color:white;">
			<a class="nav-link" href="../help.php">Help</a>
			
          </li>
		  

        </ul>
      </div>
    </div>
  </nav>
</div>

	<div class="container"><center>
		<div class="row">
			<div class="col-sm-12" id="head"></div>
		</div><br><br><button type="button" class="form-submit goto" style="width:90%"  data-toggle="collapse" data-target="#menu">Menu</button><br><br>
				<div id="menu" class="collapse">
				<button type="button" class="btn btn-warning " style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; " >View enrolled Courses of your Child </button><br>
				<button type="button" class="btn btn-warning " style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; " >View calendar</button>
				<button type="button" class="btn btn-warning " style="width:90%; background: linear-gradient(45deg, #1b1e21 28%,#BA55D3 48% ); border-color:black; color:white; " >View performances of your Child</button><br>
				</div>
				
				<br>
	
		<div class="row">
			<div class="col-sm-12"><br>
				<div class="panel panel-info" style="background:#16d8ad">
      <div class="panel-heading" style="background:#000000; color: white;">Feed</div>
      <div class="panel-body" style="background:white"></div>
    </div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12"></div>
		</div>
	</center></div>
</body>
</html>