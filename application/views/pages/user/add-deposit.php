<!-- Main-body start -->
<div class="main-body">
	<div class="page-wrapper">
		<!-- Page body start -->
		<div class="page-body">
			<div class="row">
				<div class="col-sm-12">
					<!-- JavaScript additions card start -->
					<div class="card">
						<div class="card-header">
							<nav class="nav  justify-content-between">
								<h4>Add Deposit to Wallet</h4>
								<a href="<?= base_url('user/deposits');?>" class="btn btn-success btn-sm"><i class="fa fa-reply"></i> Go Back</a>
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
						<?php } 
						if ($this->session->flashdata('warning')) { ?>
							<div class="alert alert-warning">
								<?php echo $this->session->flashdata('warning'); ?>
							</div>
						<?php } ?>
						<div class="card-body">
							<div class="wrapper wrapper-640">
								<div class="hts-flash"></div>
								<?= form_open('user/deposit/add', 'class="form-horizontal"'); ?>

								<div class="form-group">
								<label class="control-label">Payment Gateway</label>
									<select class="form-control styler" name="gateway" id="show-elements-select">
										<option value="">Select Payment Gateway...</option>
										<option value="Paystack">Paystack</option>
										<option value="Bank">Bank Deposit</option>
									</select>
									<span style="color: red"><?= form_error('gateway'); ?></span>
								</div>
								<div class="form-group">
									<label class="control-label" for="amount">Amount</label>
									<input id="numbersOnly" name="amount" class="form-control styler" type="number" maxlength="100" required="">
									<span style="color: red"><?= form_error('amount'); ?></span>
								</div>
								<div class="form-group" id="gatewayType" style="display: none;">
									<label class="control-label" for="transaction_id">Transaction ID</label>
									<input name="transaction_id" class="form-control styler" type="text" maxlength="40" placeholder="Enter Transaction Ref or Teller No.">
									<span style="color: red"><?= form_error('transaction_id'); ?></span>
									<br><p class="alert alert-info"><b>Deposit To:<br>
									Account Name: School-Me Investment Services Ltd- Project Account <br>
									Bank: GTB<br>
									Account Number: 0449957438<br>
									<br>
									Please Note: After you have made a deposit to the account details above : “SchoolMe Account Details….”,<br>
									<br>
									Please return to this page and fill the above form with the details gotten from the transaction alert you received (input the amount deposited and the transaction ID). After this is done and submitted (Save Record), the account department will review your payment and approve it. Once approved, the deposited amount will reflect in your wallet. <br>
									Thank you.</b></p>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">
									Continue </button>
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