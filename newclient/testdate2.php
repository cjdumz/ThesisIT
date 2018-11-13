<?php
session_start();
include 'process/database.php';
$mechanicalservice = new database ;
$mechanicalservice -> mechanical_service();
$electricalservice = new database ;
$electricalservice -> electrical_service();
$paintservice = new database ;
$paintservice -> painting_service();
$appointmentinfo = new database ;
$appointmentinfo -> appointment_info_activeschedule();
$personalinfo = new database ;
$personalinfo -> personal_info();


//PDO
//Connect to our MySQL database using the PDO extension.
$id = $_SESSION['id'];
$pdo = new PDO('mysql:host=localhost;dbname=thesis', 'root', '');
$result = $pdo->query("select personalId from personalinfo where user_id = '$id'")->fetchColumn();//Our select statement.
$sql = "SELECT * FROM vehicles where personalId = '$result'"; //Prepare the select statement.
$stmt = $pdo->prepare($sql); //Execute the statement.
$stmt->execute(); //Retrieve the rows using fetchAll.
$vehicles = $stmt->fetchAll();  

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Facebook Style Header Notification using PHP Ajax Bootstrap</title>
  <link rel="stylesheet" href="css/normalize.css"  type="text/css"/>
  <link rel="stylesheet" href="css/datepicker.css"  type="text/css"/> 
  <script src="js/jquery-1.7.1.min.js"></script>
  <script> 
  var $jq171 = jQuery.noConflict(true);
  </script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script> 
      var $jq310 = jQuery.noConflict(true);
      </script>
  
  <script> 
  window.jQuery = $jq171;
  </script>
  <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script> 
 </head>
 <body>
  <br /><br />
  <div class="container">
      <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="#">Webslesson Tutorial</a>
     </div>
     <ul class="nav navbar-nav navbar-right">
       <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">Appointment Status <span class="label label-pill label-danger count" style="border-radius:10px;"></span></a>
       <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider"></ul>
      </li>
     </ul>
    </div>

     <div class="form-group">
      <script type="text/javascript">
        $jq171(document).ready(function(){
           var unavailableDates  = [<?php
           foreach($appointmentinfo->appointment_info as $appointmentinfo):
           ?>"<?= date('j-m-Y', strtotime($appointmentinfo['date'])); ?>",
          <?php     
            endforeach;
          ?>];
           function unavailable(date) {
           dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
           if ($jq171.inArray(dmy, unavailableDates) == -1) {
            return [true, ""];
            } else {
            return [false, "", "Unavailable"];
            }
           }

          $jq171(function(){
            $jq171('#datepicker').datepicker({
              minDate: 0,
              beforeShowDay: $jq171.datepicker.noWeekends,
              inline: true,
              //nextText: '&rarr;',
              //prevText: '&larr;',
              showOtherMonths: true,
              //dateFormat: 'dd MM yy',
              dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
              beforeShowDay: unavailable, 
              //showOn: "button",
              //buttonImage: "img/calendar-blue.png",
              //buttonImageOnly: true,
            });
          });
        });
          </script>

   
          
          <label for="date">Select Date</label>
          <input type="text" id="datepicker" name="date" class="form-control" autocomplete="off">
  
 
  </div>

 </body>
</html>
 <script>
$jq310(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $jq310.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $jq310('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $jq310('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $jq310('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($jq310('#vehicle').val() != '' && $jq310('#additionalMessage').val() != '')
  {
   var form_data = $jq310(this).serialize();
   $jq310.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $jq310('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $jq310(document).on('click', '.dropdown-toggle', function(){
  $jq310('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>

