<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4 style="color: red">Post Count</h4>
            </div>
        </div>
        <!-- Page header end -->
        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- JavaScript additions card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Post count</h5>
                        </div>
                        <div class="card-block">
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
                            <?php }?>
                            <div class="wrapper wrapper-640">
                                <?= form_open('admin/counter/save', 'class="j-forms"');?>
                                    <div class="text-top text-info">
                                        <div class="divider gap-bottom-25"></div>
                                        <h3 class="text-center">Counter</h3>
                                    </div>
                                    <div class="content">
										<div class="j-unit">
                                            <div class="j-input">
                                                <input type="text" id="amount" placeholder="Enter Number" name="number" required>
                                            </div>
                                        </div>
										<div class="divider gap-bottom-25"></div>
										<div class="divider-text gap-top-45 gap-bottom-45">
                                        </div>
                                    </div>
                                    <!-- end /.content -->
                                    <div class="footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
