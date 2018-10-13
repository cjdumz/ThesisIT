<?php
//insert.php  
$connect = mysqli_connect("localhost:8080", "root", "", "thesis2");
if(!empty($_POST))
{
 $output = '';
    $fname = mysqli_real_escape_string($connect, $_POST["fname"]);
    $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
    $mname = mysqli_real_escape_string($connect, $_POST["mname"]); 
    $address = mysqli_real_escape_string($connect, $_POST["address"]);  
    $mobilenumber = mysqli_real_escape_string($connect, $_POST["mobilenumber"]);  
    $telephonenumber = mysqli_real_escape_string($connect, $_POST["telephonenumber"]);  
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $query = "
    INSERT INTO personalinfo(firstName, lastName, middleName, address, mobilenumber, telephonenumber, email)  
     VALUES('$fname', '$lname', '$mname', '$address', '$mobilenumber', '$telephonenumber', '$email')
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM personalinfo ORDER BY id DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Employee Name</th>  
                         <th width="30%">View</th>  
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["name"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>