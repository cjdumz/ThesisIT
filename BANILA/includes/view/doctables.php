<?php
require "process/require/dataconf.php";
?>
<!-- Start of Document Tables-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="doctables" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="5%">ID</th>
                  <th width="20%">Document Name</th>
                  <th width="18%">Serial Number</th>
                  <th width="35%">Description</th>
                  <th width="8%">Type</th>
                  <th width="8%">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $data = $connection->prepare("SELECT * FROM `document`;");
                  if($data->execute()){
                    $values = $data->get_result();
                    while($row = $values->fetch_assoc()) {
                      echo '
                        <tr>
                          <td>'.$row['id'].'</td>
                          <td><a href="#">'.$row['doc_name'].'</a></td>
                          <td>'.$row['serialNumber'].'</td>
                          <td>'.$row['description'].'</td>
                          <td>'.$row['type'].'</td>
                          <td>'.$row['status'].'</td>
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