<?php require 'process/require/auth.php';?>
<?php require "process/require/dataconf.php";?>
<?php require 'process/process.php'; 



if(isset($_GET['id'])){
    $id = $connection->real_escape_string($_GET["id"]);
    $data = $connection->prepare("SELECT *, concat(firstName, ' ',middleName, ' ',lastName)as 'Name' FROM `personalinfo` WHERE personalId =  $id");
    if($data->execute()){
        $values = $data->get_result();
        $row = $values->fetch_assoc();
        $ID = $row['personalId'];
        $Name = $row['Name'];
    }else{
        header("Location: error.php");
    }
}else{
    header("Location: error.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Client Records</title>
  <link rel="icon" href="images/Logo.png">
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "includes/navbar.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
        
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" style="position:fixed;">
        <hr class="style2">
            
          <li class="nav-item">
            <a class="nav-link" id="active" href="dashboard.php">
              <i class="menu-icon mdi mdi-view-dashboard"></i>
              <span class="menu-title" style="font-size:14px;">Dashboard</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-inbox"></i>
              <span class="menu-title" style="font-size:14px;">Request</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="appointments.php" style="font-size:14px;">Appointments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="overdue.php" style="font-size:14px;">Overdue</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="declined.php" style="font-size:14px;">Declined</a>
                </li>
              </ul>
            </div>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="calendar.php">
              <i class="menu-icon mdi mdi-calendar"></i>
              <span class="menu-title" style="font-size:14px;">Calendar</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="dailytaskform.php">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title" style="font-size:14px;">Daily Task Form</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link"  href="chargeinvoice.php">
              <i class="menu-icon mdi mdi-receipt"></i>
              <span class="menu-title" style="font-size:14px;">Charge Invoice</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="accountmanagement.php">
              <i class="menu-icon mdi mdi-account-multiple"></i>
              <span class="menu-title" style="font-size:14px;">Account Management</span>
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
              <i class="menu-icon mdi mdi-car-side"></i>
              <span class="menu-title" style="font-size:14px;">Vehicle</span>
            </a>
          </li>
            
        </ul>
      </nav>
        
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin  stretch-card">
              <div class="card">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="clientrecords.php">Client Records</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $Name ?></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <div class="row">
            
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="offset-2 col-8">
                          <p class="card-title text-center" style="font-size:20px;"><i class="fa fa-caret-square-o-left"></i><?php echo $Name ?></p>

                          <button type="button" class="btn btn-info btn-block"><a href="personalinfo.php?id=<?php echo $ID ?>" style="text-decoration:none; color: white;">Personal Information</a></button>
                          <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#viewvehicle">Vehicle Information</button>
                          <button type="button" class="btn btn-info btn-block">Daily Task Form</button>
                          <button type="button" class="btn btn-info btn-block">History of Vehicle</button>

                      </div>
                  </div>
                    
                  
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "includes/footer.php";?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>



<!-- Modal -->
<div class="modal fade" id="viewvehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Vehicle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
        $data = $connection->prepare("SELECT * FROM `vehicles` WHERE vehicles.personalId = $ID");
        if($data->execute()){
            $values = $data->get_result();
            while($row = $values->fetch_assoc()) {
              echo '
              <button type="button" class="btn btn-info btn-block">
                <a href="vehicleinfo.php?plate='.$row['plateNumber'].'" style="text-decoration:none; color: white;">'.$row['plateNumber'].'</a>
              </button>

              ';
            }
        }else{
            echo "";
        }
        ?>
      </div>
    </div>
  </div>
</div>


  <!-- Modal -->
  
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <script src="js/sb-admin-datatables.min.js"></script>
   <script src="js/script.js"></script>
  <!-- AJAX Link -->
 <script>
$(document).ready(function(){
  $("#submit").click(function(){
    var exampleInputName1 = $("#exampleInputName1").val();
    var exampleInputName2 = $("#exampleInputName2").val();
    var exampleInputName3 = $("#exampleInputName3").val();
    var exampleInputPlate = $("#exampleInputPlate").val();
    var exampleInputEmail = $("#exampleInputEmail").val();
    var exampleInputMobile = $("#exampleInputMobile").val();
    var exampleInputTel = $("#exampleInputTel").val();
    var exampleInputAddress = $("#exampleInputAddress").val();
    var dataString = 'exampleInputName1=' + exampleInputName1 + '&exampleInputName2=' + exampleInputName2;
    if(exampleInputName1=='' || exampleInputName2=='' || exampleInputName3=='' || exampleInputNPlate=='' || exampleInputEmail==''
      || exampleInputMobile=='' || exampleInputTel=='' || exampleInputAddress==''){
      alert('Fill all fields')
      $("#display").html("");
    } else {
    $.ajax({
      type: "POST",
      cache: false,
      success: function(result){
       $("#display").html(result);
      }
    });
    }
    return false;
  }); 
});
</script>

<script>
  var table = $('#doctables').DataTable({
    // PAGELENGTH OPTIONS
    "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]

});
</script>
</body>



</html>