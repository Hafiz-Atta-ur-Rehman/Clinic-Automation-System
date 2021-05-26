<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@provide(title)</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="<?= base_url('pharmacist_assets/vendors/mdi/css/materialdesignicons.min.css') ?>">
    <!-- <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css"> -->
    <link rel="stylesheet" href="<?= base_url('pharmacist_assets/vendors/css/vendor.bundle.base.css') ?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css"> -->
    <link rel="stylesheet" href="<?= base_url('pharmacist_assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
    <!-- <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css"> -->
    <link rel="stylesheet" href="<?= base_url('pharmacist_assets/vendors/jvectormap/jquery-jvectormap.css') ?>">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <!-- <link rel="stylesheet" href="../assets/css/demo/style.css"> -->
    <link rel="stylesheet" href="<?= base_url('pharmacist_assets/css/demo/style.css') ?>">
    <!-- End layout styles -->
    <!-- <link rel="shortcut icon" href="../assets/images/favicon.png" /> -->
    <link rel="shortcut icon" href="<?= base_url('pharmacist_assets/images/favicon.png') ?>" />
    <link href="<?= base_url('doctor_assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('doctor_assets/css/style.css') ?>" rel="stylesheet">
    @provide(stylelinks)

</head>

<body>
    <!-- <script src="../assets/js/preloader.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/js/preloader.js') ?>"></script>
    <div class="body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
            <div class="mdc-drawer__header">
                <a href="<?= base_url('index.php/Pharmacist/dashboard') ?>" class="brand-logo">
                    <h2>
                        <font color="white">Dashboard</font>
                    </h2>
                </a>
            </div>
            <div class="mdc-drawer__content">
                <div class="user-info">
                    <!-- <p class="name">Clyde Miles</p>
                    <p class="email">clydemiles@elenor.us</p> -->
                </div>
                <div class="mdc-list-group">
                    <nav class="mdc-list mdc-drawer-menu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="<?= base_url('index.php/Pharmacist/dashboard') ?>">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon @provide(dashboardselected)"
                                    aria-hidden="true">home</i>
                                Dashboard
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="<?= base_url('index.php/Pharmacist/medicinecategory') ?>">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon  @provide(dashboardselected)"
                                    aria-hidden="true">track_changes</i>
                                Medicine Category
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item ">
                            <a class="mdc-expansion-panel-link" data-toggle="expansionPanel"
                                data-target="ui-sub-menu">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">dashboard</i>
                                Medicine
                                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                            </a>
                            <div class="mdc-expansion-panel" id="ui-sub-menu">
                                <nav class="mdc-list mdc-drawer-submenu">
                                    <div class="mdc-list-item mdc-drawer-item">
                                        <a class="mdc-drawer-link" href="<?= base_url('index.php/Pharmacist/managemedicine') ?>">
                                            Manage Medicines
                                        </a>
                                    </div>
                                    <div class="mdc-list-item mdc-drawer-item">
                                        <a class="mdc-drawer-link" href="<?= base_url('index.php/Pharmacist/medicinesales') ?>">
                                            Medicine Sales
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="<?= base_url('index.php/Pharmacist/payroll') ?>">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">grid_on</i>
                                Payroll
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="<?= base_url('index.php/Pharmacist/profile') ?>">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">pie_chart_outlined</i>
                                Profile
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="profile-actions">
                    <a href="javascript:;">Settings</a>
                    <span class="divider"></span>
                    <a href="<?= site_url('index.php/logout');?>">Logout</a>
                </div>
                
            </div>
        </aside>
        <!-- partial -->
        <div class="main-wrapper mdc-drawer-app-content">
            <!-- partial:partials/_navbar.html -->
            <header class="mdc-top-app-bar">
                <div class="mdc-top-app-bar__row">
                    <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                        <button
                            class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
                        <span class="mdc-top-app-bar__title">CAS</span><span><font color="purple;"><h4>@provide(title)</h4></font></span>
                        <!-- <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
                            <i class="material-icons mdc-text-field__icon">search</i>
                            <input class="mdc-text-field__input" id="text-field-hero-input">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="text-field-hero-input" class="mdc-floating-label"></label>
                                    <h4>@provide(title)</h4>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div> -->
                    </div>
                    <div
                        class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
                        <div class="menu-button-container menu-profile d-none d-md-block">
                            <button class="mdc-button mdc-menu-button">
                                <span class="d-flex align-items-center">
                                    <span class="figure">
                                        <!-- <img src="../assets/images/faces/face1.jpg" alt="user" class="user"> -->
                                        <img src="<?= base_url('pharmacist_assets/images/faces/face1.jpg') ?>"
                                            alt="user" class="user">
                                    </span>
                                    <span class="user-name">Clyde Miles</span>
                                </span>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-account-edit-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <a href="<?= base_url('index.php/Pharmacist/profile') ?>"><h6 class="item-subject font-weight-normal">Profile</h6></a>
                                            
                                        </div>
                                    </li>
                                    <a href="<?= site_url('index.php/logout');?>">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-settings-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Logout</h6>
                                        </div>
                                    </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div class="divider d-none d-md-block"></div>
                        <div class="menu-button-container d-none d-md-block">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-settings"></i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-alert-circle-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Settings</h6>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-progress-download text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Update</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="menu-button-container">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-bell"></i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-email-outline"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">You received a new message</h6>
                                            <small class="text-muted"> 6 min ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-account-outline"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">New user registered</h6>
                                            <small class="text-muted"> 15 min ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-alert-circle-outline"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">System Alert</h6>
                                            <small class="text-muted"> 2 days ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-update"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">You have a new update</h6>
                                            <small class="text-muted"> 3 days ago </small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="menu-button-container">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-email"></i>
                                <span class="count-indicator">
                                    <span class="count">3</span>
                                </span>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <h6 class="title"><i class="mdi mdi-email-outline mr-2 tx-16"></i> Messages</h6>
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail">
                                            <img src="../assets/images/faces/face4.jpg" alt="user">
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Mark send you a message</h6>
                                            <small class="text-muted"> 1 Minutes ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail">
                                            <img src="../assets/images/faces/face2.jpg" alt="user">
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Cregh send you a message</h6>
                                            <small class="text-muted"> 15 Minutes ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail">
                                            <img src="../assets/images/faces/face3.jpg" alt="user">
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Profile picture updated</h6>
                                            <small class="text-muted"> 18 Minutes ago </small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="menu-button-container d-none d-md-block">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-arrow-down-bold-box"></i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-lock-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Lock screen</h6>
                                        </div>
                                    </li>
                                    <a href="<?= site_url('index.php/logout');?>">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-logout-variant text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Logout</h6>
                                        </div>
                                    </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- partial -->
            <div class="page-wrapper mdc-toolbar-fixed-adjust">
                <main class="content-wrapper">
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                                <div class="mdc-card info-card info-card--success">
                                    <div class="card-inner">
                                        <h5 class="card-title">Delivered Medicines</h5>
                                        <h5 class="font-weight-light pb-2 mb-1 border-bottom">62,0076.00</h5>
                                        <p class="tx-12 text-muted">48% target reached</p>
                                        <div class="card-icon-wrapper">
                                            <i class="fas fa-shipping-fast"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                                <div class="mdc-card info-card info-card--danger">
                                    <div class="card-inner">
                                        <h5 class="card-title">Annual Profit</h5>
                                        <h5 class="font-weight-light pb-2 mb-1 border-bottom">$1,958,104.00</h5>
                                        <p class="tx-12 text-muted">55% target reached</p>
                                        <div class="card-icon-wrapper">
                                            <i class="material-icons">attach_money</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                                <div class="mdc-card info-card info-card--primary">
                                    <div class="card-inner">
                                        <h5 class="card-title">Lead Conversion</h5>
                                        <h5 class="font-weight-light pb-2 mb-1 border-bottom">$234,769.00</h5>
                                        <p class="tx-12 text-muted">87% target reached</p>
                                        <div class="card-icon-wrapper">
                                            <i class="material-icons">trending_up</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                                <div class="mdc-card info-card info-card--info">
                                    <div class="card-inner">
                                        <h5 class="card-title">Average Income</h5>
                                        <h5 class="font-weight-light pb-2 mb-1 border-bottom">$1,200.00</h5>
                                        <p class="tx-12 text-muted">87% target reached</p>
                                        <div class="card-icon-wrapper">
                                            <i class="material-icons">credit_card</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                @provide(content)
                            </div>
                        </div>
                    </div>
                </main>
                <!-- partial:partials/_footer.html -->
                <footer  style="background-color: #3b0470; opacity: 70%; color:seashell;">
                    <div class="mdc-layout-grid">
                        <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">Copyright © 2020</span>
                            </div>
                            <div
                                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center tx-14">CLINIC AUTOMATION SYSTEM</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        </div>
    </div>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- plugins:js -->
    <!-- <script src="../assets/vendors/js/vendor.bundle.base.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/vendors/js/vendor.bundle.base.js') ?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- <script src="../assets/vendors/chartjs/Chart.min.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/vendors/chartjs/Chart.min.js') ?>"></script>
    <!-- <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/vendors/jvectormap/jquery-jvectormap.min.js') ?>"></script>
    <!-- <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <!-- <script src="../assets/js/material.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/js/material.js') ?>"></script>
    <!-- <script src="../assets/js/misc.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/js/misc.js') ?>"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- <script src="../assets/js/dashboard.js"></script> -->
    <script src="<?= base_url('pharmacist_assets/js/dashboard.js') ?>"></script>
    <!-- End custom js for this page-->
    @provide(scriptlinks)
</body>


</html>