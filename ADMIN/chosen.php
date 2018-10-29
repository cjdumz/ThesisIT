<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/dataTables.bootstrap4.css" rel="stylesheet">
</head>
<body>
    <select name="" id="" class="owner">
        <option value="">Gavrail</option>
        <option value="">Fenrir</option>
        <option value="">Gurguit</option>
        <option value="">Ahsha</option>
        <option value="">Altmile</option>
        <option value="">Giai</option>
        <option value="">Shiranui</option>
        <option value="">Yasui</option>
        <option value="">Blademaster</option>
        <option value="">Susanoo</option>
        <option value="">Claret</option>
        <option value="">Luard</option>

    </select>
    
  <script src="js/jquery.min.js"></script>
  <script src="vendor/chosen/chosen.jquery.js"></script>
  <script>
    $(document).ready.(function(){
      $(".owner").chosen();
    });
  </script>
</body>
</html>