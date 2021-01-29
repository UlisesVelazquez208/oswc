<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2019 All Rights Reserved by Pay My Bill Club.<br>
						<div class="copyright-links"><a href="#">Terms of Service</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="https://www.facebook.com/schoolmelottery" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="https://www.twitter.com/schoolmelottery" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>
						</div>

						<div class="clear"></div>
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->
	</div>
	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?php echo base_url(); ?>front/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>front/js/plugins.js"></script>
	<!-- CountDown Timer JavaScripts
	============================================= -->
	<script src="<?php echo base_url(); ?>front/js/jquery.countdown.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url(); ?>front/js/functions.js"></script>

	<!-- PayStack Scripts For Donate
	============================================= -->
	<!-- <script type="text/javascript">
	$(document).ready(function(){	
	$('#button').click(function() {
		event.preventDefault();
		var send_data = {
			name: $('#name').val(),
			email: $('#email').val(),
			phone: $('#phone').val(),
			amount: $('#amount').val(),
			ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
		}
		
		$.post({
			url: '<?php echo base_url('paystack');?>',
			data: send_data,
		  	error: function() {
              alert('Something is wrong');
           	},
           	success: function(data) {
		    	console.log(data);
                alert(data);  
                // alert("Record added successfully");  
           },
           
		});
	    	// $(‘#name).load(window.location + 'fgdfg');
	});
	});
</script> -->
</body>
</html>