$('document').ready(function(){
 var username_state = false;
 var password_state = false;
 var email_state = false;
 var firstName_state = false; 
 var middleName_state = false;
 var lastName_state = false; 
 var address_state = false;
 var contactNumber_state = false;

 var plateNumber_state = false;
 var make_state = false;
 var series_state = false;
 var yearModel_state = false;
 var color_state = false;

 //For Appointment
 $("#mechanical").click(function(){
        $("#mechanical_service").toggle();
        $("#electrical_service").hide();
        $("#paint_service").hide();
        $("#customization").hide();
        $("#body_Repair").hide();
        $("#maintenance_service").hide();
    });
 $("#electrical").click(function(){
        $("#electrical_service").toggle();
        $("#mechanical_service").hide();
        $("#paint_service").hide();
        $("#customization").hide();
        $("#body_Repair").hide();
        $("#maintenance_service").hide();
    });
 $("#painting").click(function(){
        $("#paint_service").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#customization").hide();
        $("#body_Repair").hide();
        $("#maintenance_service").hide();

    });
 $("#bodyRepair").click(function(){
        $("#body_Repair").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#paint_service").hide();
        $("#customization").hide();
        $("#maintenance_service").hide();

    });
 $("#customize").click(function(){
        $("#customization").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#body_Repair").hide();
        $("#paint_service").hide();
        $("#maintenance_service").hide();


    });
 $("#maintenance").click(function(){
        $("#maintenance_service").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#body_Repair").hide();
        $("#paint_service").hide();
        $("#customization").hide();

    });
 
 $("#Pending").click(function(){
        $("#pendingContent").toggle();
        $("#activeContent").hide();
        $("#rescheduleContent").hide();

    });
 $("#Active").click(function(){
        $("#activeContent").toggle();
        $("#pendingContent").hide();
        $("#rescheduleContent").hide();

    });
 $("#Reschedule").click(function(){
        $("#rescheduleContent").toggle();
        $("#pendingContent").hide();
        $("#activeContent").hide();

    });





$('input[type="checkbox"]').click(function () { getSelectedCheckBoxes('service[]'); 
  }); 


  var getSelectedCheckBoxes = function (groupName) { 
    var result = $('input[name="' + groupName + '"]:checked');
    var resultName = $('input[name="' + groupName + '"]:checked').attr("id"); //For reference only 
    if (result.length > 0) { 
    var resultString = result.length + " checkboxe(s) checked<br>"; 
    result.each(function () { 
      //resultString += $(this).attr("id") + "<br/>"; 
      resultString += $(this).val() + "<br/>"; 
    });  
     $('#serviceDisplay').html(resultString); 
    
   } 

     else { 
    $('#serviceDisplay').html("No checkbox checked"); 
   } 
     }; 
 


 $('#username').on('blur', function(){
  var username = $('#username').val();
  if (username == '') {
    username_state = false;
    return;
  }
  $.ajax({
    type: 'post',
    data: {
      'username_check' : 1,
      'username' : username,
    },
    success: function(response){
      if (response == 'taken' ) {
        username_state = false;
        $('#username').parent().removeClass();
        $('#username').css("border","1px solid #D83D5A");
        $('#username').siblings("span").css("color","#D83D5A");
        $('#username').siblings("span").text('Username already exist');
        return;
      }else if (response == 'not_taken') {
        username_state = true;
        $('#username').parent().removeClass();
        $('#username').css("border","1px solid green");
        $('#username').siblings("span").css("color","green");
        $('#username').siblings("span").text('Username available');
        return;
      }
    }
  });
 }); 

  $('#email').on('blur', function(){
  var email = $('#email').val();
  if (email == '') {
    email_state = false;
    return;
  }
  $.ajax({
      url: 'register.php',
      type: 'post',
      data: {
        'email_check' : 1,
        'email' : email,
      },
      success: function(response){
        if (response == 'taken' ) {
          email_state = false;
          $('#email').parent().removeClass();
          $('#email').parent().addClass("form_error");
          $('#email').siblings("span").text('Email already exist');
          return;
        }else if (response == 'not_taken') {
          email_state = true;
          $('#email').siblings("span").text('Email available');
          return;
        }
      }
  });
 });


$('#plateNumber').on('blur', function(){
  var plateNumber = $('#plateNumber').val();
  if (plateNumber == '') {
    plateNumber_state = false;
    return;
  }
  $.ajax({
      url: 'register.php',
      type: 'post',
      data: {
        'plateNumber_check' : 1,
        'plateNumber' : plateNumber,
      },
      success: function(response){
        if (response == 'taken' ) {
          plateNumber_state = false;
          $('#plateNumber').parent().removeClass();
          $('#plateNumber').css("border","1px solid #D83D5A"); 
          $('#plateNumber').siblings("span").css("color","#D83D5A");
          $('#plateNumber').siblings("span").text('Plate Number already exist').fadeIn();
          return;
        }else if (response == 'not_taken') {
          plateNumber_state = true;
          $('#plateNumber').parent().removeClass();
          $('#plateNumber').css("border","1px solid green"); 
          $('#plateNumber').siblings("span").css("color","green");
          $('#plateNumber').siblings("span").text('Plate number available').fadeIn();
          return;
        }
      }
  });
 });

$('#contactNumber').on('blur', function(){
  var contactNumber = $('#contactNumber').val();
  if (contactNumber == '') {
    contactNumber_state = false;
    return;
  }
  $.ajax({
      url: 'register.php',
      type: 'post',
      data: {
        'contactNumber_check' : 1,
        'contactNumber' : contactNumber,
      },
      success: function(response){
        if (response == 'taken' ) {
          contactNumber_state = false;
          $('#contactNumber').parent().removeClass();
          $('#contactNumber').css("border","1px solid #D83D5A");
          $('#contactNumber_msg').hide();
          $('#contactNumber').siblings("span").text('Contact Number already exist');
          return;
        }else if (response == 'not_taken') {
          contactNumber_state = true;
          $('#contactNumber').parent().removeClass();
          $('#contactNumber').css("border","1px solid green");
          $('#contactNumber').siblings("span").css("color","green");
          $('#contactNumber_msg').hide();
          $('#contactNumber').siblings("span").text('Contact number available');
          return;
        }
      }
  });
 });




$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
    password_state = true;
    return;
  } else 
    $('#message').html('Not Matching').css('color', 'red');
    return;
});

// Check if input fields are empty

$('#firstName').blur(function() {
  if (this.value == '') {
    $('#firstName').css("border","1px solid #D83D5A"); 
    $('#firstName_msg').fadeIn("slow");
    firstName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#firstName').css("border",""); 
    $('#firstName_msg').fadeOut();
    firstName_state = true;
    return;
});

$('#middleName').blur(function() {
  if (this.value == '') { 
    $('#middleName').css("border","1px solid #D83D5A"); 
    $('#middleName_msg').fadeIn("slow");
    middleName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#middleName').css("border","");
    $('#middleName_msg').fadeOut();
    middleName_state = true;
    return;
});

$('#lastName').blur(function() {
  if (this.value == '') {
    $('#lastName').css("border","1px solid #D83D5A");
    $('#lastName_msg').fadeIn("slow");
    lastName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#lastName').css("border","");
    $('#lastName_msg').fadeOut();
    lastName_state = true;
    return;
});

$('#address').blur(function() {
  if (this.value == '') {
    $('#address_msg').fadeIn("slow");
    $('#address').css("border","1px solid #D83D5A");
    addressName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#address').css("border","");
    $('#address_msg').fadeOut();
    address_state = true;
    return;
});

$('#contactNumber').blur(function() {
  if (this.value == '') {
    $('#contactNumber_msg').fadeIn("slow");
    $('#contactNumber').css("border","1px solid #D83D5A");
    contactNumber_state = false;
    return;
  }
  if (this.value != '' )
    $('#contactNumber').css("border","");
    $('#contactNumber_msg').fadeOut();
    contactNumber_state = true;
    return;
});

$('#email').blur(function() {
  if (this.value == '') {
    $('#email').parent().removeClass();
    $('#email_msg').fadeIn("slow");
    $('#email').parent().addClass("form_error");
    email_state = false;
    return;
  }
  if (this.value != '' )
    $('#email').parent().removeClass();
    $('#email_msg').fadeOut();
    $('#email').siblings("span").show();
    email_state = true;
    return;
});

//For Patterns in registration
$('#email').blur(function() {
var emailpattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

    if(emailpattern.test($("#email").val())) {
      $('#email').parent().removeClass();
      $('#email').parent().addClass("form_success");
      $('#emailpat_msg').fadeOut("slow");
      $('#email').siblings("span").show();
      email_state = true;
      return;
    } else 
      $('#email').parent().removeClass();
      $('#email').parent().addClass("form_error");
      $('#emailpat_msg').fadeIn("slow");
      $('#email').siblings("span").hide();
      email_state = false;
      return;
});
$('#plateNumber').blur(function() {
var plateNumberpattern = new RegExp(/[A-Za-z]{3}-[0-9]{3,}$/i);

    if(plateNumberpattern.test($("#plateNumber").val())) {
      $('#plateNumber').parent().removeClass();
      $('#plateNumberpat_msg').fadeOut("slow");
      $('#plateNumber').siblings("span").show();
      plateNumber_state = true;
      return;
    } else 
      $('#plateNumber').parent().removeClass();
      $('#plateNumber').parent().addClass("form_error");
      $('#plateNumberpat_msg').fadeIn("slow");
      $('#plateNumber').siblings("span").hide();
      plateNumber_state = false;
      return;
});




//End of Pattern Validators


      

$('#username').blur(function() {
  if (this.value == '') {
    $('#username_msg').fadeIn("slow");
    $('#username').siblings("span").hide();
    username_state = false;
    return;
  }
  if (this.value != '' )
    $('#username_msg').fadeOut();
    $('#username').siblings("span").show();
    username_state = true;
});

$('#username').blur(function() {
  var username_length = $("#username").val().length;
  if(username_length < 5 || username_length > 20) {
    $('#usernamepat_msg').fadeIn("slow");
     
  } else
    $('#usernamepat_msg').fadeOut();
    username_state = true;
    return
});

$('#password').blur(function() {
  if (this.value == '') {
    $('#password_msg').fadeIn("slow");
    password_state = false;
    return;
  }
  if (this.value != '' )
    $('#password_msg').fadeOut();
    password_state = true;
    return;
});

$('#password').blur(function() {
  var passwordpattern = new RegExp(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/i);
  if(passwordpattern.test($("#password").val())) {
      $('#passwordpat_msg').fadeOut("slow");
      password_state = true;
      return;
    } else 
      $('#passwordpat_msg').fadeIn("slow");
      password_state = false;
      return;
});

//If empty values given
$('#plateNumber').blur(function() {
  if (this.value == '') {
    $('#plateNumber_msg').fadeIn("slow");
    $('#plateNumber').css("border","1px solid #D83D5A");
    $('#plateNumber').siblings("span").hide();
    plateNumber_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#plateNumber_msg').fadeOut();
    $('#plateNumber').css("border","");
    $('#plateNumber').siblings("span").show();
    plateNumber_state = true;
    return;
});

$('#make').blur(function() {
  if (this.value == '') {
    $('#make_msg').fadeIn("slow");
    $('#make').css("border","1px solid #D83D5A");
    $('#make').siblings("span").hide();
    make_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#make_msg').fadeOut();
    $('#make').css("border","");
    $('#make').siblings("span").show();
    make_state = true;
    return;
});

$('#series').blur(function() {
  if (this.value == '') {
    $('#series_msg').fadeIn("slow");
    $('#series').css("border","1px solid #D83D5A");
    $('#series').siblings("span").hide();
    series_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#series_msg').fadeOut();
    $('#series').css("border","");
    $('#series').siblings("span").show();
    make_state = true;
    return;
});

$('#yearModel').blur(function() {
  if (this.value == '') {
    $('#yearModel_msg').fadeIn("slow");
    $('#yearModel').css("border","1px solid #D83D5A");
    $('#yearModel').siblings("span").hide();
    yearModel_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#yearModel_msg').fadeOut();
    $('#yearModel').css("border","");
    $('#yearModel').siblings("span").show();
    yearModel_state = true;
    return;
});

$('#color').blur(function() {
  if (this.value == '') {
    $('#color_msg').fadeIn("slow");
    $('#color').css("border","1px solid #D83D5A");
    $('#color').siblings("span").hide();
    color_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#color_msg').fadeOut();
    $('#color').css("border","");
    $('#color').siblings("span").show();
    color_state = true;
    return;
});

 $('#reg_btn').on('click', function(){
  var username = $('#username').val();
  var email = $('#email').val();
  var firstName = $('#firstName').val();
  var middleName = $('#middleName').val();
  var lastName = $('#lastName').val();
  var contactNumber = $('#contactNumber').val();
  var address = $('#address').val();
  var password = $('#password').val();
  var plateNumber = $('#plateNumber').val();
  var yearModel = $('#yearModel').val();
  var make = $('#make').val();
  var series = $('#series').val();
  var color = $('#color').val();
  if (username_state == false && password_state == false && email_state == false && firstName_state == false && lastName_state == false && middleName_state == false && contactNumber_state == false && address_state == false  && plateNumber_state == false && make_state == false && series_state == false && yearModel_state == false && color_state == false ) {
    $('#error_msg').html('<div class="alert alert-danger fade in align="center"><a href="#" class="close" data-dismiss="alert">&times;</a><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Notice</strong> There are still errors in the form.</div>');
  }else{
      // proceed with form submission
      $.ajax({
        url: 'register.php',
        type: 'post',
        data: {
          'save' : 1,
          'email' : email,
          'username' : username,
          'password' : password,
          'firstName' : firstName,
          'lastName' : lastName,
          'middleName' : middleName,
          'contactNumber' : contactNumber,
          'address' : address,
          'plateNumber' : plateNumber,
          'make' : make,
          'series' : series,
          'yearModel' : yearModel,
          'color' : color,
        },
        success: function(data){
      alert('Register success');
       window.location = "login.php?success=done";
     },

      });
  }
 });

});




