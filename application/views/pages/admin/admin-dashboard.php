<div class="main-body" style="padding-top: 50px">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <!-- counter-card-1 start-->
                <div class="col-md-6 col-xl-3">
                    <div class="card client-blocks dark-primary-border">
                        <div class="card-block">
                            <h5>Total Users</h5>
                            <ul>
                                <li>
                                    <i class="icofont icofont-document-folder"></i>
                                </li>
                                <li class="text-right">
                                    <?php if(isset($user_counts)){
                                        echo $user_counts;
                                    } else{
                                        echo '0';
                                    }?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- counter-card-1 end-->
                <!-- counter-card-2 start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card client-blocks warning-border">
                        <div class="card-block">
                            <h5>Total Tickets</h5>
                            <ul>
                                <li>
                                    <i class="icofont icofont-ui-user-group text-warning"></i>
                                </li>
                                <li class="text-right text-warning">
                                    <?php if(isset($ticket_counts)){
                                        echo $ticket_counts;
                                    } else{
                                        echo '0';
                                    }?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- counter-card-2 end -->
                <!-- counter-card-3 start -->
                 <div class="col-md-6 col-xl-3">
                    <div class="card client-blocks success-border">
                        <div class="card-block">
                            <h5>Total Deposits</h5>
                            <ul>
                                <li>
                                    <i class="icofont icofont-files text-success"></i>
                                </li>
                                <li class="text-right text-success">
                                    N<?php if(isset($deposit_amounts)){
                                        echo $deposit_amounts;
                                    } else{
                                        echo 'N0';
                                    }?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
                <!-- counter-card-3 end -->
                <!-- counter-card-4 start -->
                 <div class="col-md-6 col-xl-3">
                    <div class="card client-blocks success-border">
                        <div class="card-block">
                            <h5>Total Winners</h5>
                            <ul>
                                <li>
                                    <i class="icofont icofont-files text-success"></i>
                                </li>
                                <li class="text-right text-success">
                                    <?php if(isset($winner_counts)){
                                        echo $winner_counts;
                                    } else{
                                        echo '0';
                                    }?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
                <!-- counter-card-4 end -->
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
                    <a href="<?= base_url('admin/users');?>" class="btn btn-danger btn-lg btn-block">View All Users</a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
                    <a href="<?= base_url('admin/purchase');?>" class="btn btn-success btn-lg btn-block">View Purchased Tickets</a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
                    <a href="<?= base_url('admin/transactions');?>" class="btn btn-warning btn-lg btn-block">View Transactions</a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
                    <a href="<?= base_url('admin/winners');?>" class="btn btn-info btn-lg btn-block">View Winners</a>
                </div>
            </div>
        </div>
    </div>
</div>