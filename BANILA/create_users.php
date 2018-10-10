<?php  
//index.php
$connect = mysqli_connect("localhost", "root", "", "thesis");
$query = "SELECT * FROM personalinfo";
$result = mysqli_query($connect, $query);
 ?>  
<!DOCTYPE html>  
<html>  
 <head>  

 <!-- LINK CSS HERE -->

 </head>  
 <body>  
  <div class="container" style="width:700px;">  
   <div class="table-responsive">
    <div align="right">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
    </div>
    <br />
    <div id="employee_table">
     <table class="table table-bordered">
      <tr>
       <th width="70%">Employee Name</th>  
       <th width="30%">View</th>
      </tr>
      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
       <td><?php echo $row["firstName"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="insert_form">
          <label>Enter First Name</label>
          <input type="text" name="fname" id="fname" class="form-control" />
          <label>Enter Last Name</label>
          <input type="text" name="lname" id="lname" class="form-control" />
          <label>Enter Middle Name</label>
          <input type="text" name="mname" id="mname" class="form-control" />
          <label>Enter Address</label>
          <textarea name="address" id="address" class="form-control"></textarea>
          <label>Enter Mobile Number</label>
          <input type="text" name="mobilenumber" id="mobilenumber" class="form-control" />
          <label>Enter Telephone Number</label>
          <input type="text" name="telephonenumber" id="telephonenumber" class="form-control" />
          <label>Enter Email Address</label>
          <input type="text" name="email" id="email" class="form-control" />
          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">User Details</h4>
   </div>
   <div class="modal-body" id="user_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>