<!DOCTYPE html>
<html lang="en">
<?php require_once("Donor.php"); ?>
<?php session_start();

if($_SESSION['Donor']==null)
{
header("Location: login.php?");
}
$result=0;
if(isset($_SESSION['AdminSearchBlood']) && isset($_SESSION['AdminSearchLocation']) )
{
	
$BloodGroup =$_SESSION['AdminSearchBlood'];
$Location =$_SESSION['AdminSearchLocation'];

$result=Donor::getAllSearchDonors($BloodGroup,$Location);
if(sizeof($result>0))
{
	$mobileNumber=Donor::getAllMObileNumer($result);
}
	$_SESSION['AdminSearchBlood']=null;
	$_SESSION['AdminSearchLocation']=null;
}
$param=null;
if(isset($_GET["error"])){

$param=$_GET["error"];
	
}

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blood Donor Locator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Table Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
	
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
                <form accept-charset="UTF-8" role="form" method="post" action="Controller.php?action=logout">
							
						
				<ul class="nav navbar-nav navbar-right">
                    <li>
                       <input type="submit" value="Logout">
				    </li>
                </ul>
					
				</form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav pad50top" >
                <li class="sidebar-brand">
                    <a href="#">
                        Account
                    </a>
                </li>
                <li>
                    <a href="member_profile.php">Profile</a>
                </li>
                <li>
                    <a href="messages.php">Messages</a>
                </li>
                <li>
                    <a href="donations.php">Donations</a>
                </li>
                <li>
                    <a href="search.php">Search Blood</a>
                </li>
                <li>
                    <a href="contact_us.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
				<div class="search-page">
					<h2>Search Blood</h2>
					<div class="row">    
						<div class="col-xs-8 col-xs-offset-2">
							 <form  role="form" method="post" action="Controller.php?action=MemberSearchBlood">
							<div class="input-group">
							<!-- insert this line -->
								

								<select class="selectpicker form-control input-lg" name="BloodGroup" id="select_blood_group">
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
								<input type="text" class="form-control input-lg" id="Location" name="locationID" placeholder="Enter location or use your current location...">
								<span class="input-group-btn">  
									
										<button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span></button>
									
								</span>
								<span class="input-group-btn">
									<button class="btn btn-default btn-lg" onclick="initialize()" type="button"><span class="glyphicon glyphicon-map-marker"></span></button>
								</span>
							</div>
							<?php 
if($param){
?>
<div class="alert alert-error alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <strong>Error :  </strong><?php  echo $param ?></div>

<?php }?>
						</div>
									
						<br>
						<br>
						<br>
						
						<!-- /.modal -->			
					<?php 
if($result !=0){
?>						
						
										<table class="table table-bordered" style="background-color:#CD0000; color: white;">
						  <thead>
							<tr>
					
							  <th>Name</th>
							  <th>Blood Group</th>
							  <th>Area</th>
							  <th>City</th>
						
							</tr>
						  </thead>
						   <?php foreach ($result as $K){
                echo'<tbody>';
                echo'<tr>'; 
                echo'<td>'. $K['name'].'</td>';
                echo'<td>'. $K['bloodgroup'].'</td>';
                echo'<td>'. $K['Area'].'</td>';
                echo'<td>'. $K['city'].'</td>';
                echo'<td>'. $_SESSION['Donor']->PhoneNo.'</td>';
   		        echo'<tr>';
                echo'</tbody>';
				
              }
            ?>			
						</table>						
						
<?php }?>						
						
					</div>
				</div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

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
		     document.getElementById("Location").value =address;
     
    
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
