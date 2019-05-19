<?php
require_once("DAH.php");

class Message {
 
 public $City="";
 public $BloodGroup="";
 public $MessageText="";
 public $Date="";


public function __construct($City , $BloodGroup , $MessageText ,$Date ){
$this->City= $City;
$this->BloodGroup= $BloodGroup;
$this->MessageText= $MessageText;
$this->Date= $Date;
}
}


 ?>