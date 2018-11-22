<!-- Navigation jquery-->
<head>
    <script>
       $(function () {
  $(document).scroll(function () {
    var $nav = $("#navhead");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
    </script>
</head>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row" id="navhead">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center custom">
        <img src="images/Logo.png" class="logoo" alt=""/>
        <a class="navbar-brand" href="dashboard.php" style="color: #b80011; margin-top: 5px; margin-left: 3px;">
          <strong>EAS CUSTOMS</strong>
        </a>
    </div>
        <div class="navbar-menu-wrapper d-flex align-items-center custom" style="color:#b80011";>
         
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
            <li class="nav-item">
            </li>
        </ul>
            
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell"></i>
                <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                    </div>
                </div>
                <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                    <p class="font-weight-light small-text">
                    Just now
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                    </div>
                </div>
                <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                    <p class="font-weight-light small-text">
                    Private message
                    </p>
                </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                    </div>
                </div>
                <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                    <p class="font-weight-light small-text">
                    2 days ago
                    </p>
                </div>
                </a>
            </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="profile-text" style="font-size:14px; font-weight:bold;">Hello, Admin
                </span>
                <img class="img-xs rounded-circle" src="images/faces-clipart/pic-2.png" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item mt-2"><i class="menu-icon mdi mdi-account-settings-variant"></i>
                Account Settings
                </a>
                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="menu-icon mdi mdi-logout-variant"></i>Logout
                </a>
            </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
        </div>
    </nav>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #000099; color: white; border: 3px solid #000099;">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
            <a class="btn btn-darkblue" href="process/logout.php"><i class="menu-icon mdi mdi-logout-variant"></i>Logout</a>
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="menu-icon mdi mdi-cancel"></i>Cancel</button>
            </div>
        </div>
    </div>
</div>