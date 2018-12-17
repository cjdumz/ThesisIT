<?php    
    if (!isset($_SESSION['username'])) {
    $_SESSION['unauthorized_user'] = '<div class="alert alert-warning fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Warning</strong>  Unauthorized user please login.
    </div>';
        header('location: login.php');
      }
    if (isset($_SESSION['username'])) {
    header("Refresh: 1800; url=process/logout.php?timeout=yes");
    }
?>
