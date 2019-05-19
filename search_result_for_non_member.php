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

$BloodGroup =$_SESSION['NonMemberSearchBlood'];
$Location =$_SESSION['NonMemberSearchLocation'];

$result=Donor::getAllSearchDonors($BloodGroup,$Location);
$_SESSION['NonMemberSearchBlood']=null;
$_SESSION['NonMemberSearchLocation']=null;
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blood Donor Locator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Table Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">

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
                <a class="navbar-brand topnav" href="#">Blood Donor Locator</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li>
						<a href = "index.php">Search</a>
					</li>
                    <li>
                        <a href="#about_us">About Us</a>
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

    <div class="search-page">
		<h2 name="about">
			Search Results
		</h2>
		<div class="container">
		
		<!-- /.modal -->			
		<div id="myModal" class="modal fade in">
				<div class="modal-dialog">
					<div class="modal-content">
		 
						<div class="modal-header">
							<h4 class="modal-title">AUTHENTICATION REQUIRED</h4>
						</div>
						<div class="modal-body">
							<h3>Login Or Signup in order to view the Details</h3>
							 <ul class="list-inline intro-social-buttons">
							<li>
								<a href="login.php" class="btn btn-default btn-lg">&nbsp&nbsp&nbsp&nbsp&nbsp Log In &nbsp&nbsp&nbsp&nbsp</a>
							</li>
							<li>
								<a href="register.php" class="btn btn-default btn-lg">&nbsp&nbsp&nbsp&nbsp Join Us &nbsp&nbsp&nbsp&nbsp</a>
							</li>
                        </ul>
						</div>
						
						<div class="modal-footer">
							<div class="btn-group">
								<button class="btn btn-primary" data-dismiss="modal" ><span class="glyphicon glyphicon-check"></span> OK</button>
							</div>
						</div>
		 
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dalog -->
			</div><!-- /.modal -->			
							
			<table  class="table table-bordered" style="background-color:#CD0000; color: white;">
			  <thead>
				<tr>
				  
				  <th>Name</th>
				  <th>Blood Group</th>
				  <th>Area</th>
				  <th>City</th>
				  <th>Details</th>
				</tr>
			  </thead>
</tr>
                 <?php foreach ($result as $K){
                echo'<tbody>';
                echo'<tr>'; 
                echo'<td>'. $K['name'].'</td>';
                echo'<td>'. $K['bloodgroup'].'</td>';
                echo'<td>'. $K['Area'].'</td>';
                echo'<td>'. $K['city'].'</td>';
   		        echo '<td><a  href="#myModal" data-toggle="modal" id="DetaiLID"  name='.$K['member_id'].' type="text" style="color:white;"> <u>Get Details</u> </a> </td>';
                echo'<tr>';
                echo'</tbody>';
              }
            ?>				  
			  </table>
		</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>


	<a  name="contact"></a>

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
