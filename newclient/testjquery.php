<!DOCTYPE html>
<html>
<head>
	<title>Tasdasdasd</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".chkbx").click(function(){
		var text = "";
		$(".chkbx:checked").each(function(){
		text+=$(this).val()+',';
		});
		text=text.substring(0,text.length-1);
		$("#selectedtext").val(text);
		var count = $("[type='checkbox']:checked").length;
		$("#count").val($("[type='checkbox']:checked").length);
	});
});	
</script> 

</head>
<body>
	<center>
		<input type="checkbox" class="chkbx" value="C">C
		<input type="checkbox" class="chkbx" value="C#">C#
		<input type="checkbox" class="chkbx" value="PHP">PHP
		<input type="checkbox" class="chkbx" value="Javascript">Javascript
	<div class="panel panel-primary" id="selectedtext"><div>	
	<textarea type="text" id="selectedtext" placeholder="Selected Checkboxes"></textarea>
	<input type="text" id="count" placeholder="Number Of Selected Checkboxes">
	<center>
		


</body>
</html>