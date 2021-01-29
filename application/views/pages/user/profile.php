<!-- Main-body start -->
<div class="main-body">
	<div class="page-wrapper">
		<!-- Page body start -->
		<div class="page-body">
			<div class="row">
				<div class="col-sm-12">
					<!-- Job application card start -->
					<div class="card">
						<div class="card-header">
							<h5 style="color: blue">Update Profile</h5>
						</div>

						<div class="card-block">
							<?php
							if ($this->session->flashdata('success_msg')) { ?>
								<div class="alert alert-success">
									<?= $this->session->flashdata('success_msg'); ?>
								</div>
							<?php }
							if ($this->session->flashdata('error_msg')) { ?>
								<div class="alert alert-danger">
									<?= $this->session->flashdata('error_msg'); ?>
								</div>
							<?php } ?>
							<div class="j-wrapper">
								<?= form_open_multipart('user/profile/update', 'class="j-pro"'); ?>
								<!-- end /.header-->
								<div class="j-content">
									
									<div class="j-row">
										<div class="j-span6 j-unit">
											<div class="j-input">
												<label class="j-icon-right" for="email">
													<i class="icofont icofont-envelope"></i>
												</label>
												<input type="email" value="<?php echo $email;?>" id="email" name="email" readonly>
											</div>
										</div>
										<div class="j-span6 j-unit">
											<div class="j-input">
												<label class="j-icon-right" for="username">
													<i class="icofont icofont-ui-user"></i>
												</label>
												<input type="text" id="username" name="username" value="<?php echo $username;?>" readonly>
											</div>
										</div>
									</div>
									<!-- start name -->
									<div class="j-row">
									    <div class="j-span6 j-unit">
											<div class="j-input">
												<label class="j-icon-right" for="name">
													<i class="icofont icofont-ui-user"></i>
												</label>
												<input type="text" id="name" name="name" value="<?php echo $name;?>">
												<?= form_error('name', '<span class="j-tooltip j-tooltip-right-top">', '</span>'); ?>
											</div>
										</div>
									<!-- end name -->
									<!-- start phone -->
									
										
										<div class="j-span6 j-unit">
											<div class="j-input">
												<label class="j-icon-right" for="phone">
													<i class="icofont icofont-phone"></i>
												</label>
												<input type="text" value="<?php echo $phone;?>" id="phone" name="phone">
												<?= form_error('phone', '<span class="j-tooltip j-tooltip-right-top">', '</span>'); ?>
											</div>
										</div>
									</div>
									<!-- end phone -->
									<div class="divider gap-bottom-25"></div>
									<!-- start country -->
									<div class="j-row">
										<div class="j-span6 j-unit">
											<label class="j-input j-select">
												<select name="gender" value="<?php echo $gender;?>">
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
												<i></i>
											</label>
										</div>
										<div class="j-span6 j-unit">
											<label class="j-input j-select">
												<select name="country" value="<?php echo $country;?>">
													<option value="Nigeria">Nigeria</option>
													<option value="Australia">Australia</option>
												</select>
												<i></i>
											</label>
										</div>
									</div>
									<!-- end country -->

									<!-- start address -->
									<div class="j-unit">
										<div class="j-input">
											<label class="j-icon-right" for="address">
												<i class="icofont icofont-building"></i>
											</label>
											<input type="text" placeholder="Address" name="address">
											<?= form_error('address', '<span class="j-tooltip j-tooltip-right-top">', '</span>'); ?>
										</div>
									</div>
									<!-- end address -->
									<!-- start message -->
									<div class="j-unit">
										<div class="j-input">
											<textarea placeholder="Additional info" spellcheck="false" name="userinfo"></textarea>
											<?= form_error('userinfo', '<span class="j-tooltip j-tooltip-right-top">', '</span>'); ?>
										</div>
									</div>
									<!-- end message -->
									<!-- start files -->
									<div class="j-unit">
										<div class="j-input j-append-small-btn">
											<div class="j-file-button">
												Browse
												<input type="file" name="picture" onchange="document.getElementById('picture').value = this.value;">
											</div>
											<input type="text" id="picture" readonly="" placeholder="Add your profile picture" name="image">
											<span class="j-hint" style="color: blue">Only: jpg / png</span>
										</div>
									</div>
									<!-- end files -->
								</div>
								<!-- end /.content -->
								<div class="j-footer">
									<button type="submit" class="btn btn-primary">Update Profile</button>
								</div>
								<!-- end /.footer -->
								<?= form_close(); ?>
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
