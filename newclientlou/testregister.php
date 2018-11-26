<?php include('process/process.php'); ?>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
 <form id="register_form">
      <h1>Register</h1>
      <div id="error_msg"></div>
    <div>
    <input type="text" name="username" placeholder="Username" id="username" >
      <br><span></span>
    </div>
    <div>
      <input type="email" name="email" placeholder="Email" id="email">
    <br><span></span>
    </div>
    <div>
     <input type="password" name="password" placeholder="Password" id="password">
    </div>
    <div>
    <button type="button" name="register" id="reg_btn">Register</button>
    </div>
  </form>
</body>
</html>
<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/script.js"></script>