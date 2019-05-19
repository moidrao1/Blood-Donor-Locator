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

    <title>Blood Donor Locator</title>

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
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Blood Donor Locator</h1>
                        <h3>Easy to search. Easy to donate.</h3>
						
						<!-- Search Bar -->
						
						<div class="container">
							<div class="row">    
								<div class="col-xs-8 col-xs-offset-2">
								<form  role="form" method="post" action="Controller.php?action=nonMemberSearch">
									<div class="input-group">
									<select class="selectpicker form-control input-lg" name="BloodGroup"id="select_blood_group" >
										<option value="" disabled selected>Blood Group</option>
										<option>All</option>
										<option>A-</option>
										<option>A+</option>
										<option>B+</option>
										<option>B-</option>
										<option>O+</option>
										<option>O-</option>
										<option>AB+</option>
										<option>AB-</option>
									</select>
									<span class="input-group-addon" style="width:0px; padding-left:0px; padding-right:0px; border:none;"></span>
	  
										<input type="hidden" name="search_param" value="all" id="search_param">         
										<input type="text" id="locationID" class="form-control input-lg" name="location" placeholder="Enter Location or use your current location...">
										<span class="input-group-btn">  
											
												<button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span></button>
											
										</span>
										<span class="input-group-btn">
											<button class="btn btn-default btn-lg"  onclick="initialize()" type="button"><span class="glyphicon glyphicon-map-marker"></span></button>
										</span>
										
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
							</div>
						</div>

						<!-- Search Bar -->
						
                        <hr class="intro-divider">
						
                        <ul class="list-inline intro-social-buttons">
							<li>
								<a href="login.php" class="btn btn-default btn-lg">&nbsp&nbsp&nbsp&nbsp&nbsp Log In &nbsp&nbsp&nbsp&nbsp</a>
							</li>
							<li>
								<a href="register.php" class="btn btn-default btn-lg">&nbsp&nbsp&nbsp&nbsp Join Us &nbsp&nbsp&nbsp&nbsp</a>
							</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Save a Life</h2>
                    <p class="lead">
						Blood donors play an integral role in the delivery of modern healthcare. Many life-saving medical treatments and procedures involve blood transfusions and would not be possible without a safe and reliable blood supply
					</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/save.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading"><a name="about_us">Find nearest donor</a></h2>
                    <p class="lead">
						You can find donors that are near to your location. View them on google maps.
					</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/map.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading"><a name="contact_us">Our Mission</a></h2>
                    <p class="lead">
						To fulfill the needs of the Pakistani people for the safest, most reliable and most cost-effective blood services through voluntary donations. 
					</p>

                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/mission.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to BDL:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>

                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

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
	




	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDijAq9kF6c8MfSeLgow3EXh1AKufKJWvg&sensor=false"></script> 
<script type="text/javascript"> 
 var geocoder = new google.maps.Geocoder();
 
  function initialize() {
  
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
  }

//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}


  function codeLatLng(lat, lng) {
       
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
	
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
     
    
			var address=results[1].formatted_address;
		     document.getElementById("locationID").value =address;
     
    
        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
</script> 

</body>

</html>
