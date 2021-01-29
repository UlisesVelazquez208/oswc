<div class="main-body" style="padding-top: 50px">
	<div class="page-wrapper">
		<div class="page-header">
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
			<a href="<?= base_url('user/add-deposit');?>" class="btn btn-success btn-round">Add Fund To Wallet</a>
			<div class="page-header-breadcrumb">
				<ul class="breadcrumb-title">
					<li class="breadcrumb-item">
						<a href="index.html">
							<i class="icofont icofont-home"></i>
						</a>
					</li>
					<li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
					</li>
					<li class="breadcrumb-item"><a href="<?= base_url('user/play-lottery');?>">Play Lottery</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="page-body">
			<?php $this->load->view('pages/user/lottery-category');?>
		</div>
	</div>
</div>