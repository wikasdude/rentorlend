


$(document).ready(function(e) {


    $(document).on('click', '.edit', function() {
      var id = $(this).val();
      console.log(id);
      var first = $('#ProductId' + id).text();
      console.log(first);
      $('#ProductModal').modal('show');
      $('#productid').html(first);

      var FetchProductModal = " FetchProductModal";

      $.ajax({
        url: "Backend.php",
        type: 'POST',
        data: {
          FetchProductModal: FetchProductModal,
          first: first
        },
        success: function(Result) {
          console.log(Result);
          $('#ProductModal').html(Result);
        }
      });
    });

    // Function for signup  module
    $("#SignupForm").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "Users/Signup.php",
        type: "POST",
        data: new FormData(document.getElementById("SignupForm")),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          //$("#preview").fadeOut();
          $("#Signuperr").fadeOut();
        },

        success: function(data) {
          var LogoutBtn = '<a href="Users/Logout.php" class="nav-link btn btn-primary" id="LogoutBtn">Logout</a>';
          if (data == 'invalid') {
            // invalid file format.
            $("#Signuperr").html("Invalid File !").fadeIn();
          } else if (data == 'Successfull') {
            // Show Success Message
            $("#SignupSuccessMsg").show();
            $('#SignupSuccessMsg').html('Data Inserted Successfully');
          } else {
            // view uploaded file.
            $("#SignupForm")[0].reset();
            $('#LoginModal').modal('hide');
            $('#Login').append(LogoutBtn);
            $('#LoginBtn').hide();
          }
        },
        error: function(e) {
          $("#Signuperr").html(e).fadeIn();
        }
      });

    }));


    // Function for  Item Upload module
    $("#ItemUploadForm").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "ItemUpload.php",
        type: "POST",
        data: new FormData(document.getElementById("ItemUploadForm")),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          //$("#preview").fadeOut();
          $("#ItemUploaderr").fadeOut();
        },
        success: function(data) {
          if (data == 'invalid') {
            // invalid file format.
            $("#ItemUploaderr").html("Invalid File !").fadeIn();
          } else if (data == 'Successfull') {
            // Show Success Message
            $("#ItemUploadSuccessMsg").show();
            $('#ItemUploadSuccessMsg').html('Data Inserted Successfully');
          } else {
            // view uploaded file.
            //  $("#ItemUploadModal")[0].reset();
            // console.log(data); 
          }
        },
        error: function(e) {
          $("#ItemUploaderr").html(e).fadeIn();
        }
      });

    }));


    //  Function for login
    $('#GetLogin').on('click', function() {
      var email = $('#UEmail').val();
      var password = $('#UPassword').val();
      if (email != "" && password != "") {
        $.ajax({
          url: "Users/Login.php",
          type: "POST",
          data: {
            type: 1,
            email: email,
            password: password
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
            var LogoutBtn = '<a href="Users/Logout.php" class="nav-link btn btn-primary" id="LogoutBtn">Logout</a>';
            if (dataResult.statusCode == 200) {
              $('#LoginModal').modal('hide');
              $('#Login').append(LogoutBtn);
              $('#LoginBtn').hide();
              window.location.reload();
            } else if (dataResult.statusCode == 201) {
              $("#error").show();
              $('#error').html('Invalid EmailId or Password !');
            }

          }
        });
      } else {
        $("#error").show();
        $('#error').html('Please fill all the field !');
      }

    });

    // Function For Conatct US
    $('#ContactUS').on('click', function() {
      $("#ContactUS").attr("disabled", "disabled");
      var FB_Uname = $('#FB_Uname').val();
      var FB_Uemail = $('#FB_Uemail').val();
      var FB_Uphone = $('#FB_Uphone').val();
      var FB_Umessage = $('#FB_Umessage').val();
      var InsertConatctUs = "Insert Conatct Us";
      if (FB_Uname != "" && FB_Uemail != "" && FB_Uphone != "" && FB_Umessage != "") {
        $.ajax({
          url: "Backend.php",
          type: "POST",
          data: {
            FB_Uname: FB_Uname,
            FB_Uemail: FB_Uemail,
            FB_Uphone: FB_Uphone,
            FB_Umessage: FB_Umessage,
            InsertConatctUs: InsertConatctUs
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              $("ContactUS").removeAttr("disabled");
              $('#ConatctForm').find('input:text').val('');
              $("#success").show();
              $('#success').html('Thankyou for conatcting us');
            } else if (dataResult.statusCode == 201) {
              alert("Error occured !");
            }

          }
        });
      } else {
        alert('Please fill all the field !');
      }
    });


  // Function For Add to cart
  $(document).on('click', '.AddToCart', function() {
    var id = $(this).val();
    console.log(+id);
    var PID = $('#ProductId' + id).text();
    console.log(PID);
    var AddToCart = "AddToCart";

    $.ajax({
      url: "Backend.php",
      type: 'POST',
      data: {
        AddToCart: AddToCart,
        PID: PID
      },
      success: function(Result) {
        FetchCartItemNo();
        console.log(Result);
      }
    });
  });
   


    // Function For Changing Password
    $('#ChangePwdBtn').on('click', function() {
      $("#ChangePwdBtn").attr("disabled", "disabled");
      var OldPwd = $('#OldPwd').val();
      var NewPwd = $('#NewPwd').val();
      var Confirm_NewPwd = $('#Confirm_NewPwd').val();
      var ChangePwd = "Change password";
      // Check Form is filled completly or not
      if (OldPwd != "" && NewPwd != "" && Confirm_NewPwd != "") {
        // Check New Password and Confirm password is matching or not
        if (NewPwd != Confirm_NewPwd) {
          $("#ChangePwdErr").show();
          $('#ChangePwdErr').html('New password and confirm password are diffrent');
        } else {
          //  Ajax Start Here
          $.ajax({
            url: "Backend.php",
            type: "POST",
            data: {
              OldPwd: OldPwd,
              NewPwd: NewPwd,
              Confirm_NewPwd: Confirm_NewPwd,
              ChangePwd: ChangePwd
            },
            cache: false,
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              console.log(dataResult);
              if (dataResult.statusCode == 200) {
                $("ChangePwdBtn").removeAttr("disabled");
                $('#ChangePwdForm').find('input:password').val('');
                $("#ChangePwdSuccess").show();
                $('#ChangePwdSuccess').html('Password is updated.');
              } else if (dataResult.statusCode == 201)
                $('#ChangePwdErr').html('Error Occured');
            }
          }); //  Ajax Ends Here
        }

      }
      // If Form is Empty Show Error Message
      else {
        $("#ChangePwdErr").show();
        $('#ChangePwdErr').html('Please fill all the field !');
      }
    });


    // Function For Inserting New Item Request
    $('#SubmitItemRequest').on('click', function() {
      $("#SubmitItemRequest").attr("disabled", "disabled");
      var Item_Name = $('#Item_Name').val();
      var Item_Rent_Days = $('#Item_Rent_Days').val();
      var Item_Description = $('#Item_Description').val();
      var InsertNewRequest = "InsertNewRequest";
      // if (Item_Name != "" && Item_Rent_Days != "" && Item_Description != "" ) {
      $.ajax({
        url: "Backend.php",
        type: "POST",
        data: {
          Item_Name: Item_Name,
          Item_Rent_Days: Item_Rent_Days,
          Item_Description: Item_Description,
          InsertNewRequest: InsertNewRequest
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $("#SubmitItemRequest").removeAttr("disabled");
            $('#ItemRequestForm').find('input:text').val('');
            $("#ItemRequestSuccessMsg").show();
            $('#ItemRequestSuccessMsg').html('Thankyou for your request.We will make it available soon');
          } else if (dataResult.statusCode == 201) {
            alert("Error occured !");
          }
        }
      });
      // } else {
      //   alert('Please fill all the field !');
      // }
    });

    //Calling For fetching all categories of product
    Fetch_Product_Category_List();
    //Calling For fetching all  product avaliable in database
    // Fetch User Pic
    FetchUserPic()
    // Fetching Cart Item No
    FetchCartItemNo();
    $(".nav-tabs a").click(function() {
      $(this).tab('show');
    });
  });


  //Fetching Supplier List
  function Fetch_Product_Category_List() {
    var Fetch_Product_Category_List = "Fetch_Product_Category_List";

    $.ajax({
      url: "Backend.php",
      type: 'POST',
      data: {
        Fetch_Product_Category_List: Fetch_Product_Category_List
      },
      success: function(Result) {
        $('#P_Categories').html(Result);
      }
    });
  }


  //Fetching Cart Item number
  function FetchCartItemNo() {
    var FetchCartItemNo = "FetchCartItemNo";

    $.ajax({
      url: "Backend.php",
      type: 'POST',
      data: {
        FetchCartItemNo: FetchCartItemNo
      },
      success: function(Result) {
        $('#CartItemCount').html(Result);
        console.log(Result);
      }
    });
  }


    //Fetching User Pic
    function FetchUserPic() {
      var  FetchUserPicture = "FetchUserPicture";
  
      $.ajax({
        url: "Backend.php",
        type: 'POST',
        data: {
          FetchUserPicture: FetchUserPicture
        },
        success: function(Result) {
          var Result = JSON.parse(Result);
          $('#Userpic').attr('src',Result.user_pic);
          $('#UserName').html(Result.username);
          
          console.log(Result.user_pic);
          console.log(Result.username);
        }
      });
    }
  


  function FetchItemRequest() {
    var FetchItemRequest = "FetchItemRequest";

    $.ajax({
      url: "Backend.php",
      type: 'POST',
      data: {
        FetchItemRequest: FetchItemRequest
      },
      success: function(Result) {
        $('#RequestList').html(Result);
        console.log(Result);
      }
    });
  }