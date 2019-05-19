<?php
require_once("DAH.php");
require_once("Message.php");

class Donor { 
 
 public $id=1;
 public $Name="";
 public $Area="";
 public $City="";
 public $BloodGroup="";
 public $PhoneNo="";
 public $Password="";
 public $Fb_id="";
 public $Is_Admin=0;
 public $Profile_Status=1;


public function __construct($Phone){
$this->PhoneNo= $Phone;
$this->load();
}
public function Get($memberID)
{
	
	$query = "select * from message where member_id='" .$memberID. "'" ;
	$rs = DataAccessHelper::executeQuery($query);
    $i=0;
	$arr = array();
	$aray2=array();
	echo count($rs);
while($i < count($rs))
{
	$arr[$i]=$rs[$i]["date_of_donation"];
		$i++;
}	
	return $arr;
}
private function load(){
$query = "select * from users where mobileNumber='" . $this->PhoneNo . "'" ;

$rs = DataAccessHelper::executeQuery($query);
if (sizeof($rs) > 0){
$this->id= $rs[0]["id"];	
$this->Fb_id = $rs[0]["fb_id"];
$this->Password = $rs[0]["password"];
$this->Is_Admin =  $rs[0]["isAdmin"];
}

$query = "select * from member where member_id='" . $this->id . "'" ;

$rs = DataAccessHelper::executeQuery($query);
if (sizeof($rs) > 0){

$this->Name = $rs[0]["name"];
$this->Area = $rs[0]["Area"];
$this->City =   $rs[0]["city"];
$this->BloodGroup = $rs[0]["bloodgroup"];
$this->Profile_Status = $rs[0]["profile_status"];

}
}
public function GetDonations($memberID)
{
	
	$query = "select * from donation where member_id='" .$memberID. "'" ;
	$rs = DataAccessHelper::executeQuery($query);
    $i=0;
	$arr = array();
	echo count($rs);
while($i < count($rs))
{
	$arr[$i]=$rs[$i]["date_of_donation"];
		$i++;
}	
	return $arr;

}
public function useralreadyexists($Ph)
{
	$sql = "select mobileNumber from users where mobileNumber='" . $Ph . "'";
	$rs = DataAccessHelper::executeQuery($sql);
	
	if(sizeof($rs)>=1)
   {
    return false;
   }
   else 
   {
	   return true;
   }
}
public function getMessages($city , $bloodGroup)
{
	$query = "select * from message where city='".$city."' AND bloodgroup='".$bloodGroup."'";
	$rs = DataAccessHelper::executeQuery($query); 
 
	return $rs;
	
}

public function getAdminInbox()
{
	$query = "select * from admin_message";
	$rs = DataAccessHelper::executeQuery($query); 
	
	
	return $rs;
	
}

public function getAdminMessages()
{
	$query = "select * from message";
	$rs = DataAccessHelper::executeQuery($query); 
 
	return $rs;
	
	
}

public function getAllDonors()
{
	$query = "select * from member where member_id <> '1'";
	$rs = DataAccessHelper::executeQuery($query); 
	return $rs;
	
}

public function getAllMObileNumer($MemberAray)
{
	$MobileNumberArray=array();
	$i=0;
	if(sizeof($MemberAray)>0){
	
	foreach($MemberAray as $key){
	$query = "select mobileNumber from users where id='".$key->member_id."'";
	$rs = DataAccessHelper::executeQuery($query); 
	
	$MobileNumberArray[$i]=$rs;
	$i++;
	}
	return $MobileNumberArray;
	}
}
public function getAllSearchDonors($bloodGroup , $Location)
{
	$query = "select * from member where member_id <> '1' AND profile_status='1' AND bloodgroup ='" .$bloodGroup."'";
	$rs = DataAccessHelper::executeQuery($query); 

	$i=0;
	$FinalDonors=array();
	$TotalKms=array();
	 $connected = @fsockopen("www.google.com", 80); 
	if($connected)
	{
	foreach($rs as $key)
	{
		
	
	
   
    $details = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=".urlencode($Location)."&destinations=".urlencode($key['Area']).",".urlencode($key['city'])."&mode=driving&sensor=false";

    $json = file_get_contents($details);

    $details = json_decode($json, TRUE);
	
		

	if($details['rows'][0]['elements'][0]['status'] == 'OK'){
    $Distance=$details['rows'][0]['elements'][0]['distance']['value'];
    $DistanceKM=$details['rows'][0]['elements'][0]['distance']['text'];

	if(intval($Distance) < 10000)
	{
		$FinalDonors[$i]=$key;
		$TotalKms[$i]=$DistanceKM;
		$i++;
		
	}
	}
		
		
	}
	
	
	return $FinalDonors;
	}
	else{
		
$errorMessage = "'No Internet Connected'";
header("Location:admin_search_blood.php?error=" . $errorMessage);
	}
}

public function insertDonor($Name,$Area, $City, $BG, $Phone, $Password)
{

$Is_Admin = 0;
$Status = 1;
$sql = "INSERT INTO users(mobileNumber,password, isAdmin)
VALUES ('$Phone','$Password','$Is_Admin')";
$result=DataAccessHelper::insertintotable($sql);

$query = "select id from users where mobileNumber='" . $Phone . "'" ;
$rs = DataAccessHelper::executeQuery($query);
$ID=$rs[0]['id'];

$sql1 = "INSERT INTO member(member_id,name, Area, city, bloodgroup, profile_status)
VALUES ('$ID','$Name','$Area','$City','$BG','$Status')";
$result=DataAccessHelper::insertintotable($sql1);

return $result;

}

public static function validate($phone,$password)
{
	$query = "select * from users where mobileNumber='" . $phone . "'";
	$rs = DataAccessHelper::executeQuery($query);
	if (sizeof($rs) > 0)
	{

		if($rs[0]["password"] == $password)
		{
		return true;
		}
	}
	else
		{
		return false;
		}
	}

}


 ?>