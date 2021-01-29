<!-- Login Modal -->
<div class="modal1 mfp-show" id="modal-register">
    <div class="card divcenter" style="max-width: 540px;">
        <div class="card-header py-3 nobg center">
            <h3 class="mb-0 t400">Hello, Change Password</h3>
        </div>
        <div class="card-header py-3 nobg center">
            <h5 style="color: red"><?php echo $this->session->flashdata('error_msg');?> </h5>
            <h5 style="color: blue"><?php echo $this->session->flashdata('success_msg');?> </h5>
        </div>
        <div class="card-body divcenter py-5" style="min-width: 70%;">
            <?php echo form_open('reset');?>
            <div class="col-12">
                <input type="password" name="password" value="" class="form-control not-dark" placeholder="New Password" />
                <span style="color: red"><?= form_error('password');?></span>
            </div>

            <div class="col-12 mt-4">
                <input type="password" name="cpassword" value="" class="form-control not-dark" placeholder="Confirm Password" />
                <span style="color: red"><?= form_error('cpassword');?></span>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="button btn-block nomargin">Change Password</button>
            </div>

            <div class="col-12 mt-4" center>
                <p class="mb-0">Do you know an password? &nbsp;<a href="<?php echo base_url('login'); ?>">Sign in</a></p>
            </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>