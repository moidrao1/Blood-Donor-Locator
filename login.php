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

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '694205410754557',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      
	  response.name;
	  response.id;
    });
  }
</script>

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
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Login</h3>
						</div>
						<div class="panel-body">
						 
						 <form accept-charset="UTF-8" id="loginform" role="form" method="post" action="Controller.php?action=login">
							
							<fieldset>
								<div class="form-group">
									<input class="form-control" id="email" placeholder="Enter your mobile number" name="number" type="text"><p id="eemail"></p>
								</div>
								<div class="form-group">
									<input class="form-control" id="pwd" placeholder="Password" name="password" type="password" value=""><p id="epassword"></p>
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me"> Remember Me
									</label>
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
							</fieldset>
							</form>
							 <?php 
if($param){
?>
<div class="alert alert-error alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <strong>Status :  </strong><?php  echo $param ?></div>

<?php }?>
							  <hr/>
							<center><h4>OR</h4></center>
<!--							<input class="btn btn-lg btn-facebook btn-block" type="submit" value="Login via facebook" onclick="checkLoginState();"> -->
							<fb:login-button scope="public_profile,email" class="btn btn-lg btn-facebook btn-block" onlogin="checkLoginState();">
							</fb:login-button>
							<div id="status">
							</div>

						</div>
					</div>
				</div>
			</div>
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
	
	 <script>
    $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"

  $("#eemail").hide();
  $("#epassword").hide();
  var erroremail=false;
  var errorpassword=false;
  
 
 
 
  $("#email").focusout(function(){
    check_email();
    
 });
 
  $("#pwd").focusout(function(){
     
     check_password();
 });
 
 
function check_email()
{
    var fname= $("#email").val();
    
     if(fname==null || fname=="")
     {
        $("#eemail").html("*Enter Phone Number");
         $("#eemail").show();
         erroremail=true;
     }
     else
     {
         $("#eemail").hide();
     }
}
function check_password()
{
    
   var length= $("#pwd").val();
     
     if(length ==null||length=="")
     {
        $("#epassword").html("*Enter Password");
         $("#epassword").show();
         errorpassword=true;
         
     }
     else
     {
         $("#epassword").hide();
     }
}

$("#loginform").submit(function(){
    
   erroremail=false;
   errorpassword=false;
   
   check_email();
   check_password();
   if(erroremail==false && errorpassword==false)
   {
    return true;   
   }
   else
   {
       return false;
   }
    
});

});


//function to upload picture





</script>


</body>

</html>
