<?php
require "process/require/dataconf.php";
?>
<!-- Start of Document Tables-->
  <div class="card mb-3" ><!-- card-md-3-start -->

    <div class="card-header">
      <i class="fa fa-fw fa-desktop"></i> Computer Parts
    </div>

  <div class="card-body"><!-- card-body-start -->
    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM `computer` inner join office on computer.office_idfk = office.office_id
    inner join office_group on office.group_idfk = office_group.group_id where computer.computer_id=$id;";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    echo'  <div class="form-group">

            <div class="row"><!-- row-start -->
              <div class="col-md-2"><p>Device Name:</p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['computer_name'].'</h5></div>
              <div class="col-md-2"><p>Date Acquired:</p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['date_acquired'].'</h5></div>
            </div><!-- row-end -->
            <div class="row">
              <div class="col-md-2"><p>Office: </p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['office_name'].'</h5></div>
              <div class="col-md-2"><p>User: </p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['computer_user'].'</h5></div>
            </div>
            <div class="row">
              <div class="col-md-2"><p>Office Group: </p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['office_group'].'</h5></div>
              <div class="col-md-2"><p>Computer Type:</p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['computer_type'].'</h5></div>
            </div>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-4"></div>
              <div class="col-md-2"><p>Status: </p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['status_c'].'</h5></div>
            </div>

          <hr>

          <div class="form-group">
            <div class="row">
              <div class="col-md-2"><p>Operating System: </p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['operating_system'].'</h5></div>
              <div class="col-md-2"><p>Licensed: </p></div>
              <div class="col-md-4"><h5 style="margin-top: -1%">'.$row['os_stat'].'</h5></div>
            </div>
          </div>

          ';
    ?>
    </div><!-- card-body-end -->
    <div class="table-responsive"><!-- table-responsive-start -->

    </div>
  </div>
  <div class="card-footer small text-muted">
    Updated on January 31, 2018
  </div>
</div>
    <!-- End of Document -->