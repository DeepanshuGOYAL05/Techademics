
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
			$(".nowr").click(function(){
				alert('This function is not available yet.');
			});
			$(".btn").click(function(){
				$("#success").fadeOut();
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

		$("#logout").click(function(){
			window.location='../logout.php';
		});
		$("#ptabtn").click(function(){$("html, body").animate({ scrollTop: $(document).height() }, 1000);});
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
if ($result2=mysqli_query($con,"SELECT * FROM `teachr` where `id`=".$userarr[1]))
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
if(isset($_POST['cid'])){
	if ($result2111=mysqli_query($con,"SELECT `batch` FROM `cnroll` where `cid`=".$_POST['cid']))
  					{
 		 	//$num_rows11 = mysqli_num_rows($result2111);
  			
 			 // Fetch one and one row
  				 while ($roweer=mysqli_fetch_row($result2111))
  			 {

 		       $batch=$roweer[0];

  			 }
  			 
  			 // Free result set
  			// mysqli_free_result($result2111);
}
}

// $batch define
?>
</div>

<div class="fixed-top">
  <header class="topbar">
  	
		 
      <div class="container">
	  
        <div class="row">
		
          <!-- social icon-->
          <div class="col-sm-12">
		  
		 <p style="color: white; margin-top:25px; float: right; font-size:25px; margin-bottom:15px; margin-right:465px; text-transform: uppercase;">Techademics</p>
		
		 
			
          </div>

        </div>
      </div>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" >
    <div class="container" >
      <a class="navbar-brand" href="index.php" style=" font-size:30px;  ">Teacher's Portal:  <?PHP 		if(!isset($_GET['action'])){ echo 'Welcome, '.explode(' ', $_SESSION['name'])[0]; }  ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto" style="float: right;">

          
		  <a href="../logout.php">
			<img id="logout" style="z-index:15; background-color:white;  float:right;" src="../logout.png">
            
            </a>
          </li>
		  <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
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
		</div><br><br>
		<?PHP 
		if(!isset($_GET['action'])){  }
		else{
			if($_GET['action']=='newBatch'){
				if ($result5=mysqli_query($con,"INSERT INTO `abatches` (`name`) VALUES ('".$_POST['batchname']."');"))
  					{
  						echo '<div class="panel panel-success" id="success">
      			<div class="panel-heading" id="success_content">New Batch Created!</div>
     
    		</div>';
  					}
			}//end of action==newBatch condition
			elseif($_GET['action']=='createdNewCourse'){
				
  						echo '<div class="panel panel-success" id="success">
      			<div class="panel-heading" id="success_content">New Course Created!</div>
     
    		</div>';
  					
			}elseif($_GET['action']=='holiday'){
				if ($resultann=mysqli_query($con,"INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`) VALUES ('".$userarr[1]."','".$_SESSION['name']."','<span class=imp>".$_POST['hdate']." has been declared a holiday!</span>','".$_POST['hdate']."');"))
  					{}
				if ($result5=mysqli_query($con,"INSERT INTO `days` (`date`,`type`,`tid`) VALUES ('".$_POST['hdate']."','2','".$userarr[1]."');"))
  					{
  						echo '<div class="panel panel-success" id="success">
      			<div class="panel-heading" id="success_content">Holiday added!</div>
     
    		</div>';
  					}
			}elseif($_GET['action']=='addClass'){
				if ($resultann=mysqli_query($con,"INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`,`batch`) VALUES ('".$userarr[1]."','".$_SESSION['name']."','There is a class by Prof. ".$_SESSION['name']." on ".$_POST['cdate']." ','".$_POST['cdate']."','".$batch."');"))
  					{}
				if ($result50=mysqli_query($con,"INSERT INTO `days` (`date`,`type`,`tid`,`cid`) VALUES ('".$_POST['cdate']."','1','".$userarr[1]."','".$_POST['cid']."');"))
  					{
  						echo '<div class="panel panel-success" id="success">
      			<div class="panel-heading" id="success_content">Class added!</div>
     
    		</div>';
  					}
			}elseif($_GET['action']=='ptm'){
				if ($resultann=mysqli_query($con,"INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`) VALUES ('".$userarr[1]."','".$_SESSION['name']."','<span class=imp>There is parent teacher meet with Prof. ".$_SESSION['name']." on ".$_POST['pdate']." </span>','".$_POST['pdate']."');"))
  					{}
				if ($result50=mysqli_query($con,"INSERT INTO `days` (`date`,`type`,`tid`) VALUES ('".$_POST['pdate']."','4','".$userarr[1]."');"))
  					{
  						echo '<div class="panel panel-danger" id="success">
      			<div class="panel-heading" id="success_content">Pta added!</div>
     
    		</div>';
  					}
			}elseif($_GET['action']=='addAssign'){
				if ($resultann=mysqli_query($con,"INSERT INTO `feed` (`tid`,`tname`,`title`,`exp_date`) VALUES ('".$userarr[1]."','".$_SESSION['name']."','There will be an ".$_POST['aaname']." exam of ".$_POST['maxmarks']." marks on ".$_SESSION['name']." on ".$_POST['aadate']." ','".$_POST['aadate']."');"))
  					{}
				if ($result50=mysqli_query($con,"INSERT INTO `days` (`date`,`type`,`tid`,`cid`) VALUES ('".$_POST['aadate']."','3','".$userarr[1]."','".$_POST['cid']."');"))
  					{if ($result51=mysqli_query($con,"INSERT INTO `tests` (`cid`,`tid`,`name`,`date`,`maxmarks`,`batch`) VALUES ('".$_POST['cid']."','".$userarr[1]."','".$_POST['aaname']."','".$_POST['aadate']."','".$_POST['maxmarks']."','".$_POST['abatch']."');")){
  						echo '<div class="panel panel-success" id="success">
  					
      			<div class="panel-heading" id="success_content">Assessment added!</div>
     
    		</div>';
  					}
  						
  					}
			}
		}
		 ?>
		<div class="bgvd inner">
		<div class="row">
			<div class="col-sm-12"><br><br>
			<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#newBatch" style="width:90%" >Create a new batch</button>
				
				<div id="newBatch" class="collapse">
					<div class="form-group">
					<form method="post" action="index.php?action=newBatch">
  						<label for="usr"><h3>Name of batch:</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="batchname" id="batchname"  autocomplete="off">
						  <br>
  					<input type="submit" value="Create!"  class="btn btn-success" style="width:80%">	
  					</form>	
					</div>
				</div><br><br>
				<button type="button" class="btn btn-warning goto" style="width:90%" data="1,newCourse.php">Create new course</button><br><br>
				
				<button type="button" class="btn btn-success" style="width:90%" data-toggle="collapse" data-target="#cwork">Upload Coursework</button><br>
				<div id="cwork" class="collapse">
					<div class="form-group">
					<form method="post" action="addcw.php">
  						<label for="usr" ><h3>Select course:</h3></label>
						  <br>
  						<?PHP 
						if ($result221=mysqli_query($con,"SELECT * FROM `course` where `tid`=".$userarr[1]))
  					{
 		 	if(mysqli_num_rows($result221)>0){ echo '<select style="width:80%; height: 60%;" class="form-control" name="cid">';
  				 		while ($rowewe1=mysqli_fetch_row($result221))
  			 			{
 		       				printf("<option value='%s'>%s</option>",$rowewe1[0],$rowewe1[1]);

  			 			}echo '</select>';}
  			 }
					?>
					<br><label for="usr"><h3>Title:</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="title" id="title"  autocomplete="off">
  						<label for="usr"><h3>url:</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="url" id="url"  autocomplete="off"><br>	
  					<input type="submit" value="Update!"  class="btn btn-success" style="width:80%">	
  					</form>	
					</div>
				</div><br><hr class="hr1"><br>
				<button type="button" class="btn btn-info" style="width:90%" data-toggle="collapse" data-target="#viewC">View courses</button><br><br><!-- Add students option in this plus create new course -->
				<div id="viewC" class="collapse">
					<ul>
					<?PHP 
						if ($result24=mysqli_query($con,"SELECT * FROM `course` where `tid`=".$userarr[1]))
  					{
 		 				
  				 		while ($rowewe4=mysqli_fetch_row($result24))
  			 			{

 		       				echo '<li>'.$rowewe4[1].'</li>';

  			 			}
  			 }
					?>
					
					</ul>
				</div>
				<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#addClass" style="width:90%" >Schedule a class</button>
				<div id="addClass" class="collapse">
					<div class="form-group">
					<form method="post" action="index.php?action=addClass">
						<label for="hdate"><h3>Course:</h3></label>
  						<?PHP 
						if ($result22=mysqli_query($con,"SELECT * FROM `course` where `tid`=".$userarr[1]))
  					{
 		 	if(mysqli_num_rows($result22)>0){ echo '<select style="width:80%; height: 60%;" class="form-control" name="cid">';
  				 		while ($rowewe=mysqli_fetch_row($result22))
  			 			{
 		       				printf("<option value='%s'>%s</option>",$rowewe[0],$rowewe[1]);

  			 			}echo '</select>';}
  			 }
					?>
  						<label for="cdate"><h3>Date(YYYY-MM-DD):</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="cdate" id="cdate"  autocomplete="off">
						  <br>
  					<input type="submit" value="Add a class!"  class="btn btn-success" style="width:80%">	
  					</form>	
					</div>
				</div><br><br>
				<button type="button" class="btn btn-info goto" style="width:90%" data="1,https://docs.google.com/forms/d/18bLy5n8Hk3VJjNzE7GZAVL5DhfFXynbC85T4ajS_pY4/edit?usp=sharing">Schedule a Quiz</button><br><br>
				
				<hr class="hr1"><br>
				<button type="button" class="btn btn-success " style="width:90%" data-toggle="collapse" data-target="#addAssign">Add an assessment</button>
				
				<div id="addAssign" class="collapse">
					<div class="form-group">
					<form method="post" action="index.php?action=addAssign">
  						<label for="aaname"><h3>Name of assessment:</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="aaname" id="aaname"  autocomplete="off">
  						<label for="hdate"><h3>Course:</h3></label>
  						<?PHP 
						if ($result22=mysqli_query($con,"SELECT * FROM `course` where `tid`=".$userarr[1]))
  					{
 		 	if(mysqli_num_rows($result22)>0){ echo '<select style="width:80%; height: 60%;" class="form-control" name="cid">';
  				 		while ($rowewe=mysqli_fetch_row($result22))
  			 			{
 		       				printf("<option value='%s'>%s</option>",$rowewe[0],$rowewe[1]);

  			 			}echo '</select>';}
  			 }
					?>
  						<label for="abatch"><h3>Name of batch:</h3></label>
							<?PHP 
						if ($result223=mysqli_query($con,"SELECT * FROM `abatches` "))
  					{
 		 	if(mysqli_num_rows($result223)>0){ echo '<select style="width:80%; height: 60%;" class="form-control" name="abatch">';
  				 		while ($roweweee=mysqli_fetch_row($result223))
  			 			{
 		       				printf("<option value='%s'>%s</option>",$roweweee[0],$roweweee[0]);

  			 			}echo '</select>';}
  			 }
					?>
						<label for="maxmarks"><h3>Max marks:</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="maxmarks" id="maxmarks"  autocomplete="off">
  						<label for="hdate"><h3>Date(YYYY-MM-DD):</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="aadate" id="aadate"  autocomplete="off">
						  <br>
  					<input type="submit" value="Add!"  class="btn btn-success" style="width:80%">	
  					</form>	
					</div>
				</div>
				<br><br><!-- notify for dates from here -->
				<button type="button" class="btn btn-info " style="width:90%" data-toggle="collapse" data-target="#viewAssign">View assessments</button><br><br>
				<div id="viewAssign" class="collapse">
					<ul>
					<?PHP 
						if ($result214=mysqli_query($con,"SELECT * FROM `tests` where `tid`=".$userarr[1]))
  					{
 		 				
  				 		while ($rowewe4l=mysqli_fetch_row($result214))
  			 			{

 		       				echo '<li>'.$rowewe4l[1].'</li>';

  			 			}
  			 }
					?>
					
					</ul>
				</div><!-- add marks here -->
				<hr class="hr1"><br>
				<!-- <button type="button" class="btn btn-success nowr" style="width:90%" data="1,attend.php">	Add a project</button><br><br> -->
				
				
				<button type="button" class="btn btn-warning" style="width:90%"  data-toggle="collapse" data-target="#holiday">Declare a holiday</button><br>
				<div id="holiday" class="collapse">
					<div class="form-group">
					<form method="post" action="index.php?action=holiday">
  						<label for="hdate"><h3>Date(YYYY-MM-DD):</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="hdate" id="hdate"  autocomplete="off">
						  <br>
  					<input type="submit" value="Declare a holiday!"  class="btn btn-success" style="width:80%">	
  					</form>	
					</div>
				</div>
				<br>
				<button type="button" class="btn btn-danger" style="width:90%" data-toggle="collapse" id="ptabtn" data-target="#pta">Call for a PTM</button><br><br>
				<div id="pta" class="collapse">
					<div class="form-group">
					<form method="post" action="index.php?action=ptm">
  						<label for="pdate"><h3>Date(YYYY-MM-DD):</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="pdate" id="pdate"  autocomplete="off">
						  <br>
  					<input type="submit" value="Notify!"  class="btn btn-danger" style="width:80%">	
  					</form>	
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
