<?php require_once("Donor.php"); ?>
<?php require_once("DAH.php"); ?>
<?php session_start(); ?>
<?php

if ($_REQUEST["action"] == "login"){
login();
}
else if($_REQUEST["action"] == "logout"){
logoutHandler();
}
else if($_REQUEST["action"] == "register"){
Register();
}
else if($_REQUEST["action"] == "EditProfile"){
EditProfile();
}
else if($_REQUEST["action"] == "AddDonation"){
AddDonation();
}
else if($_REQUEST["action"] == "ComposeMessage"){
ComposeMessage();
}
else if($_REQUEST["action"] == "nonMemberSearch"){
NonMemberSearch();
}
else if($_REQUEST["action"] == "HideProfile"){
HideProfile();
}
else if($_REQUEST["action"] == "AdminSearch"){
AdminSearch();
}

else if($_REQUEST["action"] == "ContactMessage"){
ContactMessage();
}
else if($_REQUEST["action"] == "MemberSearchBlood"){
MemberSearchBlood();
}
else if($_REQUEST["action"] == "MemberContactMessage"){
MemberContactMessage();
}



function Register()
{
$name= $_REQUEST['name'];
$bloodgroup= $_REQUEST['BG'];
$number= $_REQUEST['mobile_number'];
$city= $_REQUEST['city'];
$area= $_REQUEST['area'];
$pass= $_REQUEST['password'];


$exists=Donor::useralreadyexists($number);
if($exists==true)
{
$res=Donor::insertDonor($name,$area, $city, $bloodgroup, $number, $pass);
header("Location: login.php?");
}
else
{
	
	$errorMsg=  "error : User already exists";
 header("Location:/register.php?"."error=".$errorMsg);
}

}
 
 function login()
{
$Number=$_REQUEST['number'];
$password=$_REQUEST['password'];

if ( isset($Number) && isset($password) )
{
$res=Donor::validate($Number,$password );

if($res==TRUE)
{ 
$_SESSION['Donor'] = new Donor($Number);

if($_SESSION['Donor']->Is_Admin == 1)
{
	
header("Location:admin_profile.php?");
}
else{

header("Location:member_profile.php?");	
}
}
else
{
$errorMessage = "'invalid username or password'";
header("Location:login.php?error=" . $errorMessage . "&username=" . $username);
}
}
}
 
 function EditProfile()
 {
	 
	 if($_SESSION['Donor']->Is_Admin == 0)
	 {
$name= $_REQUEST['name'];
$number= $_REQUEST['mobile_number'];
$pass= $_REQUEST['password'];
$city= $_REQUEST['city'];
$bloodgroup= $_REQUEST['BG'];
$area= $_REQUEST['area'];
$id = $_SESSION['Donor']->id;

$sql = "UPDATE users SET mobileNumber='$number', password='$pass' WHERE id='$id'";
$rs = DataAccessHelper::executeQuery($sql);

$sql = "UPDATE member SET name='$name', city='$city', Area='$area', bloodgroup='$bloodgroup'  WHERE member_id='$id'";
$rs2 = DataAccessHelper::executeQuery($sql);   
   
   if($rs == False && $rs2 == False)
   {
	$_SESSION['Donor'] = new Donor($number);
    header("Location:member_profile.php?");
   }
   else 
   {
	   header("Location:index.html?");
	
   }
	 }
	 else
	 {
		 
$name= $_REQUEST['name'];
$number= $_REQUEST['mobile_number'];
$pass= $_REQUEST['password'];
$city= $_REQUEST['city'];
$area= $_REQUEST['area'];
$id = $_SESSION['Donor']->id;

$sql = "UPDATE users SET mobileNumber='$number', password='$pass' WHERE id='$id'";
$rs = DataAccessHelper::executeQuery($sql);

$sql = "UPDATE member SET name='$name', city='$city', Area='$area'  WHERE member_id='$id'";
$rs2 = DataAccessHelper::executeQuery($sql);   
   
   if($rs == False && $rs2 == False)
   {
	$_SESSION['Donor'] = new Donor($number);
    header("Location:admin_profile.php?");
   }
   else 
   {
	   header("Location:index.html?");
	
   }		 
		 
	 }
 }

function HideProfile(){
	
	$id=$_SESSION['Donor']->id;
	
$sql = "UPDATE member SET profile_status='0' WHERE member_id='$id'";
$rs2 = DataAccessHelper::executeQuery($sql);   
  
	
$SuccessMessage = "'Successfully Added'";
	 header("Location:member_profile.php?".$SuccessMessage);
	 
	
}
function AdminSearch(){
	if (isset($_REQUEST["BloodGroup"])  && isset($_REQUEST["locationID"])){
    
	$BloodGroup=$_REQUEST['BloodGroup'];
    $Location=$_REQUEST['locationID'];
	
	if($BloodGroup != "" && $Location != "")
	{
     $_SESSION['AdminSearchBlood']=$BloodGroup;
     $_SESSION['AdminSearchLocation']=$Location;
     header("Location:admin_search_blood.php?");
		
	}
	else{
		
     $errorMessage = "'You havent Selected any Field Kindly Select Both'";
      header("Location:admin_search_blood.php?error=" . $errorMessage);
		
	}
	}
	else{
		
$errorMessage = "'You havent Selected any Field Kindly Select Both'";
header("Location:admin_search_blood.php?error=" . $errorMessage);
	}
}
function MemberSearchBlood(){
	if (isset($_REQUEST["BloodGroup"])  && isset($_REQUEST["locationID"])){
    
	$BloodGroup=$_REQUEST['BloodGroup'];
    $Location=$_REQUEST['locationID'];
	
	$connected = @fsockopen("www.google.com", 80); 
	if($connected){
	if($BloodGroup != "" && $Location != "")
	{
		
     $_SESSION['AdminSearchBlood']=$BloodGroup;
     $_SESSION['AdminSearchLocation']=$Location;
     header("Location:search.php?");
		
	}
	else{
		
     $errorMessage = "'You havent Selected any Field Kindly Select Both'";
      header("Location:search.php?error=" . $errorMessage);
		
	}
	}
	else{
		
		   $errorMessage = "'NO INTERNET CONNECTION'";
      header("Location:search.php?error=" . $errorMessage);
	}
	
	}
	else{
		
$errorMessage = "'You havent Selected any Field Kindly Select Both'";
header("Location:search.php?error=" . $errorMessage);
	}
}


function NonMemberSearch(){
	if (isset($_REQUEST["BloodGroup"])  && isset($_REQUEST["location"])){
    
	$BloodGroup=$_REQUEST['BloodGroup'];
    $Location=$_REQUEST['location'];
	$connected = @fsockopen("www.google.com", 80); 
	if($connected){
	if($BloodGroup != "" && $Location != "")
	{
     $_SESSION['NonMemberSearchBlood']=$BloodGroup;
     $_SESSION['NonMemberSearchLocation']=$Location;
     header("Location:search_result_for_non_member.php?");
		
	}
	else{
		
     $errorMessage = "'Please Enter the Required Information'";
      header("Location:index.php?error=" . $errorMessage);
		
	}
	}
	else{
		   $errorMessage = "'NO INTERNET CONNECTION'";
      header("Location:index.php?error=" . $errorMessage);
		
	}
	}
	else{
		
$errorMessage = "'Please Enter the Required Information'";
header("Location:index.php?error=" . $errorMessage);
	}
}
function MemberContactMessage (){
	
$messageText= $_REQUEST['MessageText'];
$ContactNumber= $_REQUEST['ContactNumber'];
$ContactName= $_REQUEST['ContactName'];
if($ContactName  !="" && $ContactNumber !="" && $ContactName!="")
{
$sql = "INSERT INTO admin_message(MobileNumber,Name,Message)
	VALUES ('$ContactNumber','$ContactName','$messageText')";
	$result=DataAccessHelper::insertintotable($sql);
	if($result>0)
	{
		
$errorMessage = "'Message Sent Successfully'";
header("Location:contact_us.php?error=" . $errorMessage );
		
	}
	else
	{
		
$errorMessage = "'Message Sending Failed'";
header("Location:contact_us.php?error=" . $errorMessage );
	}
}
else
{
	
$errorMessage = "'Please Fill all the fields'";
header("Location:contact_us.php?error=" . $errorMessage );
}


}
function ContactMessage(){


$messageText= $_REQUEST['MessageText'];
$ContactNumber= $_REQUEST['ContactNumber'];
$ContactName= $_REQUEST['ContactName'];
if($ContactName  !="" && $ContactNumber !="" && $ContactName!="")
{
$sql = "INSERT INTO admin_message(MobileNumber,Name,Message)
	VALUES ('$ContactNumber','$ContactName','$messageText')";
	$result=DataAccessHelper::insertintotable($sql);
	if($result>0)
	{
		
$errorMessage = "'Message Sent Successfully'";
header("Location:contact_us_non_member.php?error=" . $errorMessage );
		
	}
	else
	{
		
$errorMessage = "'Message Sending Failed'";
header("Location:contact_us_non_member.php?error=" . $errorMessage );
	}
}
else
{
	
$errorMessage = "'Please Fill all the fields'";
header("Location:contact_us_non_member.php?error=" . $errorMessage );
}


}


function ComposeMessage(){


$messageText= $_REQUEST['MessageText'];
$BloodGroup= $_REQUEST['BloodGroup'];
$Location= $_REQUEST['Location'];
if($BloodGroup == "" && $Location == "")
{

$errorMessage = "'No Blood Group or Location Specified'";
header("Location:admin_compose_message.php?error=" . $errorMessage );
}
else if ($BloodGroup == "" && $Location != "")
{
$errorMessage = "'Kindly Specify the Blood group'";
header("Location:admin_compose_message.php?error=" . $errorMessage );
}
else if ($BloodGroup != "" && $Location == "")
{
	
$errorMessage = "'Kindly Specify the Location'";
header("Location:admin_compose_message.php?error=" . $errorMessage );
}
else{
	
$sql = "INSERT INTO message(message_text,city,bloodgroup)
	VALUES ('$messageText','$Location','$BloodGroup')";
	$result=DataAccessHelper::insertintotable($sql);
	 header("Location:admin_messages.php?");

}

}
 function AddDonation()
 {
	 $date= $_REQUEST['date'];

	 if(isset($date)){
	 
	$id = $_SESSION['Donor']->id;
	$sql = "INSERT INTO donation(member_id,date_of_donation)
	VALUES ('$id','$date')";
	$result=DataAccessHelper::insertintotable($sql);
	
	
$sql = "UPDATE member SET lastdate_of_donation='$date' WHERE member_id='$id'";
$rs2 = DataAccessHelper::executeQuery($sql);   
  
	
$SuccessMessage = "'Successfully Added'";
	 header("Location:member_profile.php?".$SuccessMessage);
	 }
	 else
	 {
		 
$errorMessage = "'Date Not Selected'";
header("Location:member_profile.php?error=" . $errorMessage);
		 
 }
 }
function logoutHandler(){
$_SESSION["Donor"] = null;
header("Location: index.php");
}

?>
