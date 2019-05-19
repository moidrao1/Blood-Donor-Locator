
<?php
class DataAccessHelper {


public function insertintotable($sql)
{
$conn = DataAccessHelper::getConnection();

$result = mysql_query($sql);

if($result==TRUE)
{
echo "succesfully quried";

}

else if($result!=TRUE)
{
echo "this user already exist in Database";
}
 

mysql_close($conn);
return $result;
}

public static function executeQuery($sql)
{
$conn = DataAccessHelper::getConnection();
$rs = array();

// Performing SQL query
$result = mysql_query($sql) ;
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

// Preparing rs
while ($record = mysql_fetch_array($result, MYSQL_ASSOC)) {
$row = array();

foreach ($record as $col => $value) {
$row[$col] = $value;  }
$rs[]=$row;
}
//Free result-set
mysql_free_result($result);
// Closing connection 
mysql_close($conn);
return $rs;


}


private static function getConnection()
{
$conn=null;
$servername='localhost';
$username='root';
$password='';
$conn = mysql_connect($servername,$username ,$password );
mysql_select_db('bdl_test');
return $conn;
}


}
?>