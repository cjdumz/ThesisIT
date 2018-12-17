 $(document).ready(function(){
                         
function load_unseen_notification1(view1 = '')
{
$.ajax({
 url:"process/fetch.php",
 method:"POST",
 data:{view1:view1},
 dataType:"json",
 success:function(data)
 {
  $('').html(data.notification1);
  if(data.unseen_notification1 > 0)
  {
   $('.count1').html('<i class="fas fa-exclamation" style="font-size:12px;"></i>');
  }
 }
});
}

load_unseen_notification1();



$(document).on('click', '#invoicenotification', function(){
$('.count1').html('');
load_unseen_notification1('yes');
});

setInterval(function(){ 
load_unseen_notification1();; 
}, 6000);

});  