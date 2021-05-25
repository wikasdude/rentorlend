<?php
session_start();
if (isset($_SESSION['user_signin'])) {
  $Email = $_SESSION['email'];
  header('location:index.php');
}


// Functions for getting Current User Id
function GetUserID($Email)
{
  include('Includes/dbconn.php');
  $SQL = "SELECT * FROM `users` WHERE `user_email`='$Email'";
  if ($result = mysqli_query($conn, $SQL)) {
    while ($row = mysqli_fetch_row($result)) {
      return $row[0];
    } //end while

  } // end if
}

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path = 'Upload/'; // upload directory
if (!empty($_POST['P_Categories']) || !empty($_POST['P_Name']) || !empty($_POST['P_Age']) || !empty($_POST['P_Price']) || !empty($_POST['P_Description'])) {
  $img1 = $_FILES['Product_Picture_1']['name'];
  $tmp1 = $_FILES['Product_Picture_1']['tmp_name'];
  $img2 = $_FILES['Product_Picture_2']['name'];
  $tmp2 = $_FILES['Product_Picture_2']['tmp_name'];
  $img3 = $_FILES['Product_Picture_3']['name'];
  $tmp3 = $_FILES['Product_Picture_3']['tmp_name'];
  $img4 = $_FILES['Product_Bill']['name'];
  $tmp4 = $_FILES['Product_Bill']['tmp_name'];
  // get uploaded file's extension
  $ext1 = strtolower(pathinfo($img1, PATHINFO_EXTENSION));
  $ext2 = strtolower(pathinfo($img2, PATHINFO_EXTENSION));
  $ext3 = strtolower(pathinfo($img3, PATHINFO_EXTENSION));
  $ext4 = strtolower(pathinfo($img4, PATHINFO_EXTENSION));
  // can upload same image using rand function
  $final_image1 = rand(1000, 1000000) . $img1;
  $final_image2 = rand(1000, 1000000) . $img2;
  $final_image3 = rand(1000, 1000000) . $img3;
  $final_image4 = rand(1000, 1000000) . $img4;
  // check's valid format
  if (in_array($ext1, $valid_extensions)) {
    if (in_array($ext2, $valid_extensions)) {
      $path2 = $path . strtolower($final_image2);
    }
    if (in_array($ext3, $valid_extensions)) {
      $path3 = $path . strtolower($final_image3);
    }
    if (in_array($ext4, $valid_extensions)) {
      $path4 = $path . strtolower($final_image4);
    }
    $path1 = $path . strtolower($final_image1);
    if (move_uploaded_file($tmp1, $path1) && move_uploaded_file($tmp2, $path2) && move_uploaded_file($tmp3, $path3) && move_uploaded_file($tmp4, $path4)) {
      echo "Hello";
      // echo "<img src='$path1' />";
      // echo "<img src='$path2' />";
      // echo "<img src='$path3' />";
      // echo "<img src='$path4' />";
      $P_Cat = $_POST['P_Categories'];
      $P_Name = $_POST['P_Name'];
      $P_Age = $_POST['P_Age'];
      $P_Price = $_POST['P_Price'];
      $P_Description = $_POST['P_Description'];
      $User_Id = GetUserID($Email);
      //include database configuration file
      include('Includes/dbconn.php');
      //insert form data in the database
      $q = "INSERT INTO `products`( `product_cat_id` ,`user_id`, `product_name`, `product_age`, `product_price`, `product_description`, `product_pic_1`, `product_pic_2`, `product_pic_3`, `product_bill`, `product_status`) VALUES ('$P_Cat','$User_Id','$P_Name','$P_Age','$P_Price','$P_Description','$path1','$path2','$path3','$path4','Avaliable')";
      $insert = mysqli_query($conn, $q);
      echo "Successfull";
    }
  } else {
    echo 'invalid';
  }
}
