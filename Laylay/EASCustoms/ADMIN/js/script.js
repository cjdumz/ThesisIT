$('document').ready(function(){
 var username_state = false;
 var email_state = false;
 var plateNumber_state = false;
 var firstName_state = false; 
 var middleName_state = false;
 var lastName_state = false; 
 var address_state = false;
 var contactNumber_state = false;
 var email_state = false;
 var username_state = false;
 var password_state = false;

 //For Appointment
 $("#mechanical").click(function(){
        $("#mechanical_service").toggle();
        $("#electical_service").hide();
        $("#paint_service").hide();
        $("#mechanical").addClass("active");

    });
 $("#electrical").click(function(){
        $("#electrical_service").toggle();
        $("#mechanical_service").hide();
        $("#paint_service").hide();

    });
 $("#painting").click(function(){
        $("#paint_service").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();

    });

$('input[name="service"]').click(function () { getSelectedCheckBoxes('service'); 
  }); 
  var getSelectedCheckBoxes = function (groupName) { 
    var result = $('input[name="' + groupName + '"]:checked'); 
    if (result.length > 0) { 
    var resultString = result.length + " checkboxe(s) checked<br>"; 
    result.each(function () { 
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
        $('#username').parent().addClass("form_error");
        $('#username').siblings("span").text('Username already exist');
        return;
      }else if (response == 'not_taken') {
        username_state = true;
        $('#username').parent().removeClass();
        $('#username').parent().addClass("form_success");
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
          $('#email').parent().removeClass();
          $('#email').parent().addClass("form_success");
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
          $('#plateNumber').parent().addClass("form_error");
          $('#plateNumber').siblings("span").text('Plate Number already exist');
        }else if (response == 'not_taken') {
          plateNumber_state = true;
          $('#plateNumber').parent().removeClass();
          $('#plateNumber').parent().addClass("form_success");
          $('#plateNumber').siblings("span").text('Plate number available');
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
          $('#contactNumber').parent().addClass("form_error");
          $('#contactNumber').siblings("span").text('Plate Number already exist');
        }else if (response == 'not_taken') {
          contactNumber_state = true;
          $('#contactNumber').parent().removeClass();
          $('#contactNumber').parent().addClass("form_success");
          $('#contactNumber').siblings("span").text('Plate number available');
        }
      }
  });
 });




$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
    password_state = true;
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});



// Check if input fields are empty

$('#firstName').blur(function() {
  if (this.value == '') {
    $('#firstName_msg').fadeIn("slow");
    firstName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#firstName_msg').fadeOut();
    firstName_state = true;
    return;
});

$('#middleName').blur(function() {
  if (this.value == '') {  
    $('#middleName_msg').fadeIn("slow");
    middleName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#middleName_msg').fadeOut();
    middleName_state = true;
    return;
});

$('#lastName').blur(function() {
  if (this.value == '') {
    $('#lastName_msg').fadeIn("slow");
    lastName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#lastName_msg').fadeOut();
    lastName_state = true;
    return;
});

$('#address').blur(function() {
  if (this.value == '') {
    $('#address_msg').fadeIn("slow");
    addressName_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#address_msg').fadeOut();
    address_state = true;
    return;
});

$('#contactNumber').blur(function() {
  if (this.value == '') {
    $('#contactNumber_msg').fadeIn("slow");
    contactNumber_state = false;
    return;
    
  }
  if (this.value != '' )
    $('#contactNumber_msg').fadeOut();
    contactNumber_state = true;
    return;
});

$('#email').blur(function() {
  if (this.value == '') {
    $('#email_msg').fadeIn("slow");
    email_state = false;
    return;
  }
  if (this.value != '' )
    $('#email_msg').fadeOut();
    email_state = true;
    return;
});

$('#email').blur(function() {
var emailpattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

    if(emailpattern.test($("#email").val())) {
      $('#emailpat_msg').fadeOut("slow");
      email_state = true;
      return;
    } else 
      $('#emailpat_msg').fadeIn("slow");
      email_state = false;
      return;
});
      

$('#username').blur(function() {
  if (this.value == '') {
    $('#username_msg').fadeIn("slow");
    username_state = false;
    return;
  }
  if (this.value != '' )
    $('#username_msg').fadeOut();
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
  if (username_state == false || email_state == false || firstName_state == false || middleName_state == false || lastName_state == false || contactNumber_state == false || address_state == false || email_state == false || username_state == false || password_state == false) {
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
      //  window.location = "login.php?success=done";
     },

      });
  }
 });
});
