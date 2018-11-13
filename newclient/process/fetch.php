<?php
if(isset($_POST["view"]))
{
include 'process/database.php';
$db = mysqli_connect('localhost', 'root', '', 'thesis');
 
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE appointments SET notification=1 WHERE notification=0";
  mysqli_query($db, $update_query);
 }

 $query = "SELECT * FROM appointments ORDER BY id DESC LIMIT 5";
 $result = mysqli_query($db, $query);
 $output = '';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="requeststatus.php?status='.$row["status"].'">
     <strong>Vehicle '.$row["vehicleId"].$row["personalId"].$row["serviceId"].' </strong><br/>
     <small><em>This vehicle is now '.$row["status"].' check it here </em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 } 
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query2 = "SELECT * FROM appointments WHERE notification=0";
 $result2 = mysqli_query($db, $query2);
 $count = mysqli_num_rows($result2);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>