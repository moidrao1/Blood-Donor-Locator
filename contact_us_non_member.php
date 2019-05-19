<!DOCTYPE html>
<html lang="en">
<?php require_once("Donor.php"); ?>
<?php session_start();

if($_SESSION['Donor']!= null )
{
	if($_SESSION['Donor']->Is_Admin==0 )
	{
header("Location: member_profile.php");	
	}
	if($_SESSION['Donor']->Is_Admin==1 )
	{
		
header("Location: admin_profile.php");
	}
	
}
$param=null;
if(isset($_GET["error"])){

$param=$_GET["error"];
	
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="index.php">Blood Donor Locator</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="register.php">Join Us</a>
                    </li>
					
					<li>
                        <a href="#about">About Us</a>
                    </li>
                    <li>
                        <a href="contact_us_non_member.php">Contact Us</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="login-page">
		<div class="container-fluid">
					<div class="container">
						<h2 style="color: white">Contact Us</h2>
					  
						<form role="form" class="form-horizontal"  form method="post" action="Controller.php?action=ContactMessage">
							<div class="form-group">
							  <label style="color: white" class="col-sm-2" for="inputBody">Name</label>
							  <div class="col-sm-8"><textarea class="form-control" name="ContactName" id="inputBody" rows="1"></textarea></div>
							
							</div>
							<div class="form-group">
							  <label style="color: white" class="col-sm-2" for="inputBody">Mobile Number</label>
							  <div class="col-sm-8"><textarea class="form-control" name="ContactNumber" id="inputBody" rows="1"></textarea></div>
							
							</div>
							<div class="form-group">
							  <label style="color: white" class="col-sm-2" for="inputBody">Message</label>
							  <div class="col-sm-8"><textarea class="form-control" name="MessageText" id="inputBody" rows="10"></textarea></div>
							</div>
						
					  <div>
						<input type="submit" value="Send"></input>
						
					  </div>
					  </form>
					  <?php 
if($param){
?>
<div class="alert alert-error alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <strong>Status :  </strong><?php  echo $param ?></div>

<?php }?>

					</div>
					<!-- /.container -->

            </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
