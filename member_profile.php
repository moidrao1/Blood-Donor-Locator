<!DOCTYPE html>
<?php require_once("Donor.php"); ?>
<?php session_start();

if($_SESSION['Donor']== null )
{
header("Location: login.php");
}
?>
<html lang="en">

<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

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
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
				<div class="search-page">
						<div class="container">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
							<div class="panel panel-info">
								<div class="panel-heading">
								  <h2 class="panel-title">Donor Profile</h2>
								</div>
								<div class="panel-body">
								  <div class="row">
									<div class="col-md-3 col-lg-3" align="center">
									  <img src="img/user_pic.jpg" alt="Profile Picture" class="img-circle img-responsive">
									</div>
									<div class="col-md-9 col-lg-9">
									  <table class="table">
										<tbody>
										  <tr>
											<td>Name</td>
											<td><?php   echo $_SESSION['Donor']->Name; ?> </td>
										
										  </tr>
										  <tr>
											<td>Phone Number</td>
											<td><?php   echo $_SESSION['Donor']->PhoneNo; ?> </td>
										  </tr>
										  <tr>
											<td>Password</td>
											<td><?php   echo $_SESSION['Donor']->Password; ?> </td>
										  </tr>
										  <tr>
											<td>City</td>
											<td><?php   echo $_SESSION['Donor']->City; ?> </td>
										  </tr>
										  <tr>
											<td>Blood Group</td>
											<td><?php   echo $_SESSION['Donor']->BloodGroup; ?> </td>
										  </tr>
										  <tr>
											<td>Area</td>
											<td><?php   echo $_SESSION['Donor']->Area; ?> </td>
										  </tr>
										</tbody>
									  </table>
									</div>
								  </div>  
								</div>
								<div class="panel-footer">
  <form accept-charset="UTF-8" role="form" method="post" action="Controller.php?action=HideProfile">
							
						
				<ul class="nav navbar-nav navbar-right">
                    <li>
                       <input type="submit" value="HIDE PROFILE">
				    </li>
                </ul>
					
				</form>
							
							
								<span class="pull-right">
									<a href="Edit_profile.php"  data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
										<i class="glyphicon glyphicon-edit"></i>
									</a>
									
								</span>

								</div>
							</div>
						</div>

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
