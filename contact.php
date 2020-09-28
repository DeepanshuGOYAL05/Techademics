
<!DOCTYPE html>
<html lang="en">	
<head>
	
	<title>Contact-us</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset="utf-8"> 
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Permanent+Marker" rel="stylesheet">
     



	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="contact.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		@import 'https://fonts.googleapis.com/css?family=Baloo+Bhai|Roboto+Condensed';
	</style>
	<script>
	$(document).ready(function(){

		$("h4 a").attr('target','_blank');
		$("#logout").click(function(){
			window.location='logout.php';
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
	  
     
	
	  <style>
	 .carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
	 </style>
	 
	 
	
<style>
ul li {list-style:none;}
ul li a{color:black; font-weight:bold;}
ul li a:hover{text-decoration:none;}
</style>
	<meta name="theme-color" content="#42bcf4">
	
	<!--<script>
		$(document).ready(function(){
			var myvar='<center><h1>Account created!</h1><h2>user ID is<br></h2></center>';
      var btnvar ='<button type="button" class="form-submit goto" style="width:81%" data="0,index.php">Go to login page</button>';-->
	<?PHP
	include'gen.php';
    $con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	//$_SESSION['usr'];


 
	if(isset($message))
	{
		echo $name;
		echo $msgtxt;
		echo $email;
		echo $phone;
		if(mysqli_query($con,"insert into tblmessage(fld_name,fld_email,fld_phone,fld_msg) values ('$name','$email','$phone','$msgtxt')"))
		{
			echo "<script> alert('We will be Connecting You shortly')</script>";
		}
		else
		{
			echo "failed";
		}
   }
   

   // echo'$("#after").append(btnvar);';
  
  // Fetch one and one row
  // while ($row=mysqli_fetch_row($result))
  //   {

  //       // printf ("%s",$row[0]);
  //   }
  // // Free result set
  // mysqli_free_result($result);

mysqli_close($con);
  

?>
		
</head>

<body>

    
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
<!--navbar ends-->
<div class="fixed-top">
  <header class="topbar">
  	
		 
      <div class="container">
	  
        <div class="row">
		
          <!-- social icon-->
          <div class="col-sm-12">
		  
		<!-- <p style="color: white; margin-top:25px; float: right; font-size:20px; margin-bottom:15px; margin-right:465px;"><?PHP  echo 'Welcome, '.$fname[0];  ?></p>
-->
		 
			
          </div>

        </div>
      </div>
  </header>
  <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear" >
    <div class="container" >
      <a class="navbar-brand" href="index.html" style="text-transform: uppercase; font-size:35px;  "> Techademics</a>
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

          <li class="nav-item active" style="margin-top:10px; margin-right:10px;" >
            <a class="nav-link" href="#">About</a>
          </li>

         <li class="nav-item active" style="margin-top:10px; margin-right:10px;">
            <a class="nav-link" href="#">Help</a>
          </li>

         
          <li class="nav-item active" style="margin-top:10px; margin-right:10px; color:white;">
			<a class="nav-link" href="#">Contact</a>
			
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="container-fluid">
  <img src="contact.bmp" width="100%">
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-8" style="padding:20px; border:1px solid #F0F0F0;">
	    <form method="post">
            <div class="form-group">
                 <input type="text" class="form-control"  placeholder="Name*" name="name" required/>
            </div>
			<div class="form-group">
                 <input type="email" class="form-control"  placeholder="email*"  name="email" required/>
            </div>
			<div class="form-group">
                 <input type="tel" class="form-control" pattern="[6-9]{1}[0-9]{9}"  name="phone" placeholder="Phone(optinal) EX 9213298761"/>
			</div>
			<select class="form-group" name="type" id="acctype">
            <option value="t">Teacher</option>  
  						<option value="s">Student</option>
  						<option value="p">Parent</option>  
  						
					</select>
              
					<label for="studid" id="ls_uid"><h3>Enter ward's userid:</h3></label>
  					<input type="text" class="form-group" value="<?PHP if($_GET['submit']=='true'){echo $_POST['studid'];}?>" id="s_uid" name="studid">
			<div class="form-group">
                <textarea class="form-control"    placeholder="Message*" name="msgtxt" rows="3" col="10" required/></textarea/>
            </div>
			<div class="form-group">
                   <button type="submit" name="message" class="btn btn-danger">Send Message</button>
            </div>
        </form>
	</div>
    <div class="col-sm-4" style="padding:30px;">
	   <div class="form-group">
           <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<b>7988587806</b><br><br>
			<i class="fa fa-home" aria-hidden="true"></i>&nbsp; Old Railway Road, Mohindergarh<br>(24*7 Days)
	       
	   </div>
	</div>
  </div>
</div>
<br><br>
 
	</body>
</html>