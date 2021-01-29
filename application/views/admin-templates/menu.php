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
                <a href="index.html">
                    <img class="img-fluid" src="<?php echo base_url(); ?>back/assets/images/logo.png" alt="Theme-Logo" />
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
                            <a href="#">
                                <i class="fa fa-google-wallet"></i> Wallet = N12.00
                            </a>
                        </li>   
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <a href="#!">
                                <img src="<?php echo base_url(); ?>back/assets/images/user.png" alt="User-Profile-Image">
                                <span><?= $this->session->userdata('name');?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li>
                                    <a href="<?php echo base_url('admin/update-password'); ?>">
                                        <i class="ti-settings"></i> Password
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/logout'); ?>">
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
            <img class="img-40" src="<?php echo base_url(); ?>back/assets/images/user.png" alt="User-Profile-Image">
            <div class="user-details">
                <span><?= $this->session->userdata('name');?></span>
            </div>
        </div>
        <div class="main-menu-content">
            <ul class="main-navigation">
                <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/dashboard'); ?>">
                            <i class="ti-view-grid"></i>
                            <span data-i18n="nav.widget.main"> Dashboard</span>
                        </a>
                 </li>
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/users'); ?>">
                            <i class="ti-file"></i>
                            <span data-i18n="nav.documentation.main"> Users</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/deposits'); ?>">
                            <i class="ti-layout-list-post"></i>
                            <span data-i18n="nav.submit-issue.main"> Deposits</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/manage-lottery'); ?>">
                            <i class="ti-layout-list-post"></i>
                            <span data-i18n="nav.submit-issue.main"> Manage Lottery</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#!">
                            <i class="ti-layout-cta-right"></i>
                            <span data-i18n="nav.navigate.main">Draw Lottery</span>
                        </a>
                        <ul class="tree-1">
                            <li><a href="<?php echo base_url('admin/school-fees'); ?>" data-i18n="nav.navigate.navbar">Play For School Fees</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/house-rent'); ?>" data-i18n="nav.navigate.navbar-inverse">Play For House Rent</a></li>
                            <li><a href="<?php echo base_url('admin/business-funding'); ?>" data-i18n="nav.navigate.navbar-with-elements">Play For Business Funding</a></li>
                        </ul>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/draw-history'); ?>">
                            <i class="ti-layout-list-post"></i>
                            <span data-i18n="nav.submit-issue.main"> Draw History</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/winners'); ?>">
                            <i class="ti-layout-list-post"></i>
                            <span data-i18n="nav.submit-issue.main"> Winners</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/withdrawal-requests'); ?>">
                            <i class="ti-layout-list-post"></i>
                            <span data-i18n="nav.submit-issue.main"> Withdrawals Request</span>
                        </a>
                    </li>
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/counter'); ?>">
                            <i class="ti-layout-list-post"></i>
                            <span data-i18n="nav.submit-issue.main"> Counter</</span>
                        </a>
                    </li>           
                    <li class="nav-item single-item">
                        <a href="<?php echo base_url('admin/transactions'); ?>">
                            <i class="ti-layout-list-post"></i>
                            <span data-i18n="nav.submit-issue.main"> Transactions</span>
                        </a>
                    </li>
             </ul>      
        </div>
    </div>
    <!-- Menu aside end -->