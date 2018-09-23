
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="images/Logo.png">
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/style.css">

  <title>EAS Customs</title>
  
</head>

<body>
  <div class="login-form">
      
  <div class="header">
      <img class="logo" src="./images/Logo.png">  
      <h1>LOGIN</h1>
  </div>
      
        <form method="POST" action="process/userlogin.php">
          
          <div class="form-group">  
            <input class="form-control" id="username" type="text" name="username" required autocomplete="off" placeholder="Username ">
            <i class="fa fa-user"></i>
         </div>
            
          <div class= "form-group log-status">
            <input class="form-control" id="password" type="password" name="password" required autocomplete="off"  placeholder="Password">
            <i class="fa fa-lock"></i>
          </div>
           
           <span class="alert">Invalid Credentials</span>  

           <a class="link" href="forgot-password.html">Forgot your password?</a>

          <button class="log-btn" type="submit" name="login">Login</button>

        </form>
          
      </div>
        
   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>
  
  <!-- Bootstrap core JavaScript-->
 
</body>

</html>
