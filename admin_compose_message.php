<!DOCTYPE html>
<html lang="en">
<?php require_once("Donor.php"); ?>
<?php session_start();

if($_SESSION['Donor']== null || $_SESSION['Donor']->Is_Admin== 0 )
{
header("Location: login.php");
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

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
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
            <ul class="sidebar-nav pad50top">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin Account
                    </a>
                </li>
                <li>
                    <a href="admin_profile.php">Profile</a>
                </li>
                <li>
                    <a href="admin_inbox.php">Inbox</a>
                </li>
                <li>
                    <a href="admin_messages.php">Sent Messages</a>
                </li>
                <li>
                    <a href="admin_compose_message.php">Write Message</a>
                </li>
                <li>
                    <a href="admin_search_blood.php">Search Blood</a>
                </li>
                <li>
                    <a href="admin_donors.php">Donors List</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
				<div class="search-page">
					<div class="container">
					<!-- /.modal compose message -->
						<div id="modalCompose">
								<h4 class="modal-title">Compose Message</h4>
							  
								<form role="form" class="form-horizontal"  form method="post" action="Controller.php?action=ComposeMessage">
									<div class="form-group">
									  <label class="col-sm-2" for="inputTo">Blood Group</label>
										<div class="form-group col-sm-8" >
											  <select class="form-control" name="BloodGroup" id="select_blood_group">
												<option value="0" disabled selected>Blood Group</option>
												<option value="ALL">All</option>
												<option value="A-">A-</option>
												<option value="A+">A+</option>
												<option value="B+">B+</option>
												<option value="B-">B-</option>
												<option value="O+">O+</option>
												<option value="O-">O-</option>
												<option value="AB+">AB+</option>
												<option value="AB-">AB-</option>
											  </select>
										</div>	
									</div>
									<div class="form-group">
									  <label class="col-sm-2" for="inputSubject">City</label>
										<div class="form-group col-sm-8">
											  <select class="form-control" name="Location" id="select_city">
												<option value="0" disabled selected>City</option>
												<option>All</option>
												<option>Abbottabad</option>
												<option>Bahawalnagar</option>
												<option>Bahawalpur</option>
												<option>Chakdara</option>
												<option>Chakwal</option>
												<option>Chaman</option>
												<option>Chiniot</option>
												<option>Dera Ghazi Khan</option>
												<option>Dera Ismail Khan</option>
												<option>Faisalabad</option>
												<option>Gojra</option>
												<option>Gujranwala</option>
												<option>Gujrat</option>
												<option>Hafizabad</option>
												<option>Hyderabad</option>
												<option>Islamabad</option>
												<option>Jacobabad</option>
												<option>Jhang</option>
												<option>Jhelum</option>
												<option>Karachi</option>
												<option>Kasur</option>
												<option>Khairpur</option>
												<option>Khanewal</option>
												<option>Khanpur</option>
												<option>Lahore</option>
												<option>Larkana</option>
												<option>Mandi Bahauddin</option>
												<option>Mardan</option>
												<option>Mirpur Khas</option>
												<option>Multan</option>
												<option>Muridke</option>
												<option>Muzaffargarh</option>
												<option>Nawabshah</option>
												<option>Nowshera</option>
												<option>Okara</option>
												<option>Pakpattan</option>
												<option>Peshawar</option>
												<option>Quetta</option>
												<option>Rahim Yar Khan</option>
												<option>Rawalpindi</option>
												<option>Sadiqabad</option>
												<option>Sahiwal</option>
												<option>Sargodha</option>
												<option>Shekhupura</option>
												<option>Shikarpur</option>
												<option>Sialkot</option>
												<option>Sukkur</option>
												<option>Swabi</option>
												<option>Taxila</option>
												<option>Toba Tek SIngh</option>
												<option>Wazirabad</option>
											  </select>
										</div>		
									</div>
									<div class="form-group">
									  <label class="col-sm-2" for="inputBody">Message</label>
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
						</div><!-- /.modal compose message -->

					</div>
					<!-- /.container -->

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

</body>

</html>
