$(document).ready(function(){
$('.action').change(function(){
if($(this).val() != '')
{
var action = $(this).attr("id");
var query = $(this).val();
var result = '';
if(action == "make")
{
result = 'series';
}
$.ajax({
url:"process/fetchmakeseries.php",
method:"POST",
data:{action:action, query:query},
success:function(data){
$('#'+result).html(data);
}
})
}
});
});

function myFunction() {
var x = document.getElementById("others"); 
var result = $('input[name="otherMake"]');
$("#make").click(function(){
if($('#make').val() !== '' ){
$("#others").fadeOut();
$("#otherseries").fadeOut();
return; 
};

});

}