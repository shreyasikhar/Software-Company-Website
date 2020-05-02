<?php
    require '../includes/common.php';
    if(isset($_SESSION['email']))
    {
       header('location:account.php');
    }
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$name=$_POST['name'];
        $contact=$_POST['contact'];
        $message=$_POST['message'];
		$name=mysqli_real_escape_string($con,$_POST['name']);
		$contact=mysqli_real_escape_string($con,$_POST['contact']);
		$message=mysqli_real_escape_string($con,$_POST['message']);
		if($name!="" && $contact!="" && $message!="")
		{
            $iq="insert into response (name, contact, message) values ('$name', '$contact', '$message')";
            $iqr=mysqli_query($con, $iq) or die(mysqli_error($con));
		?>
			<script>
				window.alert("Your response is recorded...!!!");
			</script>
		<?php	
		}	
        else
        {
            ?>
            <script>
            window.alert("All fields are mandatory...!!!");
        </script>
        <?php
		}	
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Software Solutions</title>	
        <!--  Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
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
        * {
            font-family: "Roboto";
        }
        .cont {
            padding-top:165px;
        }
        #top {
            padding-right:3%;
            float:right;
        }
        @media screen and (max-width: 768px){
            #top{
                padding-top:18%;
            }
        }
        @media screen and (min-width: 768px){
            #top{
                padding-top:14%;
            }
        }
        @media screen and (min-width: 992px){
            #top{
                padding-top:6%;
            }
        }
        @media screen and (min-width: 1200px){
            #top{
                padding-top:5%;
            }
        }
        .carousel-inner img {
            width: 100%;
            height: 400px !important;
        }
        </style>
        <div id="top">	
		    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="No New Notifications">Notifications</button>
        </div>

        <!-- Carousel -->
<section id="home">        
<div class="cont">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="width:100%">
            <div class="item active">
                 <img src="../img/image1.jpg" alt="Los Angeles" style="width:100%; height:500px;">
            </div>

            <div class="item">
                  <img src="../img/image2.jpg" alt="Chicago" style="width:100%; height:500px;">
            </div>

            <div class="item">
                  <img src="../img/image3.jpg" alt="Chicago" style="width:100%; height:500px;">
            </div>

            <div class="item">
                  <img src="../img/image4.jpg" alt="Chicago" style="width:100%; height:500px;">
            </div>

            <div class="item">
                  <img src="../img/image5.jpg" alt="Chicago" style="width:100%; height:500px;">
            </div>
        
            <div class="item">
                  <img src="../img/image6.jpg" alt="New york" style="width:100%; height:500px;">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</section>

<!-- About Us -->
<section id="aboutus">
    <div style="padding-top:150px; padding-bottom:240px;" class="container">
        <div class="row">
            <h1 style="text-align:center;">About Us</h1></br></br>
            <h3 style="text-align:center;">MEET OUR TEAM</h3></br>
            <h4 style="text-align:center; word-spacing:5px; letter-spacing:1px; line-height:1.6;">
                We are all very different. We were born in different cities, at different times, we love different music, food, movies. But we have something that unites us all. It is our company. We are its heart. We are not just a team, we are a family.
            </h4><br/>
            <div class="text-center"><a href="#contactus">
                    CONTACT US</a>
            </div>
        </div>
    </div>
<section>

<!-- Why We? -->
<section id="whywe">
    <div style="padding-top:150px; padding-bottom:240px;" class="container">
        <div class="row">
            <h1 style="text-align:center;">Why We ?</h1></br></br>
            <h4 style="text-align:center; word-spacing:5px; letter-spacing:2px; line-height:1.6;">
                Our team is working to provide you the software solutions of different problems that the people suffers in their day-to-day life.
            </h4><br/>
        </div>
    </div>
<section>

<!-- Products -->
<section id="products">
    <div style="padding-top:150px; padding-bottom:240px;" class="container">
        <div class="row">
        <h1 style="text-align:center;">Our Products</h1></br></br>
        <h4 style="text-align:justify; padding-left:25%">
            <ul style="line-height:1.6;">
                <li>TimeCheck - Time & Attendance Software</li>
                <li>iStore - Online Ecommerce Storefront Solutions</li>
                <li>ShowTime - Event Management App & Membership Management Software</li>
                <li>AURA - Web Based Quality Management Software</li>
            </ul>
        </h4>     
        </div>
    </div>    
</section>

<!-- Services -->
<section id="services">
    <div style="padding-top:150px; padding-bottom:240px;" class="container">
        <div class="row">
        <h1 style="text-align:center;">Our Services</h1></br></br>
        <h4 style="text-align:justify; padding-left:25%">
            <ul style="line-height:1.6;">
                <li>Mobile App Development</li>
                <li>Web App Development</li>
                <li>DevOps</li>
                <li>AWS Support & Maintenance</li>
                <li>Software Testing - Manual & Automation</li>
                <li>UI / UX Software Design</li>
                <li>SEO</li>
            </ul>
        </h4>
        </div>
    </div>
</section>

<section id="blogs">
        <h1 style="text-align:center; padding-top:120px;">Our Blogs & Reviews</h1></br></br>
        <div style="border: 1px solid black; padding: 2px 10px 2px 10px; text-align:justify;">
            <h4><img src="../img/male.jpeg" width="20px" height="20px"> Abhishek Wadmare</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.</p>
        </div>
        <div style="border: 1px solid black; padding: 2px 2px 2px 8px; text-align:justify;">
            <h4><img src="../img/male.jpeg" width="20px" height="20px"> Gautam Helange</h4>
            <p>Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis.</p>
        </div>
        <div style="border: 1px solid black; padding: 2px 2px 2px 8px; text-align:justify;">
            <h4><img src="../img/male.jpeg" width="20px" height="20px"> Rohit Mali</h4>
            <p>In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.</p>
        </div>
        <div style="border: 1px solid black; padding: 2px 2px 2px 8px; text-align:justify;">
            <h4><img src="../img/male.jpeg" width="20px" height="20px"> Shubham Shinde</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.</p>
        </div>
        <div style="border: 1px solid black; padding: 2px 2px 2px 8px; text-align:justify;">
            <h4><img src="../img/male.jpeg" width="20px" height="20px"> Ankit Pareek</h4>
            <p>Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis.</p>
        </div>
        <div style="border: 1px solid black; padding: 2px 2px 2px 8px; text-align:justify;">
            <h4><img src="../img/male.jpeg" width="20px" height="20px"> Jayesh Vadnere</h4>
            <p>In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.</p>
        </div>
        <div style="border: 1px solid black; padding: 2px 2px 2px 8px; text-align:justify;">
            <h4><img src="../img/male.jpeg" width="20px" height="20px"> Omkar Andhare</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio, vitae scelerisque enim ligula venenatis dolor. Maecenas nisl est, ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Mauris ante ligula, facilisis sed ornare eu, lobortis in odio. Praesent convallis urna a lacus interdum ut hendrerit risus congue. Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta. Cras ac leo purus. Mauris quis diam velit.</p>
        </div>    
</section>

<!-- Feedback -->
<section id="contactus">
<div style="padding-top:60px;" class="container">
    <div class="row col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-12">
        <h1 class="text-center">Contact Us</h1><br/>
        <div class="panel panel-primary">
        <div class="panel-heading"><center>MESSAGE/FEEDBACK</center></div>
        <div class="panel-warning" style="color:red; background-color:#ededed; padding: 10px 10px 10px 10px;"><strong>* Explain your message/feedback in detail, if any</strong></div>
        <div class="panel-body" style="background-color:#f1f1f1;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group">   
                    <label>Name</label><br>
                    <input type="text" class="form-control" name="name" required placeholder="Enter your full name"/>
                </div>
                <div class="form-group">   
                    <label>Contact Number</label><br>
                    <input type="text" class="form-control" name="contact" required placeholder="Enter your contact number"/>
                </div>
                <div class="form-group">
                    <label>Message/Feedback</label><br>
                    <input type="text" class="form-control" name="message" required placeholder="Enter your message/feedback"/>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>					                        						
            </form>
        </div>
        </div>
    </div>
</div>
</section>

        <br/><br/><br/><br/>
        <center><button type="submit" class="btn btn-info"><a href="#home" style="text-decoration:none">GO TO TOP <span class="glyphicon glyphicon-arrow-up"></span></a></button></center>
        <br/><br/><br/><br/>
        <?php  include "../includes/footer.php";?>
</body>
</html>
                