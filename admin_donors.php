<!DOCTYPE html>
<html lang="en">
<?php require_once("Donor.php"); ?>
<?php session_start();

if($_SESSION['Donor']== null || $_SESSION['Donor']->Is_Admin== 0 )
{
header("Location: login.php");
}

$result =array(); 
$result=Donor::getAllDonors();
 

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
				
										<h2>Donors List</h2>
				
					<div class="row">    
						<div class="col-xs-8 col-xs-offset-2">
							<div class="input-group">
							<!-- insert this line -->
								
								<select class="selectpicker form-control input-lg" id="select_blood_group">
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
								<input type="text" class="form-control input-lg" name="x" placeholder="Enter location or use your current location...">
								<span class="input-group-btn">  
									<form action="search_result.php">
										<button class="btn btn-default btn-lg" type="submit"><span class="glyphicon glyphicon-search"></span></button>
									</form>
								</span>
								<span class="input-group-btn">
									<button class="btn btn-default btn-lg" type="button"><span class="glyphicon glyphicon-map-marker"></span></button>
								</span>
							</div>
						</div>
									
						<br>
						<br>
						<br>
						
		<!-- /.modal -->			
		<div id="myModal" class="modal fade in">
				<div class="modal-dialog">
					<div class="modal-content">
		       
			   <div class="modal-header">
							<h4 class="modal-title">Donor Details</h4>
						</div>
						<div class="modal-body">
							<table class="table">
								<tbody>
								  <tr>
									<td>Name</td>
									<td>
                                    <?php echo ''.$K['name'].'' ?></td>
								  </tr>
								  <tr>
									<td>Phone Number</td>
									<td>0344-4552766</td>
								  </tr>
								  <tr>
									<td>City</td>
									<td>Lahore</td>
								  </tr>
								  <tr>
									<td>Blood Group</td>
									<td>A+</td>
								  </tr>
								  <tr>
									<td>Area</td>
									<td>Faisal Town</td>
								  </tr>
								</tbody>
							 </table>
						</div>
						<div class="modal-footer">
							<div class="btn-group">
								<button class="btn btn-primary" data-dismiss="modal" ><span class="glyphicon glyphicon-check"></span> OK</button>
							</div>
						</div>
		 
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dalog -->
			</div><!-- /.modal -->								
						  
						<table class="table table-bordered" style="background-color:#4376C4; color: white;">
						  <thead>
							<tr>
							  <th>Name</th>
							  <th>City</th>
							  <th>Blood Group</th>
							  <th>Detials</th>
							</tr>
							
						  </thead>
						  <?php foreach ($result as $K){
                echo'<tbody>';
                echo'<tr>'; 
                echo'<td>'. $K['name'].'</td>';
                echo'<td>'. $K['city'].'</td>';
                echo'<td>'. $K['bloodgroup'].'</td>';
   		        echo '<td><a  href="#'.$K['member_id'].'" data-toggle="modal" id="DetaiLID" onClick="SessionMember('.$K['member_id'].')" name='.$K['member_id'].' type="text" style="color:white;"> <u>Get Details</u> </a> </td>';
                echo'<tr>';
                echo'</tbody>';
              }
            ?>
						</table>						
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
	function SessionMember(Value){
		
		   var memberID = document.getElementById("DetaiLID").value;
		   alert(Value);
		
	}
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
