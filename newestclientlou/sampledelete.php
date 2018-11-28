<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
	      <?php
       if ($declinedRequestsresultCheck > 0) {
        while ($appointmentdeclined = mysqli_fetch_assoc($declinedRequestsresult)) {
      ?>
       <?= $appointmentdeclined['plateNumber']; ?><?= $appointmentdeclined['make']; ?> <?= $appointmentdeclined['series']; ?> <?= $appointmentdeclined['yearModel']; ?><br>
      	<?= $appointmentdeclined['status']; ?>
		<input type="hidden" id="<?= $appointmentdeclined['status']; ?>">

	<script >
	$('document').ready(function(){

    function deleteDate(){
    	var id = str;
    	$aja
    }





	}	


	</script>





    </form>

</body>
</html>