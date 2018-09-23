<?php
require "process/require/dataconf.php";
?>
<!-- Start of Document Tables-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Schedules</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="doctables" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th>Customer Name</th>
                  <th>Service</th>
                  <th>Plate Number</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $data = $connection->prepare("SELECT services.serviceName as `sername`, vehicles.plateNumber as 'vicid', appointments.id as 
                  'appointment ID', concat(personalinfo.firstName,' ', personalinfo.middleName,' ', personalinfo.lastName) 
                  as `Name`, appointments.status, appointments.date, appointments.time from appointments join services join vehicles join personalinfo where services.serviceId 
                  = appointments.serviceId and vehicles.id = appointments.vehicleId and personalinfo.personalId =
                   appointments.personalId and status='Accepted' and appointments.vehicleId = vehicles.id;");
                  if($data->execute()){
                    $values = $data->get_result();
                    while($row = $values->fetch_assoc()) {
                      echo '
                        <tr class="text-center">
                          <td>'.$row['Name'].'</td>
                          <td>'.$row['sername'].'</td>
                          <td>'.$row['vicid'].'</td>
                          <td>'.$row['status'].'</td>
                          <td>'.$row['date'].'</td>
                          <td>'.$row['time'].'</td>

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