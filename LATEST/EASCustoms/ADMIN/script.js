//function myFunction() {
   // var x = document.getElementById("others"); 
   //var result = $('input[name="otherMake"]');
   // $("#make").click(function(){
    	//if($('#make').val() !== '' ){
    	//$("#others").fadeOut();
        //$("#otherseries").fadeOut();
        //return;	
		//};

    //});

	//$("#otherMake").click(function(){
    //if ($('#otherMake').is(':checked')) {
	//$("#others").fadeIn();
   // $("#otherseries").fadeIn();
    //$('#series').val('');
    //$('#make').val('');
    //return;
      // };
    //});

//}


 //For Appointment
 $('document').ready(function(){






 //For Appointment
 $("#others").click(function(){
        $("#other_service").toggle();
        $("#mechanical_service").hide();
        $("#paint_service").hide();
        $("#customization").hide();
        $("#body_Repair").hide();
        $("#maintenance_service").hide();
    });
 $("#mechanical").click(function(){
        $("#mechanical_service").toggle();
        $("#electrical_service").hide();
        $("#paint_service").hide();
        $("#customization").hide();
        $("#body_Repair").hide();
        $("#maintenance_service").hide();
    });
 $("#electrical").click(function(){
        $("#electrical_service").toggle();
        $("#mechanical_service").hide();
        $("#paint_service").hide();
        $("#customization").hide();
        $("#body_Repair").hide();
        $("#maintenance_service").hide();
    });
 $("#painting").click(function(){
        $("#paint_service").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#customization").hide();
        $("#body_Repair").hide();
        $("#maintenance_service").hide();

    });
 $("#bodyRepair").click(function(){
        $("#body_Repair").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#paint_service").hide();
        $("#customization").hide();
        $("#maintenance_service").hide();

    });
 $("#customize").click(function(){
        $("#customization").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#body_Repair").hide();
        $("#paint_service").hide();
        $("#maintenance_service").hide();


    });
 $("#maintenance").click(function(){
        $("#maintenance_service").toggle();
        $("#electrical_service").hide();
        $("#mechanical_service").hide();
        $("#body_Repair").hide();
        $("#paint_service").hide();
        $("#customization").hide();

    });
 
 $("#Pending").click(function(){
        $("#pendingContent").toggle();
        $("#activeContent").hide();
        $("#rescheduleContent").hide();

    });
 $("#Active").click(function(){
        $("#activeContent").toggle();
        $("#pendingContent").hide();
        $("#rescheduleContent").hide();

    });
 $("#Reschedule").click(function(){
        $("#rescheduleContent").toggle();
        $("#pendingContent").hide();
        $("#activeContent").hide();

    });

});




