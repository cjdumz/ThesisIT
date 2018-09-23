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
                  <th>Customer Name</th>
                  <th>Service</th>
                  <th>Plate Number</th>
                  <th>Brand</th>
                  <th>Series</th>
                  <th>Time</th>
                  <th>Year Model</th>
                  <th width="10%">Date</th>
                  <th>Time</th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $data = $connection->prepare("SELECT appointments.id as 'ID',concat(firstName,' ',middleName,' ',lastName) as 'Name',make,series,
                  yearModel,plateNumber,serviceType,serviceName as 'sername',appointments.status,date,time from appointments join personalinfo on appointments.personalId
                   = personalinfo.personalId join vehicles on appointments.vehicleId = vehicles.id join services on appointments.serviceId
                    = services.serviceId where status = 'pending'");
                  if($data->execute()){
                    $values = $data->get_result();
                    while($row = $values->fetch_assoc()) {
                      echo '
                        <tr class="text-center">
                          <td>'.$row['Name'].'</td>
                          <td>'.$row['sername'].'</td>
                          <td>'.$row['plateNumber'].'</td>
                          <td>'.$row['make'].'</td>
                          <td>'.$row['series'].'</td>
                          <td>'.$row['yearModel'].'</td>
                          <td>'.$row['status'].'</td>
                          <td>'.$row['date'].'</td>
                          <td>'.$row['time'].'</td>
                          <td>

                            <form method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="command" value="accept">
                              <input type="hidden" name="id" value="'.$row['ID'].'">
                              <button class="btn btn-success" type="submit" name="commands" style="width: 100px">Accept</button>
                            </form>

                            <form method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="command" value="deny">
                              <input type="hidden" name="id" value="'.$row['ID'].'">
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