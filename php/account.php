<?php
    require "../includes/common.php";
    if(!isset($_SESSION["email"]))
    {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Software Solutions</title>
		<!-- Latest compiled and minified css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery Library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		
		<!-- Latest compiled and minified javascript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
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
        .info
        {
            border: 1px solid black; 
            padding: 10px 10px 10px 10px; 
            text-align:center;
        }
    </style>
    
        <?php include "../includes/header.php";
            $email=$_SESSION['email'];
            $sq="select * from user where email='$email'";
            $sqr = mysqli_query($con, $sq);
            $row = mysqli_fetch_array($sqr);
        ?>
        <br/><br/>
        <div class="cont container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="background-color:#fff;">
            <div id="content">
                <div>
                    <h1>Company's Report 1</h1>
                        <button class="btn btn-info" onclick="addValue1()">+1</button>
                        <button class="btn btn-danger" onclick="removeValue1()">-1</button>                   
                    
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
             <center><button id="exportChart" class="btn btn-primary">Download</button></center> 
            <script>
                $('#exportChart').on('click', function() {
                    var canvas = document.querySelector("#myChart");
                    var canvas_img = canvas.toDataURL("image/png",1.0); //JPEG will not match background color
                    var pdf = new jsPDF('landscape','in', 'letter'); //orientation, units, page size
                    pdf.addImage(canvas_img, 'png', .5, 1.75, 10, 5); //image, type, padding left, padding top, width, height
                    pdf.autoPrint(); //print window automatically opened with pdf
                    var blob = pdf.output("bloburl");
                    window.open(blob);
                });
            </script>
                
                <script>
                    var olddata = [0, 11, 34, 55, 91, 176, 231];
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',

                        // The data for our dataset
                        data: {
                            labels: ['2013', '2014', '2015', '2016', '2017', '2018', '2019'],
                            datasets: [{
                                label: "Employee's Growth Over Years",
                                //backgroundColor: 'rgb(0, 99, 132)',
                                borderColor: 'rgb(0, 99, 132)',
                                data: olddata
                            }
                            ]
                        },

                        // Configuration options go here
                        options: {}
                    });
                    // chart.render();
                    // console.log(chart.exportChart());
 	                // document.getElementById("exportChart").addEventListener("click",function(){
    	            // chart.exportChart({format: "jpg"});
                    // });  
                    function removeValue1()
                    {
                        chart.data.datasets[0].data.pop();
                        chart.update();
                    }
                    function addValue1()
                    {
                        chart.data.datasets[0].data.push(424);
                        chart.data.labels.push("2020");  
                        chart.update();
                    }
                </script>
            </div>
            <div class="col-lg-3 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12" style="background-color:#fff;">
                <center><h2>My Profile</h2></center><br/>
                <div class="info">
                    Name : <?php echo $row['name']; ?>
                </div>
                <div class="info">    
                    Employee ID : <?php echo $row['employeeid']; ?>
                </div>
                <div class="info">
                    Post : <?php echo $row['post']; ?>
                </div>
                <div class="info">
                    Salary (in Rs.): <?php echo $row['salary']; ?>
                </div>
                <div class="info">
                    Email : <?php echo $row['email']; ?>
                </div>
                <div class="info">
                    Due holidays in month : <?php echo 4; ?>
                </div>
                <div class="info">
                    Pending Tasks : <?php echo 2; ?>
                </div>
                <div class="info">
                    Completed Tasks : <?php echo 3; ?>
                </div>
                <br/>
            </div>

            <br/><br/><br/>
            <div style="padding-top:500px;" class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="background-color:#fff;">
            <div id="content">
                <div>
                    <h1>Company's Report 2</h1>
                        <button class="btn btn-info" onclick="addValue2()">+1</button>
                        <button class="btn btn-danger" onclick="removeValue2()">-1</button>                   
                    
                </div>
                <div class="card-body" style="padding-bottom:20px;">
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
            <center><button id="exportChart1" class="btn btn-primary">Download</button></center> 
            <script>
                $('#exportChart1').on('click', function() {
                    var canvas = document.querySelector("#myChart1");
                    var canvas_img = canvas.toDataURL("image/png",1.0); //JPEG will not match background color
                    var pdf = new jsPDF('landscape','in', 'letter'); //orientation, units, page size
                    pdf.addImage(canvas_img, 'png', .5, 1.75, 10, 5); //image, type, padding left, padding top, width, height
                    pdf.autoPrint(); //print window automatically opened with pdf
                    var blob = pdf.output("bloburl");
                    window.open(blob);
                });
            </script>
            <script>
                    var revenue = [0, 1.5, 4, 1.2, 4.5, 7.4, 13.2];
                    var ctx1 = document.getElementById('myChart1').getContext('2d');
                    var chart1 = new Chart(ctx1, {
                        // The type of chart we want to create
                        type: 'line',

                        // The data for our dataset
                        data: {
                            labels: ['2013', '2014', '2015', '2016', '2017', '2018', '2019'],
                            datasets: [{
                                label: "Company Revenue Over Years",
                                //backgroundColor: 'rgb(0, 99, 132)',
                                borderColor: 'rgb(0, 99, 132)',
                                data: revenue
                            }
                            ]
                        },

                        // Configuration options go here
                        options: {}
                    });
                    function removeValue2()
                    {
                        chart1.data.datasets[0].data.pop();
                        chart1.update();
                    }
                    function addValue2()
                    {

                        chart1.data.datasets[0].data.push(15.9);
                        chart1.data.labels.push("2020");  
                        chart1.update();
                    }
                </script>
        
        </div>

        <div class="col-lg-3 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
        </div>

        </div>


        <br/><br/><br/>
            <div style="padding-top:20px;" class="row">
            <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12" style="background-color:#fff;">
            <div id="content">
                <div>
                    <h1>Company's Report 3</h1>
                        <button class="btn btn-info" onclick="addValue3()">+1</button>
                        <button class="btn btn-danger" onclick="removeValue3()">-1</button>                   
                    
                </div>
                <div class="card-body" style="padding-bottom:20px;">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <center><button id="exportChart2" class="btn btn-primary">Download</button></center> 
            <script>
                $('#exportChart2').on('click', function() {
                    var canvas = document.querySelector("#myChart2");
                    var canvas_img = canvas.toDataURL("image/png",1.0); //JPEG will not match background color
                    var pdf = new jsPDF('landscape','in', 'letter'); //orientation, units, page size
                    pdf.addImage(canvas_img, 'png', .5, 1.75, 10, 5); //image, type, padding left, padding top, width, height
                    pdf.autoPrint(); //print window automatically opened with pdf
                    var blob = pdf.output("bloburl");
                    window.open(blob);
                });
            </script>
            <script>
                    var area = [1, 1, 2, 2, 4, 7, 13];
                    var ctx2 = document.getElementById('myChart2').getContext('2d');
                    var chart2 = new Chart(ctx2, {
                        // The type of chart we want to create
                        type: 'line',

                        // The data for our dataset
                        data: {
                            labels: ['2013', '2014', '2015', '2016', '2017', '2018', '2019'],
                            datasets: [{
                                label: "Contries Covered Over Years",
                                //backgroundColor: 'rgb(0, 99, 132)',
                                borderColor: 'rgb(0, 99, 132)',
                                data: area
                            }
                            ]
                        },

                        // Configuration options go here
                        options: {}
                    });
                    function removeValue3()
                    {
                        chart2.data.datasets[0].data.pop();
                        chart2.update();
                    }
                    function addValue3()
                    {

                        chart2.data.datasets[0].data.push(18);
                        chart2.data.labels.push("2020");  
                        chart2.update();
                    }
                </script>
        
        </div>

        <div class="col-lg-3 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
        </div>

        </div>
        <br/><br/><br/>
        <?php  include "../includes/footer.php";?>
    </body>
</html>    