<div class="main-body">
	<div class="page-wrapper">
		<div class="page-header">
			<?php
				if ($this->session->flashdata('notice')) { ?>
					<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="alert alert-danger background-danger">
							<?php echo $this->session->flashdata('notice'); ?>
						</div>
					</div>
				<?php }?>
			<div class="col-sm-12 col-md-12 col-xl-12">
				<div class="alert alert-warning background-warning" style="color: black">
					Welcome back <?= $this->session->userdata('name');?> Your last transaction is #<?php if(isset($transactionID)) echo $transactionID;?>
				</div>
			</div>
		</div>
		<div class="page-body">
			<div class="row">
				<div class="col-md-6 col-xl-3">
					<div class="card client-blocks warning-border" style="background-image: linear-gradient(45deg, #F23B3B 30%, #EE9025 70%)">
						<div class="card-block">
							<h5 class="text-dark">Available Balance</h5>
							<ul>
								<li>
									<i class="icofont icofont-ui-user-group text-info"></i>
								</li>
								<li class="text-right text-info" style="font-size: 20px">
									<?php if(isset($money)){
										echo "N". $money.".00";
									} else{
										echo "N0.00";
									}?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- counter-card-1 start-->
				<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
					<div class="card client-blocks dark-info-border" style="background-image: linear-gradient(45deg, #2ecc71 30%, green 70%)">
						<div class="card-block">
							<h5 class="text-dark">Purchased Tickets</h5>
							<ul>
								<li>
									<i class="icofont icofont-document-folder"></i>
								</li>
								<li class="text-right text-dark" style="font-size: 20px">
									<?php if(isset($purchases)){
										echo $purchases;
									} else{
										echo 0;
									}?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- counter-card-1 end-->
				<!-- counter-card-2 start -->
				<div class="col-md-6 col-xl-3">
					<div class="card client-blocks success-border" style="background-image: linear-gradient(45deg, #5bc0de 30%, #3498DB 70%)">
						<div class="card-block">
							<h5 class="text-dark">Number of Wins</h5>
							<ul>
								<li>
									<i class="icofont icofont-ui-user-group text-warning"></i>
								</li>
								<li class="text-right text-warning" style="font-size: 20px">
									<?php if(isset($winnings)){
										echo $winnings;
									} else{
										echo 0;
									}?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- counter-card-2 end -->
				<!-- counter-card-3 start -->
				<div class="col-md-6 col-xl-3">
					<div class="card client-blocks dark-info-border" style="background-image: linear-gradient(45deg, #f1c40f 40%, #EF9027 60%)">
						<div class="card-block">
							<h5 class="text-dark">Total Earnings</h5>
							<ul>
								<li>
									<i class="icofont icofont-files text-success"></i>
								</li>
								<li class="text-right text-success" style="font-size: 20px">
									<?php if(isset($wallet)){
										echo "N". $wallet.".00";
									} else{
										echo "N0.00";
									}?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
					<a href="<?= base_url('user/add-deposit');?>" class="btn btn-danger btn-lg btn-block">Add to Wallet</a>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
					<a href="<?= base_url('user/purchase');?>" class="btn btn-success btn-lg btn-block">View Purchased Tickets</a>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
					<a href="<?= base_url('user/winnings');?>" class="btn btn-info btn-lg btn-block">View Winnings</a>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 mb-4">
					<a href="<?= base_url('user/transactions');?>" class="btn btn-warning btn-lg btn-block">View Transactions</a>
				</div>
			</div>
			<?php $this->load->view('pages/user/lottery-category');?>
		</div>
	</div>
</div>