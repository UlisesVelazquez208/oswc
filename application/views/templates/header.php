<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" /> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/magnific-popup.css" type="text/css" />
	<!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>back/bower_components/sweetalert/dist/sweetalert.css">
	
	<!--  Pricing Tables Style  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/components/pricing-table.css" type="text/css" />

	<!--  Pricing(Timer) Style  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/pricing.css" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>front/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Document Title
	============================================= -->
	<title><?php echo $title;?></title>

</head>

<body class="stretched">
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
	
		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="dark" style="background-color: #C348A4;">
			<div class="container clearfix">
				<div class="row justify-content-between">
					<div class="col-lg-5 nobottommargin">
						<p class="nobottommargin d-flex justify-content-center justify-content-lg-start"><strong> Contact Us: &nbsp; <i class="icon-phone1"></i>1234567890 &nbsp;&nbsp;<i class="icon-envelope21"></i> &nbsp;user@example.com</strong></p>

					</div>

					<div class="col-lg-7 d-none d-lg-flex justify-content-end">


						<!-- Top Social
						============================================= -->
						<div id="top-social">
							<ul>
								<li><a href="https://www.facebook.com/schoolmelottery" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
								<li><a href="https://www.instagram.com/schoolmelottery" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
							</ul>
						</div><!-- #top-social end -->

					</div>
				</div>

			</div>

		</div>

		<!-- Header
		============================================= -->
		<header id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="<?php echo base_url('/'); ?>" class="standard-logo" data-dark-logo="images/logo.png"><img src="<?php echo base_url(); ?>front/images/logo.png" alt="Pay My Bill Logo"></a>
						<a href="<?php echo base_url('/'); ?>" class="retina-logo" data-dark-logo="images/logo@2x.png"><img src="<?php echo base_url(); ?>front/images/logo@2x.png" alt="Pay My Bill Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" >

						<ul>
							<li><a href="<?php echo base_url('/'); ?>"><div>Home</div></a>		
							</li>
							<li><a href="<?php echo base_url('about-us');?>"><div>About Us</div></a>
							</li>
							<li><a href="<?php echo base_url('how-to-play');?>"><div>How to Play</div></a>
							</li>
							<li><a href="<?php echo base_url('play-now');?>"><div>Play Now</div></a>
							</li>
							<li><a href="<?php echo base_url('donate');?>"><div>Donate</div></a>
							</li>
							<li><a href="<?php echo base_url('faqs');?>"><div>FAQs</div></a>
							</li>
							<li><a href="<?php echo base_url('contact-us');?>"><div>Contact Us</div></a>
							</li>
						</ul>
						<!-- Top Search
						============================================= -->
						<div id="top-account">
						<?php if($this->session->userdata('userId')) {?>
							<a href="<?php echo base_url(); ?>logout"><i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span class="d-none d-sm-inline-block font-primary t500">Logout</span></a>
						<?php } else{?>
							<a href="<?php echo base_url(); ?>login"><i class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span class="d-none d-sm-inline-block font-primary t500">Account</span></a>
						<?php }?>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
