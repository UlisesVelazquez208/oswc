<div class="section nobottommargin">         
	<div class="container clearfix">
		<div class="heading-block center">
			<h3>Testimionials</h3>
		</div>
		<div class="fslider testimonial testimonial-full bottommargin" data-animation="fade" data-arrows="false">
			<div class="flexslider">
				<div class="slider-wrap">
					<?php foreach ($testimonials as $testimonial) {?>
					<div class="slide">
						<div class="testi-image">
							<?php if($testimonial->Picture){?>
							<a href="#"><img src="<?php echo base_url('front/uploads/images/'.$testimonial->Picture);?>" alt="Customer Testimonails"></a>
							<?php } else{?>
							<a href="#"><img src="<?php echo base_url('back/assets/images/user.png');?>" alt="Customer Testimonails"></a>
							<?php }?>
						</div>
						<div class="testi-content">
							<h6><?= $testimonial->Title;?></h6>
							<p><?= $testimonial->Message;?></p>
							<div class="testi-meta">
								<?= $testimonial->Name;?>
								<!-- <span>Apple Inc.</span> -->
							</div>
						</div>
					</div>
					<?php }?>
					<div class="slide">
						<div class="testi-image">
							<a href="#"><img src="<?php echo base_url('front/images/testimonials/2.jpg');?>" alt="Customer Testimonails"></a>
						</div>
						<div class="testi-content">
							<p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
							<div class="testi-meta">
								Collis Ta'eed
								<span>Envato Inc.</span>
							</div>
						</div>
					</div>
					<div class="slide">
						<div class="testi-image">
							<a href="#"><img src="<?php echo base_url('front/images/testimonials/1.jpg');?>" alt="Customer Testimonails"></a>
						</div>
						<div class="testi-content">
							<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
							<div class="testi-meta">
								John Doe
								<span>XYZ Inc.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>