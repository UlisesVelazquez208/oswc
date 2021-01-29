<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <div class="alert alert-warning">
                    <h4>Account Information.</h4> Please note after submission, you won't be able to make changes to your account.
                </div>
            </div>
        </div>
        <!-- Page header end -->
        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-10">
                    <!-- JavaScript additions card start -->
                    <div class="card">
                        <div class="card-header">
                            <nav class="nav  justify-content-between">
                                <h4>Add Account Information</h4>
                                <a href="<?= base_url('user/payment-profile');?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> Go Back</a>
                            </nav>
                        </div>
                        <div class="card-block">
                            <div class="wrapper wrapper-640">
                                <?php
                        if ($this->session->flashdata('success_msg')) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success_msg'); ?>
                            </div>
                            <?php } ?>
                            <?php
                            if ($this->session->flashdata('error_msg')) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error_msg'); ?>
                                </div>
                            <?php } 
                            if ($this->session->flashdata('warning')) { ?>
                                <div class="alert alert-warning">
                                    <?php echo $this->session->flashdata('warning'); ?>
                                </div>
                            <?php } ?>
                                <?= form_open('user/payment-profile/save', 'class="j-forms"');?>
                                <input type="hidden" name="user_id" value="<?= $this->session->userdata('userid');?>">
                                <!-- <input id="gatewayId" name="gatewayId" type="text" style="display: none">
                                <input id="paymentCode" name="paymentCode" type="text" style="display: none"> -->
                                    <!-- end /.header-->
                                    <div class="content" style="background-image: linear-gradient(45deg, white 30%, white 70%)">
                                        
                                       <div class="unit" id="field">
                                            <div class="input">
                                                <input name="bank_name" type="text" placeholder="Bank Name">
                                            </div>
                                        </div>
										 <div class="unit" id="field">
                                            <div class="input">
                                                <input name="acc_name" type="text" placeholder="Account Name">
                                            </div>
                                        </div>
										<div class="unit" id="field">
                                            <div class="input">
                                                <input name="acc_number" type="text" placeholder="Account Number">
                                            </div>
                                        </div>
										<div class="divider-text gap-top-45 gap-bottom-45">
                                        </div>
                                    </div>
                                    <!-- end /.content -->
                                    <div class="footer" style="background-image: linear-gradient(60deg, blue 10%, yellow 90%)">
                                        <button type="submit" class="btn btn-primary">Save Record</button>
                                    </div>
                                    <!-- end /.footer -->
                                <?= form_close();?>
                            </div>
                        </div>
                    </div>
                    <!-- JavaScript additions card start -->
                </div>
            </div>
        </div>
        <!-- Page body start -->
    </div>
</div>
    