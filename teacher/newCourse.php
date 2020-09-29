
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>Add Course | Techademics</title>
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

		$("#logout").click(function(){
			window.location='../logout.php';
		});
		var myvar2='<div class="panel panel-success" id="success"><div class="panel-heading" id="success_content">New Batch Created!</div></div>';
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

if ($result2=mysqli_query($con,"SELECT * FROM `stud` where `id`=".$userarr[1]))
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
if(isset($_GET['submit'])){
	if ($_GET['submit']=='true'){

		if ($result2=mysqli_query($con,"INSERT INTO `course` (`id`, `cname`, `tid`, `tname`, `nclass`) VALUES (NULL,'".$_POST['cname']."','".$userarr[1]."','".$_SESSION['name']."','".$_POST['date']."' );"))
  					{if ($result34=mysqli_query($con,"SELECT `id` from `course` where `cname`='".$_POST['cname']."'")){
							 while ($rower=mysqli_fetch_row($result34)){$cid=$rower[0];}
  					}
  						if ($result7=mysqli_query($con,"INSERT INTO `cnroll` (`cid`, `cname`, `tid`, `tname`, `batch`) VALUES ('".$cid."','".$_POST['cname']."','".$userarr[1]."','".$_SESSION['name']."','".$_POST['batch']."' );")){header("Location: index.php?action=createdNewCourse");
              if ($resultann=mysqli_query($con,"INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`,`batch`) VALUES ('".$userarr[1]."','".$_SESSION['name']."','You have been added to a new course ".$_POST['cname']." by instructor ".$_SESSION['name']."','".$_POST['date']."','".$_POST['batch']."');"))
            {}
  							if ($result71=mysqli_query($con,"SELECT `id` from `stud` WHERE `batch`='".$_POST['batch']."' ")){
  							while ($rowerwo=mysqli_fetch_row($result71)){
  								if($result24=mysqli_query($con,"INSERT INTO `cenroll` (`cid`, `sid`, `grade`) VALUES ('".$cid."','".$rowerwo[0]."','0','".$_SESSION['name']."','".$_POST['date']."' );")){
  									// header("Location: index.php?action=createdNewCourse");
  									//add to indivisual student not working
  								}
  							}
  							
  						}

  						}
  						
  					}
	}
}
?>
</div>
<div class="fixed-top">
  <header class="topbar">
  	
		 
      <div class="container">
	  
        <div class="row">
		
          <!-- social icon-->
          <div class="col-sm-12">
		  
		 <p style="color: white; margin-top:25px; float: right; font-size:20px; margin-bottom:15px; margin-right:465px; text-transform: uppercase;">Techademics</p>
		
		 
			
          </div>

        </div>
      </div>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" >
    <div class="container" >
      <a class="navbar-brand" href="index.html" style=" font-size:30px;"> Teacher Portal:Welcome, <?PHP  if(!isset($_GET['action'])){ echo  explode(' ', $_SESSION['name'])[0]; }  ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto" style="float: right;">

          <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
		  <a href="../logout.php">
			<img id="logout" style="z-index:15; background-color:white;  float:right;" src="../logout.png">
            <span class="sr-only">(current)</span>
            </a>
          </li>

          <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
            <a class="nav-link" href="../teacher/index.php">Home</a>
          </li>

         <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
            <a class="nav-link" href="../about.php">About</a>
          </li>

         
          <li class="nav-item active" style="margin-top:10px; margin-right:10px; color:white;">
		  <a class="nav-link" href="../contact.php">Contact Us</a>
			
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
	<div class="container"><center>
		<div class="row">
			<div class="col-sm-12" id="head"></div>
		</div>
		<br><br>
		<!--<button type="button" class="form-submit goto" style="width:15%; float:right;" data="0,index.php">Go to Main Menu</button>
		<br><br><br>-->
		<div id="toalter"><form method="POST" action="newCourse.php?submit=true">
			<div class="col-sm-12">
    			<div class="panel panel-info" >
    				<div class="panel-heading" style="background:black; color:white;" >Course Details</div>
    				<div class="panel-body" style="	background-image: linear-gradient(to top, #d299c2 0%, #fef9d7 100%);" >
    					<div class="form-group">
  						<label for="usr"><h3>Course name:</h3></label>
  						<input type="text" class="form-control" name="cname"  autocomplete="off" id="usr">
						</div>
						<div class="form-group">
  						<label for="usr"><h3>Course starts(YYYY-MM-DD):</h3></label>
  						<input type="text" class="form-control" name="date"  autocomplete="off" id="date">
						</div>
    				</div>
    			</div>
				<div class="panel panel-info" >
    				<div class="panel-heading" style="background:black; color:white;">Add Students</div>
    				<div class="panel-body" style="	background-image: linear-gradient(to top, #d299c2 0%, #fef9d7 100%);">
    					<div class="form-group">
  						<label for="batch"><h4>Add Students of Particular Batch:</h4></label>
  						
  					<select class="form-control" style="height:60%;" name="batch" id="batch">
  						<?PHP
  							$con = mysqli_connect($servername,$username,$password,$dbname);

							if (mysqli_connect_errno())
  								{
  							echo "Failed to connect to MySQL: " . mysqli_connect_error();
 								 }
							if ($result2=mysqli_query($con,"select `batch` from `stud` group by `batch`;"))
  							{
 		 					
  			
 			 				// Fetch one and one row
  							 while ($rowe=mysqli_fetch_row($result2))
  			 				{
  			 					echo '<option value="'.$rowe[0].'">'.$rowe[0].'</option>';
 		       					

  							 }  			 			
                           }
  						?>
  						
  						
					</select>
						</div>
						
    				</div>
    			</div>				
			</div>
			<input type="submit" value="Create!"  class="form-submit goto" style="width:90%">
			</form><br><br><br>

			<!--<p class="loginhere"> <a href="../index.php" class="loginhere-link">Back to Menu</a>
                    </p>-->
		</div>
		<div class="row">
			<div class="col-sm-12"></div>
		</div>
	</center></div>
</body>
</html>