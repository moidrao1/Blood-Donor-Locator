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

    <title>Sign UP</title>

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
    <div class="register-page">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				 <form id="regform" method="post"  action="Controller.php?action=register" >
					<h2 style="color:white;" >Please Sign Up <small style="color:white;">Save a life</small></h2>
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name" tabindex="1"><p id="ename"></p>
							</div>
						</div>
				
						<div class="col-xs-12 col-sm-6 col-md-6">
						
							<div class="form-group">
								  <select class="form-control input-lg" id="select_blood_group" name= "BG">
									<option value="Blood Group" disabled selected>Blood Group</option>
									<option>A-</option>
									<option>A+</option>
									<option>B+</option>
									<option>B-</option>
									<option>O+</option>
									<option>O-</option>
									<option>AB+</option>
									<option>AB-</option>
								  </select> <p id="eselect_blood_group"></p>
							</div>	
						</div>
					</div>
					<div class="form-group">
						<input type="text" name="mobile_number" id="mobile_number" class="form-control input-lg" placeholder="Mobile Number" tabindex="3"><p id="emobile_number" ></p>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								  <select class="form-control input-lg" id="select_city" name="city"> 
									<option value="City" disabled selected>City</option>
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
								  </select> <p id="eselect_city" ></p>
							</div>						
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<input type="text" name="area" id="area" class="form-control input-lg" placeholder="Area" tabindex="3"/ ><p id="earea" ></p>						
						</div>
					
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5"><p id="epassword" ></p>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6"><p id="epassword_confirmation"></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12" style="color:white;">
							 By clicking <big> <strong class="label label-primary">Register</strong> </big> , you agree to the <big><u>Terms and Conditions</u></big> </a> set out by this site.
						</div>
					</div>
					
					<hr class="colorgraph">
					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
						<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Log In</a></div>
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
		<!-- Modal -->
		<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
					</div>
					<div class="modal-body">
						<h3>DO donate blood, only if you satisfy all of the following conditions:</h3>					
						<p>You are between age group of 18-60 years.</p>
						<p>Your weight is 45 kgs or more.</p>
						<p>Your hemoglobin is 12.5 gm% minimum.</p>
						<p>Your last blood donation was 3 or more months earlier.</p>
						<p>You are healthy and have not suffered from malaria, typhoid or other transmissible disease in the recent past.</p>
						<h3>DO NOT donate blood, if you have any of the following conditions:</h3>
						<p>Cold / fever in the past 1 week.</p>
						<p>Under treatment with antibiotics or any other medication.</p>
						<p>Cardiac problems, hypertension, epilepsy, diabetes (on insulin therapy), history of cancer, chronic kidney or liver disease, bleeding tendencies, venereal disease etc.</p>
						<p>Major surgery in the last 6 months</p>
						<p>Vaccination in the last 24 hours</p>
						<p>Had a miscarriage in the last 6 months or have been pregnant / lactating in the last one year.</p>
						<p>Had fainting attacks during last donation.</p>
						<p>Have regularly received treatment with blood products.</p>
						<p>Shared a needle to inject drugs/ have history of drug addiction.</p>
						<p>Had sexual relations with different partners or with a high risk individual.</p>
						<p>Been tested positive for antibodies to HIV.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>        <!-- /.container -->

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
