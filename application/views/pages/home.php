<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">
	<div class="slider-parallax-inner">
		<div class="swiper-container swiper-parent">
		<div class="swiper-wrapper">
			<div class="swiper-slide" style="background-image: url('<?php echo base_url(); ?>front/images/slide1.jpg'); background-position: center top; background-size: 100% 100%;">
			</div>
			<div class="swiper-slide" style="background-image: url('<?php echo base_url(); ?>front/images/slide2.jpg'); background-position: center bottom; background-size: 100% 100%;">
			</div>
			<div class="swiper-slide" style="background-image: url('<?php echo base_url(); ?>front/images/slide3.jpg'); background-position: center bottom; background-size: 100% 100%;">
			</div>
			<div class="swiper-slide" style="background-image: url('<?php echo base_url(); ?>front/images/slide4.jpg'); background-position: center bottom; background-size: 100% 100%;">
			</div>
		</div>
		<div class="slider-arrow-left" onclick="plusSlides(-1)"><i class="icon-angle-left"></i></div>
		<div class="slider-arrow-right" onclick="plusSlides(1)"><i class="icon-angle-right"></i></div>
		<script>
			var myIndex = 0;
			autocarousel(myIndex);

			function plusSlides(n) {
			  	custom(myIndex += n);
			}

			function currentSlide(n) {
			  	custom(myIndex = n);
			}

			function custom(n) {
				var i;
				var x = document.getElementsByClassName("swiper-slide");
				for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
				}
				if (myIndex > x.length) {myIndex = 1}  
				if (n < 1) {myIndex = x.length}  
				x[myIndex-1].style.display = "block"; 
			}

			function autocarousel() {
				clearTimeout(timer);
				myIndex++;
				var i;
				var x = document.getElementsByClassName("swiper-slide");
				for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";  
				}
				if (myIndex > x.length) {myIndex = 1}  
				x[myIndex-1].style.display = "block"; 
				var timer = setTimeout(autocarousel, 3000); // Change image every 3 seconds
			}
		</script>
	</div>

	</div>

</section>

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">
	   	<div class="section header-stick">
	     	<div class="container clearfix">
		   		<div class="promo promo-border bottommargin-lg promo-full">
					<div class="container clearfix">
						<h3>Our Mission</h3>
						<span>Pay my bills club is not a get rich site, its not a ponzi scheme neither  is it a lottery or betting platform.<br> Its a social networking platform created to reduce or if possible  eradicate poverty in our society.</span>
						<span>Its ideology is far diffrent from other game site as its main objective is to reduce the level of abject poverty in our society. 
						<br>Onlike other game site, Pmbclub.com is out to pay the bills of  daily lucky winners. </span>
						<a href="<?php echo base_url('about-us');?>" class="button button-xlarge button-rounded">Read More</a>
					</div>
				</div>
	   		</div>
	  	</div>
		<div class="section parallax dark" style="background-image: url('<?php echo base_url(); ?>front/images/winners.png');">
			<div class="container clearfix">
				<h2 class="pricing-section--title center">Latest Winners</h2>
				<ul class="testimonials-grid grid-3 clearfix">
					<li>
						<div class="testimonial">
							<div class="testi-content">
							    <div class="title-block">
									<h3>Play For School Fees</h3>
									<span>PIN 345678650</span>
									<span>Won ₦30,000</span>
								</div>
								<div class="testi-meta">
									Date: 13-05-2019
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="testimonial">
							<div class="testi-content">
							    <div class="title-block">
									<h3>Play For School Fees</h3>
									<span>PIN 345678650</span>
									<span>Won ₦30,000</span>
								</div>
								<div class="testi-meta">
									Date: 13-05-2019
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="testimonial">
							<div class="testi-content">
							    <div class="title-block">
									<h3>Play For School Fees</h3>
									<span>PIN 345678650</span>
									<span>Won ₦30,000</span>
								</div>
								<div class="testi-meta">
									Date: 13-05-2019
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="testimonial">
							<div class="testi-content">
							    <div class="title-block">
									<h3>Play For School Fees</h3>
									<span>PIN 345678650</span>
									<span>Won ₦30,000</span>
								</div>
								<div class="testi-meta">
									Date: 13-05-2019
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="testimonial">
							<div class="testi-content">
							    <div class="title-block">
									<h3>Play For School Fees</h3>
									<span>PIN 345678650</span>
									<span>Won ₦30,000</span>
								</div>
								<div class="testi-meta">
									Date: 13-05-2019
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="testimonial">
							<div class="testi-content">
							    <div class="title-block">
									<h3>Play For School Fees</h3>
									<span>PIN 345678650</span>
									<span>Won ₦30,000</span>
								</div>
								<div class="testi-meta">
									Date: 13-05-2019
								</div>
							</div>
						</div>
					</li>
				</ul>
				<div class="center">
					<a href="<?php echo base_url('winners');?>" class="button button-rounded button-reveal button-large button-white button-light tright"><i class="icon-line-arrow-right"></i><span>View all Winners</span></a>	
				</div>
			</div>
		</div>	
		<!-- Play Categories
		============================================= -->	
		<?php $this->load->view('pages/play-categories');?>
		<!-- Play Categories End
		============================================= -->
		<!-- Count Down Timer
		============================================= -->
		<div class="section parallax dark" style="background: #448AFF;">
			<div class="container text-center">
				<div class="card text-center" style="background-image: url('<?php echo base_url(); ?>front/images/pattern3.png'); opacity: 0.8">
					<h2 class="card-header" style="color: black; font-weight: bold;">
						Countdown To Next Draw
					</h2>
					<div class="card-body text-center" style="padding: 0;">
						<div id="countdownToMidnight" class="text-center" style="margin:2em; color: red">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Count Down Timer End
		============================================= -->
		<div class="section parallax dark" style="background-image: url('<?php echo base_url(); ?>front/images/bg-donate.jpg'); padding: 100px 0;">
			<div class="center">
			<a href="<?php echo base_url('donate');?>" data-animate="tada" class="button button-3d button-teal button-xlarge nobottommargin tada animated"><i class="icon-off"></i>Donate to Charity</a> 
			</div>
		</div>
		<div class="container clearfix">
		
			<div class="fancy-title title-center title-dotted-border">
				<h3>Play For Holiday Packages</h3>
			</div>

			<div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-lg="4" data-items-xl="5">
				<?php for($i = 1; $i < 6; $i++){?>

				<div class="oc-item">
					<a href="#"><img src="<?php echo base_url('front/images/packages/demo').$i.'.jpg'; ?>" alt="<?php echo 'Image'. ''. $i;?>"></a>
				</div>
				<?php }?>
			</div>
			 
			<div class="center">
				<a href="<?php echo base_url('login');?>" class="button button-circle">Play Now</a>
			</div>
			  
			<div class="clear"></div>
		</div>
		<div class="container clearfix">
		
			<div class="fancy-title title-center title-dotted-border">
				<h3>Play For Other Items</h3>
			</div>

			<div class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-lg="4" data-items-xl="5">

			<?php for($i = 1; $i < 5; $i++){?>
				<?php for($j = 1; $j < 3; $j++){?>
				<div class="oc-item">
					<a href="#"><img src="<?php echo base_url('front/images/packages/') . $j. '.jpg';?>" alt="<?php echo 'Image'. ''. $i;?>"></a>
				</div>
			<?php }}?>
			</div>
			 
			 <div class="center">
				<a href="<?php echo base_url('login');?>" class="button button-circle">Play Now</a>
			  </div>
			<div class="clear"></div>
		</div>
		<!-- Testimonials
		============================================= -->	
		<?php $this->load->view('pages/testimonials');?>
		<!-- Testimonials End
		============================================= -->
	</div>

</section><!-- #content end -->
<script>

	ShowTimes();
    function ShowTimes() {
        var now = new Date();
        var hrs = 23 - now.getHours();
        var mins = 55 - now.getMinutes();
        var secs = 59 - now.getSeconds();
        var str = '';
        str +='<span class="timer">0 </span> days '
            + '<span class="timer">'+hrs+' </span> hours '
            + '<span class="timer">'+mins+' </span> mins '
            + '<span class="timer">'+secs+' </span> secs ';
        document.getElementById('countdownToMidnight').innerHTML = str;
        setTimeout(ShowTimes, 500);
    }
</script>