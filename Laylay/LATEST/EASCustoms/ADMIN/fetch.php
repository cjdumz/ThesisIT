<?php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "thesis");
 $output = '';
 if($_POST["action"] == "make")
 {
  $query = "SELECT series FROM make_series WHERE make = '".$_POST["query"]."' GROUP BY series";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select Series</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["series"].'">'.$row["series"].'</option>';
  }
 }
 echo $output;
}
?>