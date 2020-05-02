<?php
	require '../includes/common.php';
	if(isset($_SESSION['email']))
	{
		header('location:account.php');			
	}
	
	$loginErr="";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=md5(mysqli_real_escape_string($con,$_POST['password']));
		$sq="select id, email from user where email='$email' and password='$password'";
		$sqr=mysqli_query($con,$sq) or die(mysqli_error($con));
		if(mysqli_num_rows($sqr)==0)
		{
		?>
			<script>
				window.alert("Wrong Password or Email Id...!!!");
			</script>
		<?php
		}	
		else{
			$row=mysqli_fetch_array($sqr);
			$_SESSION['email']=$row['email'];
			$_SESSION['id']=$row['id'];
			header('location: account.php');
		}
	}		
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Software Solutions</title>
		<!-- Latest compiled and minified css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery Library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		
		<!-- Latest compiled and minified javascript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body> 
    <style>
        .cont 
        {
            padding-top:80px;
        }
		* {
            font-family: "Roboto";
        }
        body
        {
            background-color:#ededed;
        }
    </style>
		<?php include "../includes/header.php";?>
		<div class="cont container">
		<div class="row">
			<div class="cont col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><center>LOGIN</center></div>
					<div class="panel-warning" style="color:red; background-color:#f1f1f1; padding:10px 10px 10px 10px;"><strong>* Use previous sessions username and password for login. Do not create new account if you have created account in previous session.<br/>* Only one account per employee is allowed.</strong></div>
					<div class="panel-body" style="background-color:#f1f1f1;">
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter email-id" required>
							</div>	
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
							</div>
							<!-- <p style="color:red;"><?php //echo $loginErr; ?></p> -->
							<center><button type="submit" class="btn btn-primary">Login</button></center>
						</form>
					</div>
					<div class="panel-footer">
						<a href="signup.php" style="text-decoration:none;">Don't have an account? Register</a>
						<!-- <a href="resetPassword.php" style="float:right; text-decoration:none;">Forgot Password?</a> -->
					</div>
				</div>
			</div>
		</div>
		</div>
		<br/><br/></br>
		<?php  include "../includes/footer.php";?>
	</body>
</html>
