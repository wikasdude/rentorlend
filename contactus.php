<?php
 include('Includes/Header.php');
include('Includes/navbar.php');





?>

 <div class="container-fluid bg-secondary mt-2" id="ConatctUs">
  <h2 class="text-center mb-4">Contact Us</h2>
  <div class="row">
   <!-- Start 1st Column -->
    <div class="col-md-8"> <!-- Start 1st Column -->
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        <form   action="contactus_script.php" method="post"  id="ConatctForm" name="ConatctForm">
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
            <input type="submit" name="save" class="btn btn-primary  mt-2" value="Submit" id="ContactUS">
          </div>
        </form>
    </div>
    </div>
</div>