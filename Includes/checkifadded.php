<?php
 include('Includes/getUSerId.php');
function  check_if_added_to_cart($item_id)
{
	//include 'includes/Common.php';
	//include('Includes/dbconn.php');



// 	if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

// mysqli_close($conn);


// Create connection
	 $host="localhost";
   $user="root";
   $pass="";
   $db="eylor";
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  //session_start();
  $Email = $_SESSION['email'];
 
$user_id=GetUserID1($Email);
$sql = "SELECT * FROM cart WHERE p_id='$item_id' AND u_id ='$user_id' ";
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