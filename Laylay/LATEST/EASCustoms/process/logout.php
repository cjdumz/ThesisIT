<?php
if (isset($_REQUEST['timeout'])=="yes"){
	 
    session_start();
    session_destroy();
    header('Location:../login.php');
    session_start();
    $_SESSION['timeout'] = '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>Error</strong> Session timeout due to inactivity.
    </div>';
 }else{
session_start();
session_destroy();
header('Location:../login.php');
}
?>