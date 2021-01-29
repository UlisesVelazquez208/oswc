<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body">
                    <?= form_open('admin/login', 'class="md-float-material"');?>
                        <div class="text-center">
                            <img src="<?php echo base_url(); ?>back/assets/images/auth/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-4">
                                    <h3 class="text-center txt-primary">Sign In</h3>
                                </div>
                                <div class="col-md-8">
                                    <h5 style="color: red"><?php echo $this->session->flashdata('error_msg');?> </h5>
                                </div>
                            </div>
                           
                            <p class="text-inverse b-b-default text-left p-b-5">Sign in with your regular account</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Username/Email" name="user" value="<?php set_value('user');?>">
                                <span class="md-line"></span>
                                <small><?php form_error('user');?></small>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password" name="password" value="">
                                <span class="md-line"></span>
                                <small><?php form_error('password');?></small>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-sm-6 col-xs-12">
                                    
                                </div>
                                
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                </div>
                            </div>
                        </div>
                    <?= form_close();?>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>