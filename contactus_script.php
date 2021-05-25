<?php
$to = "somebody@example.com, somebodyelse@example.com";
$subject = "HTML email";
   include('Includes/dbconn.php');
    $name = $_POST['FB_Uname'];
	$email = $_POST['FB_Uemail'];
	$phone = $_POST['FB_Uphone'];
	$msg = $_POST['FB_Umessage'];
	$sql = "INSERT INTO `contactus`(`FB_U_Name`, `FB_U_Email`, `FB_U_Mobile`, `FB_Message`, `FB_Status`) VALUES (' $name','$email','$phone','$msg','Pending')";
	if (mysqli_query($conn, $sql)) {
		 echo "New record created successfully";
		 mail("$email","My subject",$msg);

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// send email

	?>