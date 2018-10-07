<?php
require "process/require/dataconf.php";
?>
<!-- Start of Document Tables-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Appointment Request</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="doctables3" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                   <th>Customer Name</th>
                   <th>Address</th>
                   <th>Contact Number</th>
                   <th>Email Address</th>
                   <th>Status</th>
                   <th>Member</th>

                </tr>
              </thead>
              <tbody>
                <?php
                  $data = $connection->prepare("SELECT user_id, concat(`firstName`,' ' ,`lastName`,'',`middleName`) as 'Name', `address`, `mobileNumber`, `telephoneNumber`, `email` FROM `personalinfo`");
                  if($data->execute()){
                    $values = $data->get_result();
                    while($row = $values->fetch_assoc()) {
                      echo '
                        <tr class="text-left">
                          <td><a href=#>'.$row['Name'].'</a></td>
                          <td>'.$row['address'].'</td>
                          <td>'.$row['mobileNumber'].'</td>
                          <td>'.$row['email'].'</td>
                          <td>Active</td>';
                          if(!$row['user_id']){
                              echo '<td class="text-center">No</td>' ;
                          }else{
                            echo '<td class="text-center">Yes</td>' ;
                          }
                        echo'
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