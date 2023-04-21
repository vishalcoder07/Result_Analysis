<?php
session_start(); 
if(!isset($_SESSION["id"]) ||!isset($_SESSION["otpsuccess"]))
{
   
	echo "<script>window.location.href='./Forgotpass.php';</script>";
}
?> 
<!doctype html>
<html lang="en">
  <head>
  	<title>Faculty Login</title>
	  <link rel="icon" type="image/png" href="../img/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
  
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Set New Password</h3>
						<form action="php/setpass.php" method="POST" class="login-form">
							
		      		<div class="form-group">
		      			<input type="password" class="form-control rounded-left" name="password1" placeholder="Enter New password" required>
		      		</div>
					  <div class="form-group">
		      			<input type="password" class="form-control rounded-left" name="password2" placeholder="RE-Enter New password" required>
		      		</div>
	           
	            <div class="form-group d-md-flex">
	           
	            	
								</div>
								
	         
	            <div class="form-group">
	            	<button type="submit" name="submit"class="btn btn-primary rounded submit p-3 px-5">Submit</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

