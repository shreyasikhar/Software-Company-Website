<?php
require "../includes/common.php";
if(isset($_SESSION['email']))
{
	header('location:account.php');	
}
$emailErr ="";
$branchErr="";
$insertErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name=$_POST['name'];
    $post=$_POST['post'];
    $employeeid=$_POST['employeeid'];
    $employeeid="EMP".$employeeid;
    $salary=$_POST['salary'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query = "SELECT id FROM user WHERE email='$email'";
	$result = mysqli_query($con, $query) or die("Email Check Query is not working");
	$num = mysqli_num_rows($result);
	if ($num != 0) 	
	{
		?>
			<script>
				window.alert("Email Already Exists...!!!");
			</script>
		<?php
	}	
	else
		{	
            $name=mysqli_real_escape_string($con,$name);
            $post=mysqli_real_escape_string($con, $post);
            $employeeid=mysqli_real_escape_string($con, $employeeid);
            $salary=mysqli_real_escape_string($con, $salary);
			$email=mysqli_real_escape_string($con,$email);
			$password=md5(mysqli_real_escape_string($con,$password));
			if($name != "" && $post != "" && $employeeid != "" && $salary != "" && $email != "" && $password != "" )
			{
				$iq="insert into user (name,post, employeeid, salary, email, password) values ('$name','$post', '$employeeid', '$salary', '$email','$password')";
				mysqli_query($con,$iq);
				$_SESSION['id']=mysqli_insert_id($con);
				$_SESSION['email']=$email;
				header('location:account.php');
			}
			else
			{
			?>
			<script>
				window.alert("All fields are mandatory");
			</script>
			<?php
			}		
		}
}	
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Software Solutions</title>	
   		<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body style="background-color:#ededed">
		<?php
			include '../includes/header.php';
		?>	
		<style>
            .cont
            {
                padding-top:80px;
            }
			* {
            font-family: "Roboto";
        	}
        </style>
  <div class="container">
	<div class="row">
		<div class="cont col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-xs-12">
				<br><br><br>
				<div class="panel panel-primary">
				<div class="panel-heading"><center><h4>REGISTER</h4></center></div>
				<div class="panel-warning" style="color:red; background-color:#f1f1f1; padding:10px 10px 10px 10px;"><strong>* Do not create new account if you have created account in previous session.<br/>* Only one account per employee is allowed.</strong></div>
				<div class="panel-body" style="background-color:#f1f1f1;">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					
					<div class="form-group">
					<label for="name">Name</label>
						<input type="text" class="form-control" name="name" id="name" pattern="[a-z]{4, 20}" title="4 to 20 Characters" required placeholder="Enter Name">
					</div>

                    <div class="form-group form-control">
						<label for="post">Select Post </label>
						<select name="post" id="post">
							<option value="IT consultant">IT consultant</option>
							<option value="Cloud architect">Cloud architect</option>
							<option value="Mobile application developer">Mobile application developer</option>
							<option value="Web developer">Web developer</option>
                            <option value="Software engineer">Software engineer</option>
                            <option value="Health IT specialist">Health IT specialist</option>
						</select>
					</div>

                    <div class="form-group">
					<label for="employeeid">Employee ID</label>
						<input type="text" class="form-control" name="employeeid" id="employeeid" required placeholder="Enter Employee ID">
					</div>

                    <div class="form-group">
					<label for="salary">Salary</label>
						<input type="text" class="form-control" name="salary" id="salary" required placeholder="Enter Salary (in Rs.)">
					</div>

					<div class="form-group">
					<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$" title="Enter valid email" required placeholder="Enter Email">
					</div>	
					<div class="form-group">
					<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Enter Password">
					</div>
					<!-- <p style="color:red;"><?php //echo $insertErr; ?></p>  -->
 			   <center><button type="submit" name="type" value="user" class="btn btn-primary">Submit</button></center>  
					</form>
				</div>
				<div class="panel-footer"><a href="login.php">Already have an account? Login Here</a></div>
			</div>
		</div>
	</div>			
  </div>

<br><br><br><br><br>
<?php  include "../includes/footer.php";?>
	</body>
</html>