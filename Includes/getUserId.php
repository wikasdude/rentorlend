<?php
function GetUserID1($Email)
{
	include('Includes/dbconn.php');
	$SQL = "SELECT * FROM `users` WHERE `user_email`='$Email'";
	if ($result = mysqli_query($conn, $SQL)) {
		while ($row = mysqli_fetch_row($result)) {
			return $row[0];
		} //end while

	} // end if
}
?>