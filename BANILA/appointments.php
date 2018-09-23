<?php 
require 'process/require/auth.php';
require "process/require/dataconf.php";

if(isset($_POST['commands'])){
  $action = $connection->real_escape_string($_POST["command"]);
  $id = $connection->real_escape_string($_POST["id"]);

  if($action=='accept'){
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Accepted' WHERE `appointments`.`id` = $id ;");
  }else{
    $actions_command = $connection->prepare("UPDATE `appointments` SET `status` = 'Declined' WHERE `appointments`.`id` = $id ;");
  }
  if($actions_command ->execute()){
    header("Refresh: 0; url=appointments.php");
  }else{
    $errMSG = "there was an error while updating the data..";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Documents</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Start ofNavigation -->
  <?php include "includes/nav.php";?>
  <!-- End of Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="appointments.php">Appointments</a>
        </li>
        <li class="breadcrumb-item active">Requests</li>
      </ol>
      
      <!-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#RecordDocument" style="margin-bottom: 15px;">
        <span class="fa fa-plus-circle fa-1x">
        </span> Record Document
      </a> -->

      <div class="row">
        <div class="col-12">
          <?php include "includes/view/doctables.php";?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

   <!-- Start of Footer -->
   <?php include "includes/footer.html";?>
    <!-- End of Footer-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include "includes/logout.html";?>
    <!-- End of Logout Modal -->

    <!-- Record Document Modal-->
    <?php include "includes/recorddocument.html";?>
    <!-- End of Record Document Modal -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  </div>
</body>

</html>

<script>
    var table = $('#doctables').DataTable({
      // PAGELENGTH OPTIONS
      "lengthMenu": [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]]
      
 });
</script>