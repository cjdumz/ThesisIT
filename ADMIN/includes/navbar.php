<div class="sidebar" data-color="red" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
    <img src="assets/img/Logo.png" class="logoo" alt="logo" />
    <a href="dashboard.php" class="simple-text logo-normal">
        <strong>EAS Customs</strong>
    </a>
    </div>
    
    <div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active">
        <a class="nav-link" href="./dashboard.php">
            <i class="material-icons">drive_eta</i>
            <p>Dashboard</p>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="./tables.php">
            <i class="material-icons">inbox</i>
            <p>Request</p>
        </a>
        </li>
    </ul>
    </div>
</div>

 <!-- Logout Modal-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="process/logout.php">Logout</a>
        </div>
        </div>
    </div>
    </div>