 
 <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>User Dashboard</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- Top Navbar -->
  <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php">OSMS</a></nav>

  <!-- Start Container -->
 <div class="container-fluid" style="margin-top:40px;">
  <div class="row"> <!-- Start Row -->
   <nav class="col-sm-2 bg-light sidebar py-5 d-print-none"> <!-- Start Side Bar 1st Column -->
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" onclick="Toggle()"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" onclick="ProfileToggle()" ><i class="fab fa-accessible-icon" ></i>Profile</a></li>
      <li class="nav-item"><a class="nav-link" onclick="Reserve1Toggle()" ><i class="fas fa-align-center"></i>Reserve1</a></li>
      <li class="nav-item"><a class="nav-link" onclick="Reserve2Toggle()" ><i class="fas fa-database"></i>Reserve2</a></li>
      <li class="nav-item"><a class="nav-link" onclick="ChangeToggle()"><i class="fas fa-key"></i>Change Password</a></li>
      <li class="nav-item"><a class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
     </ul>
    </div>
   </nav> <!-- End Side Bar 1st Column -->
  
   <div class="col-sm-9 col-md-10"> <!-- Start Dashboard 2nd Column -->
    <div class="row text-center mx-5" id="Dashboard" >
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
       <div class="card-header">Rented Product</div>
       <div class="card-body">
        <h4 class="card-title">5</h4>
        <a class="btn text-white" href="request.php">View</a>
       </div>
      </div>
     </div>
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width:18rem;">
       <div class="card-header">Lended Product</div>
       <div class="card-body">
        <h4 class="card-title">4</h4>
        <a class="btn text-white" href="work.php">View</a>
       </div>
      </div>
     </div>
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width:18rem;">
       <div class="card-header">Product request</div>
       <div class="card-body">
        <h4 class="card-title">3</h4>
        <a class="btn text-white" href="technician.php">View</a>
       </div>
      </div>
     </div>
    </div>

    <!-- profile section  -->
    <div class="row text-center mx-5" id="Profile" style="display: none;">
        <h1>Profile Section</h1>
    </div>
    <div class="row text-center mx-5" id="Reserve1" style="display: none;">
        <h1>Reserve1</h1>
    </div>
    <div class="row text-center mx-5" id="Reserve2" style="display: none;">
        <h1>Reserve2</h1>
    </div>
    <div class="row text-center mx-5" id="ChangePassword" style="display: none;">
        <h1>Change password</h1>
    </div>
   </div> <!-- End Dashboard 2nd Column -->



   </div> <!-- End Row -->
 </div> <!-- End Container -->

 
 <!-- JavaScript -->
  <script>
var Dashboard = document.getElementById("Dashboard");
        var Profile = document.getElementById("Profile");
        var Reserve1 = document.getElementById("Reserve1");
        var Reserve2 = document.getElementById("Reserve2");
        var ChangePassword = document.getElementById("ChangePassword");

  function Toggle(){
            Dashboard.style.display = "block";
            Profile.style.display = "none";
            Reserve1.style.display = "none";
            Reserve2.style.display = "none";
            ChangePassword.style.display = "none";
   
  }


function ProfileToggle() {
       
        Profile.style.display= "block";
            Dashboard.style.display  = "none";
            Reserve1.style.display = "none";
            Reserve2.style.display = "none";
            ChangePassword.style.display = "none";
}


function Reserve1Toggle() {
        Reserve1.style.display= "block";
            Dashboard.style.display  = "none";
            Profile.style.display = "none";
            Reserve2.style.display = "none";
            ChangePassword.style.display = "none";
}
function Reserve2Toggle(){
      Reserve2.style.display= "block";
            Dashboard.style.display  = "none";
            Profile.style.display = "none";
            Reserve1.style.display = "none";
            ChangePassword.style.display = "none";	
}
function ChangeToggle(){
	     ChangePassword.style.display= "block";
            Dashboard.style.display  = "none";
            Profile.style.display = "none";
            Reserve1.style.display = "none";
            Reserve2.style.display = "none";
}

  </script>
 </body>
</html>