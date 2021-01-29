<!-- Main-body start -->
<div class="main-body" style="padding-top: 50px">
	<div class="page-wrapper">
		<!-- Page body start -->
		<div class="page-body">
			<div class="row">
				<div class="col-sm-12">
					<!-- JavaScript additions card start -->
					<div class="card">
						<div class="card-header">
							<nav class="nav  justify-content-between">
								<h4>Send Testimonial</h4>
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
						<?php }?>
						<div class="card-block">
							<div class="wrapper wrapper-640">
								<div class="hts-flash"></div>
								<?= form_open('user/testimonial/add', 'class="form-horizontal"'); ?>

								<div class="form-group">
									<label class="control-label" for="ticket_num">Ticket No</label>
									<input name="ticket_num" class="form-control styler" type="text" maxlength="50"  placeholder="Enter the number of the ticket you won." required>
								</div>
								<div class="form-group">
									<label class="control-label" for="title">Title</label>
									<input name="title" class="form-control styler" type="text" maxlength="60" placeholder="Title of your testimonial." required>
								</div>
								<div class="form-group">
									<label for="message">Share Testimonial</label>
									<textarea class="form-control styler" id="message" name="message" rows="7" minlength="80" required=""></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-info">
									Send </button>
								</div>
								<?= form_close(); ?>
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