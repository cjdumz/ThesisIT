<?php
require "process/require/dataconf.php";
?>
<!-- Start of Document Tables-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Appointment Request</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="doctables" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>Service ID</th>
                  <th>Personal ID</th>
                  <th>Plate Number</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th width="20%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $data = $connection->prepare("SELECT * FROM `appointments` where status='Pending';");
                  if($data->execute()){
                    $values = $data->get_result();
                    while($row = $values->fetch_assoc()) {
                      echo '
                        <tr class="text-center">

                          <td>'.$row['id'].'</td>
                          <td>'.$row['serviceId'].'</td>
                          <td>'.$row['vehicleId'].'</td>
                          <td>'.$row['personalId'].'</td>
                          <td>'.$row['status'].'</td>
                          <td>'.$row['date'].'</td>
                          <td>'.$row['time'].'</td>
                          <td>

                            <form method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="command" value="accept">
                              <input type="hidden" name="id" value="'.$row['id'].'">
                              <button class="btn btn-success" type="submit" name="commands" style="width: 100px">Accept</button>
                            </form>

                            <form method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="command" value="deny">
                              <input type="hidden" name="id" value="'.$row['id'].'">
                              <button class="btn btn-danger" type="submit" name="commands" style="width: 100px">Deny</button>
                            </form>
                                
                          </td>

                        </tr>
                      ';
                    }
                  }else{
                    echo "<tr>
                            <td colspan='7'>No Available Data</td>
                          </tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- End of Document -->