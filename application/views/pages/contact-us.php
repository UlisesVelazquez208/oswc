<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?php echo base_url(); ?>front/images/pay.jpg'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">
	<div class="container clearfix">
		<h1>Contact Us</h1>
	</div>
</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<!-- Postcontent
			============================================= -->
			<div class="postcontent nobottommargin">
				<h3>Send us an Email</h3>
				<h5 style="color: red"><?php echo $this->session->flashdata('error_msg');?> 
				</h5>
				<h5 style="color: blue"><?php echo $this->session->flashdata('success_msg');?> 
				</h5>
				<?php echo form_open('send-email')?>
				<div class="col_one_third">
					<label for="name">Name <small>*</small></label>
					<input type="text" name="name" value="<?= set_value('name');?>" class="sm-form-control" />
					<span style="color: red"><?= form_error('name');?></span>
				</div>
				<div class="col_one_third">
					<label for="email">Email <small>*</small></label>
					<input type="email" name="email" value="<?= set_value('email');?>" class="sm-form-control" />
					<span style="color: red"><?= form_error('email');?></span>
				</div>
				<div class="col_one_third col_last">
					<label for="title">Title</label>
					<input type="text" name="title" value="<?= set_value('title');?>" class="sm-form-control" />
					<span style="color: red"><?= form_error('title');?></span>
				</div>
				<div class="col_full">
					<label for="content">Content <small>*</small></label>
					<textarea class="sm-form-control" name="content" rows="6" cols="30" value="<?= set_value('content');?>"></textarea>
					<span style="color: red"><?= form_error('content');?></span>
				</div>
				<div class="col_full">
					<button class="button button-3d nomargin" type="submit" >Send Message</button>
				</div>
				<?php echo form_close()?>
			</div><!-- .postcontent end -->
			<!-- Sidebar
			============================================= -->
			<div class="sidebar col_last nobottommargin">
				<address>
					<strong>Headquarters:</strong><br>
					795 Folsom Ave, Suite 600<br>
					San Francisco, CA 94107<br>
				</address>
				<abbr title="Phone Number"><strong>Phone:</strong></abbr> +234-8021498565<br>
				<abbr title="Email Address"><strong>Email:</strong></abbr> info@pmbclub.com					
			</div><!-- .sidebar end -->
		</div>
	</div>
</section><!-- #content end -->