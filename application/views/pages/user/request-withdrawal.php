<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- JavaScript additions card start -->
                    <div class="card">
                        <div class="card-header">
                            <nav class="nav  justify-content-between">
                                <h4>Request Withdrawal</h4>
                                <a href="<?= base_url('user/withdrawals');?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> Go Back</a>
                            </nav>
                        </div>
                        <?php
                        if ($this->session->flashdata('success_msg')) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success_msg'); ?>
                            </div>
                        <?php } 
                        if ($this->session->flashdata('error_msg')) { ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error_msg'); ?>
                            </div>
                        <?php } 
                        if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                                <?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } 
                        if ($this->session->flashdata('notice_msg')) { ?>
                            <div class="alert alert-warning">
                                <?php echo $this->session->flashdata('notice_msg'); ?>
                            </div>
                        <?php }?>
                        <div class="card-body">
                            <!-- <div class="wrapper wrapper-640"> -->
                            <?= form_open('user/withdrawal/add', 'class="form-horizontal"'); ?>
                            <div class="row">
                                <div class="col-lg-4 col-lg-4 col-md-4 col-sm-12 mb-4" style="padding-top: 60px; padding-left: 40px;">
                                    <div class="card client-blocks dark-primary-border">
                                        <div class="card-block" style="border-radius: 20 20; background-color: rgb(146, 206, 255);">
                                            <h5>Available Balance</h5>
                                            <ul>
                                                <li>
                                                    <i class="icofont icofont-bill-alt"></i>
                                                </li>
                                                <li class="text-left">
                                                    N30,000.00
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-lg-8 col-md-8 col-sm-12 mb-4" style="max-width: 600px">
                                    <div class="card-block" style="padding-top: 100px">
                                        <div class="form-group">
                                            <label class="control-label">Select Payment Method</label>
                                            <select class="form-control styler" name="method" id="withdrawal" required>
                                                <option value="Paystack">Paystack</option>
                                                <option value="Bank">Bank</option>
                                            </select>
                                            <span style="color: red"><?= form_error('method'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="amount">Amount</label>
                                            <input id="numbersOnly" name="amount" class="form-control styler" type="number" maxlength="100" placeholder="Enter amount to withdraw" required>
                                            <span style="color: red"><?= form_error('amount'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="message">Withdrawal Purpose</label>
                                            <textarea minlength="40" id="message" name="message" class="form-control styler" rows="5" required></textarea>
                                            <span style="color: red"><?= form_error('message'); ?></span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info"><i class="fa fa-send"></i>Request</button>
                                            <a href="<?= base_url('user/add-testimonial');?>" class="btn btn-success" style="margin-right: 250px"><i class="fa fa-plus"></i>testimonial</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <!-- JavaScript additions card start -->
                </div>
            </div>
        </div>
        <!-- Page body start -->
    </div>
</div>