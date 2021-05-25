<?php
session_start();
if(isset($_SESSION['user_signin']))
        header('location:../index.php');
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'Upload/'; // upload directory
if(!empty($_POST['Name']) || !empty($_POST['Email']) || !empty($_POST['Phone']) || !empty($_POST['Address']))
{
$img1 = $_FILES['Picture']['name'];
$tmp1 = $_FILES['Picture']['tmp_name'];
$img2 = $_FILES['Proof']['name'];
$tmp2 = $_FILES['Proof']['tmp_name'];
// get uploaded file's extension
$ext1 = strtolower(pathinfo($img1, PATHINFO_EXTENSION));
$ext2 = strtolower(pathinfo($img2, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image1 = rand(1000,1000000).$img1;
$final_image2 = rand(1000,1000000).$img2;
// check's valid format
if(in_array($ext1, $valid_extensions)) 
{
    if(in_array($ext2, $valid_extensions)) {
        $path2 = $path.strtolower($final_image2);
    }
$path1 = $path.strtolower($final_image1); 
if(move_uploaded_file($tmp1,"../".$path1) && move_uploaded_file($tmp2,"../".$path2)) 
{
$Name=$_POST['Name'];
$Add=$_POST['Address'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$Pwd=$_POST['Password'];
//include database configuration file
include('../Includes/dbconn.php');
//insert form data in the database
$q="INSERT INTO `users`(`user_fullname`, `user_email`, `user_phone`, `user_adress`, `user_password`, `user_profile_pic`, `user_proof`) VALUES ('$Name','$Email','$Phone','$Add','$Pwd','$path1','$path2')";
mysqli_query($conn,$q);
echo "Successfull";
$_SESSION['email']=$Email;
$_SESSION["user_signin"]=true;
//echo $insert?'ok':'err';
}
} 
else 
{
echo 'invalid';
}
}
?>
