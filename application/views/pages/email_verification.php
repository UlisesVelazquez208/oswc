<!-- Login Modal -->
<div class="modal1 mfp-show" id="modal-register">
	<div class="card divcenter" style="max-width: 540px;">
		<div class="card-header py-3 nobg center">
			<h3 class="mb-0 t400">Complete Login Register System in PMBCLUB</h3>
		</div>
		<div class="card-body divcenter py-5" style="min-width: 80%;">
			<h5 style="color: red"><?php echo $message;?> </h5>
			<a href="<?php echo base_url(); ?>front/#" class="button button-large btn-block si-colored si-facebook nott t400 ls0 center nomargin"><i class="icon-facebook-sign"></i> Log in with Facebook</a>

			<div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span></div>
			<?php echo form_open('me');?>
			<div class="col-12">
				<input type="text" id="login-form-username" name="username" value="<?= set_value('username');?>" class="form-control not-dark" placeholder="Username" />
				<span style="color: red"><?= form_error('username');?></span>
			</div>

			<div class="col-12 mt-4">
				<input type="password" id="login-form-password" name="password" value="" class="form-control not-dark" placeholder="Password" />
				<span style="color: red"><?= form_error('password');?></span>
			</div>

			<div class="col-12" style="padding: 15px 15px">
				<a href="<?php echo base_url('forgot'); ?>" class="fright text-dark t300 mt-2"><p>Forgot Password?</p></a>
			</div>

			<div class="col-12 mt-4">
				<button type="submit" class="button btn-block nomargin">Sign in</button>
			</div>
			<?php echo form_close()?>
		</div>
		<div class="card-footer py-4 center">
			<p class="mb-0">Don't you have an account? <a href="<?php echo base_url('who'); ?>">Create Account</a></p>
		</div>
	</div>
</div>