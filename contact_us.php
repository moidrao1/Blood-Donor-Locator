
<!DOCTYPE html>
<?php require_once("Donor.php"); ?>
<?php session_start();

if($_SESSION['Donor']==null)
{
header("Location: login.php?");
}
$param=null;
if(isset($_GET["error"])){

$param=$_GET["error"];
	
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
                <li>
                    <a href="contact_us.php">Contact Us</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
				<div class="search-page">
					<div class="container">
					<!-- /.modal compose message -->
						<div id="modalCompose">
								<h4 class="modal-title">Contact Us</h4>
							  
								<form role="form" class="form-horizontal"  form method="post" action="Controller.php?action=MemberContactMessage">
									<div class="form-group">
									  <label class="col-sm-2" for="inputBody">Name</label>
									  <div class="col-sm-8"><textarea class="form-control" name="ContactName" id="inputBody" rows="1"></textarea></div>
									
									</div>
									<div class="form-group">
									  <label class="col-sm-2" for="inputBody">Mobile Number</label>
									  <div class="col-sm-8"><textarea class="form-control" name="ContactNumber" id="inputBody" rows="1"></textarea></div>
									
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
	
	
	
	<script>
        $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#ename").hide();
  $("#emobile_number").hide();
  $("#earea").hide();
  $("#epassword").hide();
  $("#epassword_confirmation").hide();
  $("#eselect_blood_group").hide();
  $("#eselect_city").hide();
  var errorfname=false;
  var errorarea=false;
  var errorcity=false;
  var errorpassword=false;
  var errorconfirmpassword=false;
  var errorcontact=false;
  var errorbloodgroup=false;
 $("#name").focusout(function(){
    check_fname();
 });
 
  $("#mobile_number").focusout(function(){
    
    check_mobile();
 });
 
  $("#area").focusout(function(){
    check_area();
 });
 
  $("#password").focusout(function(){
     
     check_password();
 });
 
  $("#password_confirmation").focusout(function(){
     check_confirmpassword();
 });
 
  $("#select_blood_group").focusout(function(){
     check_blood_group();
 });
 $("#select_city").focusout(function(){
     check_city();
 });
 
function check_fname()
{
    var fname= $("#name").val();
    
     if(fname==null || fname=="")
     {
       
         $("#ename").html("*Enter Name")
         $("#ename").show();
         errorfname=true;
         
     } 
     else
     {
         $("#ename").hide();
     }
}
function check_mobile()
{
    var fname= $("#mobile_number").val();
    
     if(fname==null || fname=="")
     {
        $("#emobile_number").html("*Enter Mobile Number")
         $("#emobile_number").show();
         errorcontact=true;
     }
     else
     {
         $("#emobile_number").hide();
     }
}
function check_area()
{
    var fname= $("#area").val();
    
     if(fname==null || fname=="")
     {
        $("#earea").html("*Enter Area");
         $("#earea").show();
         errorarea=true;
     }
     else
     {
         $("#earea").hide();
     }
}
function check_password()
{
    
   var length= $("#password").val().length;
     
     if(length < 4)
     {
        $("#epassword").html("*Password length should be atleast 4 chrachter");
         $("#epassword").show();
         errorpassword=true;
         
     }
     else
     {
         $("#epassword").hide();
     }
}
function check_confirmpassword()
{
   var passd= $("#password").val();
    var confirmpassword=  $("#password_confirmation").val();
     if(passd!==confirmpassword)
     {
        $("#epassword_confirmation").html("*password does not match");
         $("#epassword_confirmation").show();
         errorconfirmpassword=true;
     }
     else
     {
         $("#epassword_confirmation").hide();
     }
}
function check_blood_group()
{
   var fname= $("#select_blood_group").val();
    
     if(fname=="" ||fname==null)
     {
       $("#eselect_blood_group").html("*Select blood Group");
         
         $("#eselect_blood_group").show();
         errorbloodgroup=true;
     }
     else
     {
         $("#eselect_blood_group").hide();
     }
}

function check_city()
{
   var fname= $("#select_city").val();
    
     if(fname==="City"  || fname===null || fname==="")
     {
	 
       $("#eselect_city").html("*Select City");
         
         $("#eselect_city").show();
         errorcity=true;
     }
     else
     {
	 ;
         $("#eselect_city").hide();
     }
}

$("#regform").submit(function(){
    
   errorfname=false;
   errorarea=false;
   errorcity=false;
   errorpassword=false;
   errorconfirmpassword=false;
   errorcontact=false;
   errorbloodgroup=false;
   check_confirmpassword();
   check_mobile();
   check_area();
   check_fname();
   check_blood_group();
   check_password();
   check_city();
   if(errorfname===false && errorbloodgroup===false && errorarea===false && errorpassword===false && errorconfirmpassword===false && errorcontact===false && errorcity===false)
   {
  
    return true;   
	
   }
   else
   {
	   
       return false;
   }
    
});

});

    </script>

</body>

</html>
