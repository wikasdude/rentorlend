  <!-- Navbar Starts Here -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <a class="navbar-brand" href="#"><img src="Images/Company Logo.png" alt="" style="width:50px; height:50px; border-radius:20px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="Navbar">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="#Home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#ConatctUs">Conatct Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li> <?php
          if (isset($_SESSION['user_signin'])){
            echo "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#'' ><img src='' alt='User pic' style='width:40px;height:40px; border-radius:50%;'' id='Userpic' >Hello! <span id='UserName'>4</span></img></a>
                    <div class='dropdown-menu'>
                      <a class='dropdown-item' href='#'>Show profile</a>
                      <a class='dropdown-item'  data-toggle='modal' data-target='#ChangePassword'><i class='fas fa-cog' >Setting</i></a>
                      <a href='Users/Logout.php' class='dropdown-item' id='LogoutBtn'><i class='fa fa-sign-out' aria-hidden='true'>Logout</i></a>
                    </div>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='cart.php' ><h6><i class='fas fa-shopping-cart'></i><span class='badge badge-secondary' id='CartItemCount'></span></h6>cart </a>
                  </li>";
                  
            }
              
          else{
            echo "<button type='button' class='text-right btn btn-light p-2' data-toggle='modal' data-target='#LoginModal' id='LoginBtn'>
            <i class='fas fa-user'> Login</i>
                  </button>";
                }
          ?>

      </ul>
      <!-- Setting Modal Starts Here -->
      <div class="modal" id="ChangePassword">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Change Password Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="alert alert-success alert-dismissible" id="ChangePwdSuccess" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              </div>
              <div class="alert alert-danger alert-dismissible" id="ChangePwdErr" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              </div>
              <form id="ChangePwdForm" name="ChangePwdForm">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Change Password </label>
                  <input type="password" name="OldPwd" class="form-control" id="OldPwd" placeholder="Old password">
                </div>
                <div class="form-group">

                  <input type="password" class="form-control" name="NewPwd" id="NewPwd" placeholder="New password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="Confirm_NewPwd" id="Confirm_NewPwd" placeholder=" Confirm new password">
                </div>
                <input type="button" name="ChangePwdBtn" class="btn btn-primary  mt-2" value="Update" id="ChangePwdBtn">
              </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <!-- Setting Modal Ends Here -->

      <!-- Login Modal Starts Here-->
      <div class="modal" id="LoginModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Login Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              </div>
              <div class="form-group">
                <label for="UEmail">Email</label>
                <input type="email" class="form-control" id="UEmail" placeholder="Enter email" name="UEmail" required>
              </div>
              <div class="form-group">
                <label for="UPassword">Password</label>
                <input type="password" class="form-control" id="UPassword" placeholder="Enter Password" name="UPassword" required>
              </div>
              <input type="button" class="btn btn-primary" name="GetLogin" id="GetLogin" value="Login">
            </div>
            <div class="container">Don't have an account yet? <a type="button" class=" mr-auto" data-dismiss="modal" data-toggle="modal" data-target="#SignupModal">Signup</a></div>
             
              
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <!-- Login Modal Ends Here-->

      <!-- Signup Modal STarts Here-->
      <div class="modal" id="SignupModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Signup Form</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="alert alert-success alert-dismissible" id="SignupSuccessMsg" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
              </div>
              <form enctype="multipart/form-data" id="SignupForm" action="Users/Signup.php" method="post">
                <div class="form-group">
                  <label for="Name">Full Name</label>
                  <input type="text" class="form-control" id="Name" placeholder="Enter Full Name" name="Name" required>
                </div>
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="email" class="form-control" id="Email" placeholder="Enter email" name="Email" required>
                </div>
                <div class="form-group">
                  <label for="Phone">Phone</label>
                  <input type="text" class="form-control" id="Phone" placeholder="Enter Phone" name="Phone" required>
                </div>
                <div class="form-group">
                  <label for="Address">Address</label>
                  <input type="text" class="form-control" id="Address" placeholder="Enter Address" name="Address" required>
                </div>
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" id="Password" placeholder="Enter Password" name="Password" required>
                </div>
                <div class="form-group">
                  <label for="Picture">Profile Picture</label>
                  <input type="file" class="form-control" id="Picture" placeholder="Select profile Picture" name="Picture" required>
                </div>
                <div class="form-group">
                  <label for="Proof">ID Proof</label>
                  <input type="file" class="form-control" id="Proof" placeholder="Select proof" name="Proof" required>
                </div>
                <div class="form-group form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                  </label>
                </div>
                <input type="submit" class="btn btn-primary" name="Signup">
              </form>
              <div id="Signuperr"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="nav-link btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#LoginModal" id="LoginBtn">Login</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
      <!-- Signup Modal Ends Here-->

    </div>
  </nav>
  <!-- Navbar Ends Here -->