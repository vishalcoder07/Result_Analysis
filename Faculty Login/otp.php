<?php
session_start(); 
if(!isset($_SESSION["id"] ))
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
   <style>
	   span#ot {
          color: green;
          padding: 15px;
      }
	   </style>
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
		      	<h3 class="text-center mb-4">OTP VERIFICATION</h3>
						<form action="php/otpverification.php" method="POST" class="login-form">
							<h6 id="ot" class="text-center text-success mb-3">Otp has been successfully sent to your Email</h6>
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="otp" placeholder="Enter otp" required>
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

