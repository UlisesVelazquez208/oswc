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
							<?php }?>
							<div class="j-wrapper j-wrapper-640">
								<?= form_open('user/update', 'class="j-pro"', 'id="j-pro"'); ?>
									<!-- end /.header -->
									<div class="j-content">
										<!-- start login -->
										<div class="j-unit">
											<div class="j-input">
												<label class="j-icon-right" for="password">
													<i class="icofont icofont-lock"></i>
												</label>
												<input type="password" name="old_pass" placeholder="your old password...">
												<span style="color: red"><?= form_error('old_pass'); ?></span>
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
												<span style="color: red"><?= form_error('new_pass'); ?></span>
											</div>
										</div>
										<div class="j-unit">
											<div class="j-input">
												<label class="j-icon-right" for="password">
													<i class="icofont icofont-lock"></i>
												</label>
												<input type="password" name="confirm_pass" placeholder="your confirm password...">
												<span style="color: red"><?= form_error('confirm_pass'); ?></span>
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
								<?= form_close();?>
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
