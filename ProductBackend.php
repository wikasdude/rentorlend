<?php
session_start();
extract($_POST);
include('Includes/dbconn.php');
//Fetching Product List
if (isset($_POST["Fetch_Product_List"])) {
    $SQL = "SELECT * FROM `products` ";
    $RESULT = mysqli_query($conn, $SQL);
    $Count=1;
    while ($row = mysqli_fetch_assoc($RESULT)) {
        ?>
        <div class="box col-md-4">
            <img src="<?php echo $row['product_pic_1']; ?>" alt="item name" style="height: 250px;
                    width: 80%;" class="p-4">
            <h4 class="Price"> Price:<?php echo $row['product_price']; ?>/day <br> Item name:<?php echo $row['product_name']; ?></h4>
            <p class="center">
                <b>Description:</b> <?php echo $row['product_description']; ?>
            </p>
            <p id="ProductId<?php echo $Count; ?>"><?php echo $row['product_id']; ?></p>
            <a class="btn btn-primary" data-toggle="modal" data-target="#ProductModal" href="index.php?Product_ID=<?php echo $row['product_id']; ?>" id="View" onclick="myFunction()">View</a>
           
            <button class="btn btn-warning">Rent</button>
        </div>
    <?php $Count++;}
    }
?>