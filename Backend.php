<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "eylor");
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
if (isset($_SESSION['user_signin'])) {
	$Email = $_SESSION['email'];
	$_SESSION['uid']=GetUserID($Email);
	

}

extract($_POST);

//Fetching Product Category  List
if (isset($_POST["Fetch_Product_Category_List"])) {
	$SQL = "SELECT * FROM `product_categories` ";
	$RESULT = mysqli_query($conn, $SQL);
	while ($row = mysqli_fetch_assoc($RESULT)) {
?>
		<option value="<?php echo $row["cat_id"]; ?>"><?php echo $row["cat_name"]; ?></option>
<?php }
}


// Execute When Contact us form is submitted
if (isset($_POST["InsertConatctUs"])) {
	$name = $_POST['FB_Uname'];
	$email = $_POST['FB_Uemail'];
	$phone = $_POST['FB_Uphone'];
	$msg = $_POST['FB_Umessage'];
	$sql = "INSERT INTO `contactus`(`FB_U_Name`, `FB_U_Email`, `FB_U_Mobile`, `FB_Message`, `FB_Status`) VALUES (' $name','$email','$phone','$msg','Pending')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode" => 200));
	} else {
		echo json_encode(array("statusCode" => 201));
	}
	mysqli_close($conn);
}

// Execute When Change Password Request is submitted
if (isset($_POST["ChangePwd"])) {
	$OldPwd = $_POST['OldPwd'];
	$NewPwd = $_POST['NewPwd'];
	$Confirm_NewPwd = $_POST['Confirm_NewPwd'];
	$User_Id = GetUserID($Email);
	$SQL = "SELECT * FROM `users` WHERE `user_id`='$User_Id'";
	$RESULT = mysqli_query($conn, $SQL);
	if ($RESULT) {
		while ($row = mysqli_fetch_assoc($RESULT)) {
			if ($row['user_password'] == $OldPwd and $row['user_id'] == $User_Id) {
				$sql = "UPDATE `users` SET `user_password`='$NewPwd' WHERE `user_id`='$User_Id'";
				if (mysqli_query($conn, $sql))
					echo json_encode(array("statusCode" => 200));
				else
					echo json_encode(array("statusCode" => 201));
			}
		}
	}


	mysqli_close($conn);
}


extract($_POST);
// Execute When New request form  is submitted
if (isset($_POST["InsertNewRequest"])) {
	$Item_Name = $_POST['Item_Name'];
	$Item_Rent_Days = $_POST['Item_Rent_Days'];
	$Item_Description = $_POST['Item_Description'];
	$User_Id = GetUserID($Email);
	$SQL = "INSERT INTO `itemrequest`( `u_id`, `item_name`, `no_of_days`, `Item_Description`) VALUES ('$User_Id','$Item_Name','$Item_Rent_Days','$Item_Description')";
	if (mysqli_query($conn, $SQL))
		echo json_encode(array("statusCode" => 200));
	else
		echo json_encode(array("statusCode" => 201));
	mysqli_close($conn);
}






//Fetching Toatal number of item in cart 
if (isset($_POST["FetchCartItemNo"])) {
	$U_id = GetUserID($Email);
	$SQL = "SELECT COUNT(*) AS `count` FROM cart WHERE `u_id`='$U_id'";
	$RESULT = mysqli_query($conn, $SQL);
	$row = mysqli_fetch_assoc($RESULT);
	echo $row['count'];
}



extract($_POST);
if (isset($_POST["FetchProductModal"])) {
	$first = $_POST["first"];
	$SQL = "SELECT * FROM `products` INNER JOIN  users ON products.user_id=users.user_id INNER JOIN product_categories ON products.product_cat_id=product_categories.cat_id WHERE product_id='$first'
			";
	$RESULT = mysqli_query($conn, $SQL);
	$Count = 1;
	while ($row = mysqli_fetch_assoc($RESULT)) {
		echo '<div class="modal-dialog modal-lg text-dark">
				<div class="modal-content">
		
				  <!-- Modal Header -->
				  <div class="modal-header">
					<h4 class="modal-title">
					' . $row["product_name"] . ' <br><span class="badge badge-secondary">Delhi</span>
					</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				  </div>
				  <!-- Modal body -->
				  <div class="modal-body">
					<div class="row container">
					  <div class="col-6 col-sm-6">
						<!-- carousel Starts Here -->
						<div id="demo" class="carousel slide" data-ride="carousel">
		
						  <!-- Indicators -->
						  <ul class="carousel-indicators">
							<li data-target="#demo" data-slide-to="0" class="active"></li>
							<li data-target="#demo" data-slide-to="1"></li>
							<li data-target="#demo" data-slide-to="2"></li>
						  </ul>
		
						  <!-- The slideshow -->
						  <div class="carousel-inner text-center " style="margin-top:40px;">
							<div class="carousel-item active">
							  <img src="' . $row["product_pic_1"] . '" alt="Los Angeles" style="height: 420px; width:150px;">
							</div>
							<div class="carousel-item">
							  <img src="' . $row["product_pic_2"] . '" alt="Chicago" style="height: 420px; width:150px;">
							</div>
							<div class="carousel-item">
							  <img src="' . $row["product_pic_3"] . '" alt="New York" style="height: 420px; width:150px;">
							</div>
						  </div>
		
						  <!-- Left and right controls -->
						  <a class="carousel-control-prev" href="#demo" data-slide="prev">
							<span class="carousel-control-prev-icon bg-dark"></span>
						  </a>
						  <a class="carousel-control-next" href="#demo" data-slide="next">
							<span class="carousel-control-next-icon bg-dark"></span>
						  </a>
						</div>
						<!-- carousel Ends Here -->
					  </div>
					  <div class="col-6 col-sm-6">
						<h3>Lender Description</h3>
						<hr>
						<div class="col-12 text-left bg-light"></div>
						<div style="background-color: green; display: block; padding: 5px;">
						  <img src="' . $row["user_profile_pic"] . '" alt="" style="height: 30px; width: 30px; border-radius: 50%;">
						  ' . $row["user_fullname"] . '
						</div>
						<h3>Item Details</h3>
						<div class="container text-left">
						  <b> Cateogry :</b> ' . $row["cat_name"] . '<br><b> Price :</b>' . $row["product_price"] . '/day</h6>
						</div>
		
						<h3>Item Description</h3>
		
						<div class="container text-left ">
						  <p>
						  ' . $row["product_description"] . '
						  </p>
						</div>
						<div class="container text-left ml-5">
						  <button class="btn btn-info mr-4 md-2">View</button>
						  <button class="btn btn-warning">Rent Now</button><br>
						</div>
					  </div>
					  
					</div>
		
				  </div>
		
				  <!-- Modal footer -->
				  <div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				  </div>
		
				</div>
			  </div>';
	}
}





//Fetching User Pic
if (isset($_POST["FetchUserPicture"])) {
	$U_id = GetUserID($Email);
	$SQL = "SELECT * FROM `users` WHERE `user_id`='$U_id'";
	$RESULT = mysqli_query($conn, $SQL);
	$row = mysqli_fetch_assoc($RESULT);
	echo json_encode(array(
		'user_pic' =>$row['user_profile_pic'],
		'username' =>$row['user_fullname'],
	),JSON_UNESCAPED_SLASHES);
}


// AddToCart
if (isset($_POST["AddToCart"])) {
	$U_id = GetUserID($Email);
    $PID = $_POST["PID"];
	$SQL = "INSERT INTO `cart`(`p_id`, `u_id`) VALUES ('$PID','$U_id')";
	$RESULT = mysqli_query($conn, $SQL);
	if($RESULT)
	 echo "Done";
	// $row = mysqli_fetch_assoc($RESULT);
	// $SQL2 = "SELECT COUNT(*) AS `count` FROM cart WHERE `u_id`='$U_id'";
	// $RESULT2 = mysqli_query($conn, $SQL2);
	// $row = mysqli_fetch_assoc($RESULT2);
	// echo $row['count'];
}

?>