<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>Update Password</h4>
            </div>
        </div>
        <!-- Page header end -->
        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Job application card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Your Password</h5>
                        </div>
                        <div class="card-block">
                            <div class="j-wrapper j-wrapper-640">
                                <form action="<?php echo base_url('admin/update-password')?>" method="post" class="j-pro" id="j-pro" novalidate>
                                    <!-- end /.header -->
                                    <div class="j-content">
                                        <!-- start login -->
                                        <div class="j-unit">
                                            <div class="j-input">
                                                <label class="j-icon-right" for="password">
                                                    <i class="icofont icofont-lock"></i>
                                                </label>
                                                <input type="password" name="old_pass" placeholder="your old password...">
                                            </div>
                                        </div>
                                        <!-- end login -->
                                        <!-- start password -->
                                        <div class="j-unit">
                                            <div class="j-input">
                                                <label class="j-icon-right" for="password">
                                                    <i class="icofont icofont-lock"></i>
                                                </label>
                                                <input type="password" name="new_pass" placeholder="your new password...">
                                            </div>
                                        </div>
                                        <div class="j-unit">
                                            <div class="j-input">
                                                <label class="j-icon-right" for="password">
                                                    <i class="icofont icofont-lock"></i>
                                                </label>
                                                <input type="password" name="confirm_pass" placeholder="your confirm password...">
                                            </div>
                                        </div>
                                        <!-- start response from server -->
                                        <div class="j-response"></div>
                                        <!-- end response from server -->
                                    </div>
                                    <!-- end /.content -->
                                    <div class="j-footer">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                    <!-- end /.footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Job application card end -->
                </div>
            </div>
        </div>
        <!-- Page body end -->
    </div>
</div>
