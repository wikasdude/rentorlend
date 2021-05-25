  <?php 
 
 session_start();
if (!isset($_SESSION['email'])) {
 header("location: index.php");
}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>product page</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--   data table link -->
<!--  data table start link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
<!-- data table link end -->
   
    
   
  
  <!-- export file -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- 
<link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
 -->
 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 

<!-- 
<link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
 -->
 
<style type="text/css">
  #mytable
  {
    margin-top: 0px;
  }
</style>
</head>

<body>
	<body>
  
  <div class="container"> 
 
 <?php

   include 'Includes/navbar.php'; 
   include 'Includes/checkiforedered.php';

 ?>
 
<div class="container">  
 
<table id="mytable" class="display"  style="width:100%">
  <thead>
    <tr>
      <th scope="col">Item no</th>
      <th scope="col">Item Name</th>
      <th scope="col">price</th>
      <th scope="col"></th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
     
     
    
  <?php 
   
  include 'Includes/dbconfig.php';
 
  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT products.product_id AS MY_PROJECTS_ID, product_id, product_name ,product_price,product_pic_1 FROM products INNER JOIN cart ON cart.p_id = products.product_id where cart.u_id='{$_SESSION['uid']}' ";
$result = $conn->query($sql);
  
if ($result->num_rows > 0) {
  // output data of each row
  
  
  while($row = $result->fetch_assoc()) {
    
  //$sum =" "+$row['price'];
    
    echo "<tr><td>id: " . $row["product_id"]."</td>   <td>Name: " . $row["product_name"]. "</td> <td>price : " . $row["product_price"]. "</td><td><a href='cart-remove.php?id={$row['MY_PROJECTS_ID']}'   class='btn btn-primary'> Remove</a>";
     
      if (check_if_ordered($_SESSION['uid'],$row['MY_PROJECTS_ID'])) { //This is same as if(check_if_added_to_cart !=
    //0)

      echo "<a  class='btn btn-success disabled'  href='#'  > corfirmed </a></td><td>
      <img width='100px' height='150px' src=".$row['product_pic_1']."></img></td> </tr> </br>";
  
     }
      else {
     $img=trim($row['product_pic_1']);
    $orderid="ORDER" . rand(10000,99999999);
   echo  "
   <form method='post' action='http://localhost/payment/paytm/PaytmKit/pgRedirect.php'>
   <input type='hidden' id='CUST_ID' name='CUST_ID' value='CUST001'>
 <input type='hidden' id='INDUSTRY_TYPE_ID' name='INDUSTRY_TYPE_ID' value='Retail'>
 <input type='hidden'  id='CHANNEL_ID' name='CHANNEL_ID' value='WEB'>
 <input type='hidden'   id='ORDER_ID' name='ORDER_ID' size='20' maxlength='20' autocomplete='off' 
 tabindex='1' value='{$orderid}'>
  <input type='text' class='form-control' id='TXN_AMOUNT' name='TXN_AMOUNT' autocomplete='off' tabindex='5' value='{$row["product_price"]}'> 

  <input type ='submit'   class='btn btn-primary'value='checkout' > </form></td><td>
      <img width='100px' height='150px' src='$img' alt=".$row['product_pic_1']."></img></td> </tr></br>";
     echo $row['product_pic_1'];
     }
     }
     
   // echo "<a href='success.php?id={$row['id']}' class='btn btn-primary'> corfirm order</a></td> </tr></br>";
    

  }
 // echo $sum;
 // echo $id;
  //echo "";

else{
  echo "<tr><td><h1>Add items to the cart first!<h1></td></tr>";
}
$conn->close();
 

  
    ?>
   
    
      
  </tbody>
</table>
<button class="export-btn"><i class="fa fa-file-excel-o"></i> Export to Excel</button>
 
<!-- row  2 end -->
<!-- row  3 start -->

</div> 
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#mytable').DataTable();
   $(".export-btn").click(function(){  
     $("#mytable").tableHTMLExport({
      type:'csv',
      filename:'html-table-to-excel.csv',
    });
  });
});
   
</script>
  
 
</div>
</body>
</html>

 