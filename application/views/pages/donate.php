<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?php echo base_url(); ?>front/images/pay.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">
	<div class="container clearfix">
		<h1>Donate To Charity</h1>
	</div>

</section><!-- #page-title end -->


<!-- Contact Form & Map Overlay Section
============================================= -->
<section id="map-overlay">
	<div class="container clearfix">
		<!-- Contact Form Overlay
		============================================= -->
		<div id="contact-form-overlay" class="clearfix">
			<div class="fancy-title title-dotted-border">
				<h3>Donate to charity</h3>
			</div>
			<?php if($this->session->flashdata('error_msg')){?>
		    <div class="alert alert-danger text-center" style="max-height: 40px">
		    	<h5><?php echo $this->session->flashdata('error_msg');?></h5>
		    </div>
		   	<?php } if($this->session->flashdata('success_msg')){?>
			<div class="alert alert-success text-center" style="max-height: 40px">
		    	<h5><?php echo $this->session->flashdata('success_msg');?></h5>
		    </div>
			<?php }?>
				<!-- Contact Form
				============================================= -->
				<?php echo form_open('donate/add')?>
				<div class="col_half">
					<label for="name">Full Name <small>*</small></label>
					<input type="text" name="name" id="name" value="<?= set_value('name');?>" class="sm-form-control "/>
					<span style="color: red"><?= form_error('name');?></span>
				</div>
				<div class="col_half col_last">
					<label for="email">Email <small>*</small></label>
					<input type="email" name="email" id="email" value="<?= set_value('email');?>" class=" email sm-form-control"/>
					<span style="color: red"><?= form_error('email');?></span>
				</div>
				<div class="col_half">
					<label for="phone">Phone*</label>
					<input type="text" name="phone" id="phone" value="<?= set_value('phone');?>" class="sm-form-control"/>
					<span style="color: red"><?= form_error('phone');?></span>
				</div>
				<div class="col_half col_last">
					<label for="subject">Amount to charge(NGN) <small>*</small></label>
					<input type="number" name="amount" id="amount" value="<?= set_value('amount');?>" class=" sm-form-control" />
					<span style="color: red"><?= form_error('amount');?></span>
				</div>
				<div class="col_full center">
					<button  style="width: 30%" class="button button-3d nomargin" type="submit">Donate</button>
				</div>
				<?php echo form_close()?>
			<!-- Contact Form End
				============================================= -->
		</div><!-- Contact Form Overlay End -->
	</div>
</section><!-- Contact Form & Map Overlay Section End -->