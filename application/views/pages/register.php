<!-- Register Modal
============================================= -->
<div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 600px;">
	<div class="tab-container">
		<!-- <div class="tab-content clearfix" id="tab-register"> -->
			<div class="card nobottommargin">
				<div class="card-header py-3 nobg center">
					<h3>Register for an Account</h3>
				<?php
				if($this->session->flashdata('success_msg')){?>
		    	<div class="alert alert-success backgroud success">
					<?php echo $this->session->flashdata('success_msg'); ?>
				</div>
				<?php }
				if($this->session->flashdata('error_msg')){?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('error_msg'); ?>
				</div>
				<?php }?>
				</div>
				<div class="card-body" style="padding: 20px;">
					<?php echo form_open('register');?>
					<div>
						<div class="col_half">
							<label for="register-form-name">Name:</label>
							<input type="text" id="register-form-name" name="name" value="<?= set_value('name');?>" class="form-control" />
							<span style="color: red"><?= form_error('name');?></span>
						</div>
						<div class="col_half col_last">
							<label for="register-form-email">Email Address:</label>
							<input type="email" id="register-form-email" name="email" value="<?= set_value('email');?>" class="form-control" />
							<span style="color: red"><?= form_error('email');?></span>
						</div>
					</div>
					<div>
						<div class="col_half">
							<label for="register-form-username">Choose a Username:</label>
							<input type="text" id="register-form-username" name="username" value="" class="form-control" />
							<span style="color: red"><?= form_error('username');?></span>
						</div>
						<div class="col_half col_last">
							<label for="register-form-phone">Phone:</label>
							<input type="number" id="register-form-phone" name="phone" value="<?= set_value('phone');?>" class="form-control" />
							<span style="color: red"><?= form_error('phone');?></span>
						</div>
					</div>
					<div>
						<div class="col_half">
							<label for="template-contactform-service">Gender</label>
							<select name="gender" class="sm-form-control">
								<option value="">-- Select One --</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="col_half col_last">
							<label for="template-contactform-service">State</label>
							<select name="state" class="sm-form-control">
								<option value="">-- Select One --</option>
								<option>ABUJA FCT</option>
								<option>ABIA</option>
								<option>ADAMAWA</option>
								<option>AKWA IBOM</option>
								<option>ANAMBRA</option>
								<option>BAUCHI</option>
								<option>BAYELSA</option>
								<option>BENUE</option>
								<option>BORNO</option>
								<option>CROSS RIVER</option>
								<option>DELTA</option>
								<option>EBONYI</option>
								<option>EDO</option>
								<option>EKITI</option>
								<option>ENUGU</option>
								<option>GOMBE</option>
								<option>IMO</option>
								<option>JIGAWA</option>
								<option>KADUNA</option>
								<option>KANO</option>
								<option>KATSINA</option>
								<option>KEBBI</option>
								<option>KOGI</option>
								<option>KWARA</option>
								<option>LAGOS</option>
								<option>NASSARAWA</option>
								<option>NIGER</option>
								<option>OGUN</option>
								<option>ONDO</option>
								<option>OSUN</option>
								<option>OYO</option>
								<option>PLATEAU</option>
								<option>RIVERS</option>
								<option>SOKOTO</option>
								<option>TARABA</option>
								<option>YOBE</option>
								<option>ZAMFARA</option>
							</select>
						</div>
					</div>
					<div>
						<div class="col_half">
							<label for="register-form-password">Choose Password:</label>
							<input type="password" id="register-form-password" name="password" value="" class="form-control" />
							<span style="color: red"><?= form_error('password');?></span>
						</div>
						<div class="col_half col_last">
							<label for="register-form-repassword">Confirm Password:</label>
							<input type="password" id="register-form-repassword" name="repassword" value="" class="form-control" />
							<span style="color: red"><?= form_error('repassword');?></span>
						</div>
					</div>
					<div class="col_full nobottommargin">
						<button class="button button-3d button-black nomargin" type="submit">Register Now</button>
					</div>
					<?php echo form_close()?>
				</div>
				<div class="card-footer py-4 center">
					<p class="mb-0">Do you have an account? <a href="<?php echo base_url('login'); ?>">Sign in</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
