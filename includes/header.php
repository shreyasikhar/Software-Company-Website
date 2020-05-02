 <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="" class="navbar-brand" href="index.php">
                <img src="../img/logo.jpeg" width="40px" height="25px" alt="logo" style="float:left;  padding-right:8%;" class="d-inline-block align-middle mr-2">
                <span style="float:left; font-size:25px; margin-bottom:8%" class="font-weight-bold align-middle">Software Solutions</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                     
                    <li><a href = "../php/logout.php"> Logout</a></li>

                    <?php
                } else {
                    ?>
                    <li><a href="#aboutus"> About Us</a></li>
                    <li><a href="#whywe"> Why We?</a></li>
                    <li><a href="#products"> Products</a></li>
                    <li><a href="#services"> Services</a></li>
                    <li><a href="#blogs"> Blogs</a></li>
                    <li><a href="#contactus"> Contact Us</a></li>                    
                    <li><a href="../php/login.php"> Login</a></li>
                    <?php
                }
                    ?>
            </ul>
        </div>
    </div>
</div>
