<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content="flat ui, admin , Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url(); ?>back/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/icon/icofont/css/icofont.css">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/flag-icon/flag-icon.min.css">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/menu-search/css/component.css">
    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/bower_components/sweetalert/dist/sweetalert.css">
    <!-- Switch component css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/bower_components/switchery/dist/switchery.min.css">
    <!-- list css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/list-scroll/list.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/bower_components/stroll/css/stroll.css">
    <!-- Tags css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" />
    <!-- C3 chart -->
    <link rel="stylesheet" href="<?= base_url(); ?>back/bower_components/c3/c3.css" type="text/css" media="all">
    <!-- Calender css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>front/css/components/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>front/css/components/datepicker.css">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/css/component.css">
     <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/j-pro/css/j-pro-modern.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/j-pro/css/j-forms.css">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/css/style.css">
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>back/assets/css/color/color-1.css" id="color" />
</head>

<body class="fix-menu menu-expanded">
    <!-- Menu header start -->
    <nav class="navbar header-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <a class="mobile-search morphsearch-search" href="#">
                    <i class="ti-search"></i>
                </a>
                <a href="<?= base_url('user');?>">
                    <img class="img-fluid" src="<?= base_url(); ?>back/assets/images/logo.png" alt="Theme-Logo" />
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-container container-fluid">
                <div>
                    <ul class="nav-left">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>                      
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li> 
                        <li class="header-notification">
                            <a href="<?= base_url('user');?>">
                                <i class="fa fa-google-wallet"></i> Wallet = N<?php if(isset($money)) echo $money;?>
                            </a>
                        </li>   
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <a href="#!">
                            <?php
                                if(!isset($image)){
                                    $image = 'xxxxxxxx.jpg';
                                }
                                if (file_exists('front/uploads/images/'.$image)) {
                            ?>
                                    <img class="rounded-circle img-40" src="<?= base_url('front/uploads/images/' .$image);?>"  class="img-sm">
                            <?php
                                }
                                else {
                            ?>
                                    <img class="rounded-circle img-40" src="<?= base_url(); ?>back/assets/images/user.png" alt="User-Profile-Image">
                                <?php
                                }
                            ?>
                                <span><?= $this->session->userdata('username');?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="<?= base_url('user/profile'); ?>">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('user/reset'); ?>">
                                        <i class="ti-settings"></i> Update Password
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('logout');?>">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Menu header end -->
    <!-- Menu aside start -->
    <div class="main-menu">
        <div class="main-menu-header">
        <?php
            if (file_exists('front/uploads/images/'.$image)) {
        ?>
                <img class="rounded-circle img-40" src="<?= base_url('front/uploads/images/' .$image);?>"  class="img-sm">
        <?php
            }
            else {
        ?>
                <img class="rounded-circle img-40" src="<?= base_url(); ?>back/assets/images/user.png" alt="User-Profile-Image">
            <?php
            }
        ?>
            <div class="user-details">
                <span><?= $this->session->userdata('username');?></span>
            </div>
        </div>
        <div class="main-menu-content">
            <ul class="main-navigation">
                <li class="nav-item single-item">
                        <a href="<?= base_url('user'); ?>">
                            <i class="ti-view-grid"></i>
                            <span data-i18n="nav.widget.main"> Dashboard</span>
                        </a>
                 </li>
                  <li class="nav-item single-item">
                        <a href="<?= base_url('user/profile'); ?>">
                            <i class="ti-user"></i>
                            <span data-i18n="nav.documentation.main"> Profile</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/payment-profile'); ?>">
                            <i class="ti-credit-card"></i>
                            <span data-i18n="nav.submit-issue.main"> Payment Profile</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/lottery/play'); ?>">
                            <i class="ti-reload"></i>
                            <span data-i18n="nav.submit-issue.main"> Play Lottery</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/deposits'); ?>">
                            <i class="ti-stamp"></i>
                            <span data-i18n="nav.submit-issue.main"> Deposits</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/purchase'); ?>">
                            <i class="ti-ticket"></i>
                            <span data-i18n="nav.submit-issue.main"> Purchased Tickets</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/winnings'); ?>">
                            <i class="ti-crown"></i>
                            <span data-i18n="nav.submit-issue.main"> Winnings</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/withdrawals'); ?>">
                            <i class="ti-eraser"></i>
                            <span data-i18n="nav.submit-issue.main"> Withdrawals</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/transactions'); ?>">
                            <i class="ti-exchange-vertical"></i>
                            <span data-i18n="nav.submit-issue.main"> Transactions</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/referrals'); ?>">
                            <i class="ti-heart"></i>
                            <span data-i18n="nav.submit-issue.main"> Referrals</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?= base_url('user/supports'); ?>">
                            <i class="ti-support"></i>
                            <span data-i18n="nav.submit-issue.main"> Supports</span>
                        </a>
                    </li>
             </ul>      
        </div>
    </div>
    <!-- Menu aside end -->


    
    