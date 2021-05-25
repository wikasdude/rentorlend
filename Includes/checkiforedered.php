<?php

function  check_if_ordered($user_id,$item_id)
{
	 
include 'Includes/dbconfig.php';	 
 
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  
 
$sql = "SELECT * FROM cart WHERE p_id='$item_id' AND u_id = 15";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
  // output data of each row
  return 1;

} else {
	
  return 0;
}

$conn->close();
}

?>