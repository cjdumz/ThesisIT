<html> 
<head> 
<title></title> 
<script src="js/jquery.js"></script> 
<script type="text/javascript"> 
$(document).ready(function () { 
	$('input[name="skills"]').click(function () { getSelectedCheckBoxes('skills'); 
	}); 
	$('input[name="cities"]').click(function () { getSelectedCheckBoxes('cities'); 
	}); 
	var getSelectedCheckBoxes = function (groupName) { 
		var result = $('input[name="' + groupName + '"]:checked'); if (result.length > 0) { 
		var resultString = result.length + " checkboxe(s) checked<br>"; 
		result.each(function () { resultString += $(this).val() + "<br/>"; 
		}); 
		 $('#div' + groupName).html(resultString); } 
		 else { $('#div' + groupName).html("No checkbox checked"); } 
		 }; 
	}); 
</script> </head> 
<body style="font-family:Arial"> 
	Skills : 
	<input type="checkbox" name="skills" value="JavaScript" >
	JavaScript 
	<input type="checkbox" name="skills" value="jQuery" />
	jQuery 
	<input type="checkbox" name="skills" value="C#" />
	C# 
	<input type="checkbox" name="skills" value="VB" />
	VB 
	<br />
	<br /> 
	Preferred Cities : 
	<input type="checkbox" name="cities" value="New York" />
	New York 
	<input type="checkbox" name="cities" value="New Delhihi" />
	New Delhi 
	<input type="checkbox" name="cities" value="London" />
	London 
	<br />
	<br /> 
	Selected Skills:
	<br /> 
	<div id="divskills">
	</div> 
	<br /> 
	Selected Cities:
	<br /> 
	<div id="divcities">
	</div> 
</body> 
</html>