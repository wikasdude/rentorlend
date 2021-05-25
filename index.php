
<?php

   session_start();
    include('Includes/Header.php');
    include 'Includes/checkifadded.php';
    if (isset($_SESSION['user_signin'])){
      echo $_SESSION['uid'];
    }
    
?>
<script>
document.getElementById("LendItemBtn").addEventListener('click',function ()
{
   }  ); 
</script>
<style type="text/css">
  @media only screen and (max-width: 468px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}
</style>


<?php
include('Includes/navbar.php');


?>





<!-- Dynamic Tabs Section Start Here -->
  <div class="bg-secondary text-white " style="height:auto;">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs row font-weight-bold text-center">
      <li class="nav-item col-4">
        <a class="nav-link active" href="#home"><h2 style="font-size:3.1vw;">Rent</h2></a>
      </li>
      <li class="nav-item col-4">
        <a class="nav-link" href="#RequestForItem" id="RequestForItemBtn"><h2 style="font-size:3.1vw;">Requests</h2></a>
      </li>
      <li class="nav-item col-4">
        <a class="nav-link" href="#LendItem" id="LendItemBtn"><h2 style="font-size:3.1vw;">Lend</h2></a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content " id="tabs">
          <!-- Home Tab Starts Here -->
          <div id="home" class="container tab-pane active">
              <?php
               if (isset($_SESSION['user_signin']))
               echo '<h2 class="text-right"><!-- Item Request Button -->
                      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#RaiseItemRequest">
                        <i class="fas fa-fist-raised">Raise Item Request</i>
                      </button>
                      </h2>';
                ?>
          
            <div class="conatiner bg-light Product_Cat" > <!-- Product Category Bar Starts Here-->
              <button class="btn bg-light m-2">Book</button>
              <button class="btn bg-light m-2">Clothes</button>
              <button class="btn bg-light m-2">Property</button>
              <button class="btn bg-light m-2">Bikes</button>
              <button class="btn bg-light m-2">Cars</button>
              <button class="btn bg-light m-2">Laptops</button>
            </div>

            <div id="Items" class="row conatiner text-white"> <!-- Display Products Here-->
              <div class="row">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "eylor");
                $SQL = "SELECT * FROM `products` ";
                $RESULT = mysqli_query($conn, $SQL);
                $Count = 1;
                while ($row = mysqli_fetch_assoc($RESULT)) {
                ?>
                  <div class="box col-md-4">
                    <img src="<?php echo $row['product_pic_1']; ?>" alt="item name" style="height: 250px;
                                    width: 80%;" class="p-4">
                    <h4 class="Price"> Price:<?php echo $row['product_price']; ?>/day <br> Item name:<?php echo $row['product_name']; ?></h4>
                    <p class="center">
                      <b>Description:</b> <?php echo $row['product_description']; ?>
                    </p>
                    <span id="ProductId<?php echo $Count; ?>" style="display: none;"><?php echo $row['product_id']; ?></span>
                    <button type="button" class="btn btn-success edit" value="<?php echo $Count; ?>"><span class="glyphicon glyphicon-eye"></span>View</button>
                    <!-- <a class="btn btn-primary" id="View">View</a> -->
                   <?php  if (check_if_added_to_cart($row['product_id'])) {
                        echo "<button type='button'  class='btn btn-success AddToCart' value='$Count'>Added To cart</button>";
                        
              }
              else{
               echo "<button type='button'  class='btn btn-warning AddToCart' value= '$Count'>Add To cart</button>";
              } 
                    
                    ?>
                  </div>
                <?php
                  $Count++;
                }
                ?>
              </div>
            </div>

            <div class="modal" id="RaiseItemRequest"><!-- Item Request Modal Starts Here -->
              <div class="modal-dialog">
                <div class="modal-content">

                  
                  <div class="modal-header"><!-- Modal Header -->
                    <h4 class="modal-title text-dark">New Item Request Form</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  
                  <div class="modal-body text-dark"><!-- Modal body -->
                    <div class="alert alert-success alert-dismissible" id="ItemRequestSuccessMsg" style="display:none;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>
                    <form id="ItemRequestForm" name="ItemRequestForm" method="post">
                      <div class="form-group">
                        <label for="Item_Name">Product Name</label>
                        <input type="text" class="form-control" id="Item_Name" placeholder="Enter Product Name" name="Item_Name">
                      </div>
                      <div class="form-group">

                        <label for="Item_Rent_Days">Number of days to be rented</label>
                        <input type="number" class="form-control" id="Item_Rent_Days" placeholder="For how many days you want" name="Item_Rent_Days">
                      </div>
                      <div class="form-group">
                        <label for="Item_Description">Item Description</label>
                        <textarea name="" class="form-control" cols="30" rows="5" id="Item_Description" placeholder="Enter Item Description" name="Item_Description"></textarea>
                      </div>
                      <div class="form-group form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                      </div>
                      <input type="submit" class="btn btn-primary" name='SubmitItemRequest' id="SubmitItemRequest">
                    </form>
                    <div id="ItemRequestErrMsg"></div>
                  </div>

                  <div class="modal-footer"><!-- Modal footer -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>

            <div class="modal" id="ProductModal"><!-- Detail Product View Modal -->
            </div>

          </div>
          <!-- Home Tab Ends Here -->

          <!-- Item Request Tab Starts Here -->
          <div id="RequestForItem" class="container tab-pane fade bg-light">
              <h2 class="text-warning text-center">Product Request</h2>
                <div id="RequestList">
                  <div class="container">
                    <table width="100%" class="table table-responsive text-white table-hover">
                      <thead>
                        <th>Sr No</th>
                        <th>Item name</th>
                        <th>Days for renting</th>
                        <th>Item description</th>
                        <th>User Full Name</th>
                      </thead>
                      <tbody>
                      <?php
                        $count=1;
                        $conn = mysqli_connect("localhost", "root", "", "eylor");
                        $SQL = "SELECT * FROM `itemrequest` INNER JOIN users ON itemrequest.u_id=users.user_id";
                        $RESULT = mysqli_query($conn, $SQL);
                        while($row=mysqli_fetch_array($RESULT)){
                          ?>
                          <tr>
                          <td><span id="firstname<?php echo $count; ?>"><?php echo $count; ?></span></td>
                          <td><span id="lastname<?php echo $count; ?>"><?php echo $row['item_name']; ?></span></td>
                          <td><span id="address<?php echo $count; ?>"><?php echo $row['no_of_days']; ?></span></td>
                          <td><span id="address<?php echo $count; ?>"><?php echo $row['Item_Description']; ?></span></td>
                          <td><span id="address<?php echo $count; ?>"><?php echo $row['user_fullname']; ?></span></td>
                          <td><button type="button" class="btn btn-success edit" value="<?php echo $count; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td>
                          </tr>
                          <?php
                          $count++;
                        }
                      ?>		
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
            <!-- Item Request Tab Ends Here -->
          
          <!-- Lend Item Tab Starts Here -->
            <div id="LendItem" class="container tab-pane fade"><br>
              <h2>Product Lending Form</h2>
              <div class="alert alert-success alert-dismissible" id="ItemUploadSuccessMsg" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              </div>
              <form action="ItemUpload.php" id="ItemUploadForm" enctype="multipart/form-data" method="post">

                <div class="form-group">
                  <label for="P_Categories">Product Categories</label>
                  <select class="form-control font-weight-bold" id="P_Categories" name="P_Categories">
                    <option value="Book">Book</option>
                    <option value="Clothes">Clothes</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="P_Name">Product Name</label>
                  <input type="text" class="form-control" id="P_Name" placeholder="Enter Product Name" name="P_Name">
                </div>
                <div class="form-group">
                  <label for="P_Age">Product Age(In Years)</label>
                  <input type="text" class="form-control" id="P_Age" placeholder="Enter Product age" name="P_Age">
                </div>
                <div class="form-group">
                  <label for="P_Price">Product Price(Per Day)</label>
                  <input type="text" class="form-control" id="P_Price" placeholder="Enter Price" name="P_Price">
                </div>
                <div class="form-group">
                  <label for="P_Description">Product Description</label>
                  <input type="text" class="form-control" id="P_Description" placeholder="Enter Product Description" name="P_Description">
                </div>
                <div class="form-group">
                  <label for="Product_Picture_1">Upload Product Picture 1</label>
                  <input type="file" class="form-control" id="Product_Picture_1" placeholder="Select Product_Picture_1" name="Product_Picture_1">
                </div>
                <div class="form-group">
                  <label for="Product_Picture_2">Upload Product Picture 2</label>
                  <input type="file" class="form-control" id="Product_Picture_2" placeholder="Select Product_Picture_2" name="Product_Picture_2">
                </div>
                <div class="form-group">
                  <label for="Product_Picture_3">Upload Product Picture 3</label>
                  <input type="file" class="form-control" id="Product_Picture_3" placeholder="Select Product_Picture_3" name="Product_Picture_3">
                </div>
                <div class="form-group">
                  <label for="Product_Bill">Product Bill</label>
                  <input type="file" class="form-control" id="Product_Bill" placeholder="Select Product Bill" name="Product_Bill">
                </div>
                <div class="form-group form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                  </label>
                </div>
                <input type="submit" class="btn btn-primary" name='UploadItem'>
              </form>
              <div id="ItemUploaderr"></div>
            </div>
          <!-- Lend Item Tab Ends Here -->  
      </div>
    </div>
<!-- Dynamic Tabs Section Ends Here -->




<!-- Start Services Section -->
<div class="container-fluid text-center border-bottom bg-secondary text-white mt-2" id="Services">
  <h2>Our Services</h2>
  <div class="row mt-4">
    <div class="col-sm-4 mb-4">
    <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
    <h4 class="mt-4">Lending</h4>
   </div>
   <div class="col-sm-4 mb-4">
    <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
    <h4 class="mt-4">Lending</h4>
   </div>
   <div class="col-sm-4 mb-4">
    <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
    <h4 class="mt-4">Buying</h4>
   </div>
  </div>
 </div> <!-- End Services Section Container -->

<!-- Start Happy Customer -->
<div class="jumbotron  bg-secondary mt-2">
   <div class="container">
    <h2 class="text-center text-white">Happy Customers</h2>
    <div class="row mt-5">
     <div class="col-lg-3 col-sm-6"> <!-- Start 1st Column -->
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="Upload/800965img_20190623_121005.jpg" class="img-fluid" style="width: 150px; height:150px; border-radius:100px;" alt="avt1">
        <h4 class="card-title">Harish Khanger</h4>
        <p class="card-text">This is trusted platform for lending and renting service.I feel that this website provides best service for lending.I love it completly because it heplps me to utilize my resource. </p>
       </div>
      </div>
     </div> <!-- End 1st Column -->
     <div class="col-lg-3 col-sm-6"> <!-- Start 2nd Column -->
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="avtar3.jpeg" class="img-fluid" style="width: 150px; height:150px; border-radius:100px;" alt="avt2">
        <h4 class="card-title">Sumit Vyas</h4>
        <p class="card-text">I love it beacuse its service and feedback system are so strong.They solve all query under 2 hour.</p>
       </div>
      </div>
     </div> <!-- End 2nd Column -->
     <div class="col-lg-3 col-sm-6"> <!-- Start 3rd Column -->
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="15594nitish.jpg" class="img-fluid" style="width: 150px; height:150px; border-radius:100px;" alt="avt3">
        <h4 class="card-title">Nitish Goswami</h4>
        <p class="card-text">Best experience beacuse they give payment first and then picked the item.So there is no nned to worry.</p>
       </div>
      </div>
     </div> <!-- End 3rd Column -->
     <div class="col-lg-3 col-sm-6"> <!-- Start 4th Column -->
      <div class="card shadow-lg mb-2">
       <div class="card-body text-center">
        <img src="Upload/192083nikhil-uttam-zbr_trihuh4-unsplash.jpg" class="img-fluid" style="width: 150px; height:150px; border-radius:100px;" alt="avt4">
        <h4 class="card-title">Jyoti Sinha</h4>
        <p class="card-text">Itaque illo explicabo voluptatum,saepe libero rerum, adducimus voluptas nesciunt debitis numquam.</p>
       </div>
      </div>
     </div> <!-- End 4th Column -->
    </div>
   </div>
 </div> <!-- End Happy Customer -->

 <!-- Start Contact US -->
 <div class="container-fluid bg-secondary mt-2" id="ConatctUs">
  <h2 class="text-center mb-4">Contact Us</h2>
  <div class="row">
   <!-- Start 1st Column -->
    <div class="col-md-8"> <!-- Start 1st Column -->
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        <form id="ConatctForm" name="ConatctForm">
          <div class="form-group">
            <label for="FB_Uname">Name: </label>
            <input type="text" name="FB_Uname" class="form-control" id="FB_Uname" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="FB_Uemail">Email: </label>
            <input type="email" name="FB_Uemail" class="form-control" id="FB_Uemail" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="FB_Uphone">Phone Number: </label>
            <input type="number" name="FB_Uphone" class="form-control" id="FB_Uphone" placeholder="Enter your phone">
          </div>
          <div class="form-group">
            <label for="FB_Umessage">Message: </label>
            <textarea name="FB_Umessage" class="form-control" id="FB_Umessage" cols="30" rows="10"></textarea>
            <input type="button" name="save" class="btn btn-primary  mt-2" value="Submit" id="ContactUS">
          </div>
        </form>
    </div>
   <!-- End 1st Column -->
   <div class="col-md-4 text-center"> <!-- Start 2nd Column -->
    <strong>Headquarter:</strong><br>
    Eylor Enlsiting pvt Ltd,<br>
    SGM Nagar, Faridabad<br>
    Faridabad - 000000<br>
    Phone: +0000000000<br>
    <a href="#" target="_blank">www.eylorenlisting.com</a><br>
    <br> <br>
    <strong>Branch:</strong><br>
    Eylor Enlsiting pvt Ltd,<br>
    SGM Nagar, Faridabad<br>
    Faridabad - 000000<br>
    Phone: +0000000000<br>
    <a href="#" target="_blank">www.eylorenlisting.com</a><br>    
   </div> <!-- End 2nd Column -->
  </div>
 </div> <!-- End Contact US -->





     <!-- Start Footer -->
 <footer class="container-fluid bg-dark mt-5 text-white">
  <div class="container">
   <div class="row py-3">
    <div class="col-md-6"> <!-- Start 1st Column -->
     <span class="pr-2">Follow Us: </span>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
    </div> <!-- End 1st Column -->
    <div class="col-md-6 text-right"> <!-- Start 2nd Column -->
     <small>Designed by Nitish Goswami &copy; 2021</small>
    </div> <!-- End 2nd Column -->
   </div>
  </div>
 </footer>
<script src="JS/Script.js"></script>
</body>

</html>