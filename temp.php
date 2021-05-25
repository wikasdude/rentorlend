<li class="nav-item" id="Login">
<?php
          if (isset($_SESSION['user_signin']))
            echo ' <li class="nav-item">
                            <a class="nav-link"  data-toggle="modal" data-target="#ChangePassword"><i class="fas fa-cog" >Setting</i></a>
                          </li>
                            <a href="Users/Logout.php" class="nav-link btn btn-dark p-2" id="LogoutBtn"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                            <i class="fas fa-shopping-cart btn btn-dark ml-2"><span class="badge badge-secondary" id="CartItemCount">New</span></i>';
          else
            echo '<button type="button" class="text-right btn btn-light p-2" data-toggle="modal" data-target="#LoginModal" id="LoginBtn">
            <i class="fas fa-user"> Login</i>
                  </button>';
          ?>


        </li>



  //If User Press Add To cart Button
if (isset($_REQUEST['Add'])) { 
    $Quantity = $_POST["Quantity"];
    echo $Quantity;
    $product_id = $_POST['Product_id'];
    $SQL = "INSERT INTO `cart`(`p_id`,`c_id`,`p_quantity`) VALUES ('$product_id','$user_id','$Quantity')";
    $Result = mysqli_query($conn, $SQL);
    if ($Result) {
        header('location:ProductViewer.php');
    }
    exit();
}