<div class="row">
	<!-- Monthly Growth Chart start-->
	<div class="col-xl-12">
		<div class="card">
			<div class="card-header">
				<h5 style="color: blue">Lottery Categories</h5>
			</div>
			<div class="row">
				<div class="col-md-6 col-xl-4">
					<div class="card-block">
						<div class="card borderless-card">
							<div class="card-block-big bg-info quick-note-card text-center" id="school">
								<div class="card-header">
									<h5 class="text-white school">Play For School Fees</h5>
								</div>								
								<h5 class="sub-title text-warning">Select Game Type</h5>
								<select name="school" class="form-control form-control-success text-dark">
									<option value="">Please Select Game Type</option>
									<option value="50:2000">Play with N50: WIN N2,000</option>
									<option value="100:5000">Play with N100: WIN N5,000</option>
									<option value="200:10000">Play with N200: WIN N10,000</option>
									<option value="300:20000">Play with N300: WIN N20,000</option>
									<option value="500:50000">Play with N500: WIN N50,000</option>
									<option value="1000:100000">Play with N1000: WIN N100,000</option>
								</select>
								<div class="m-t-30 text-center">
									<button class="btn btn-danger btn-square md-trigger" id="play-school" data-modal="buyticket">Play Game</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card-block">
						<div class="card borderless-card">
							<div class="card-block-big bg-info quick-note-card text-center" id="house">
								<div class="card-header">
									<h5 class="text-white house">Play For House Rent</h5>
								</div>
								<h5 class="sub-title text-warning">Select Game Type</h5>
								<select name="house" class="form-control form-control-success" id="house">
									<option value="">Please Select Game Type</option>
									<option value="50:20000">Play with N50: WIN N20,000</option>
									<option value="100:50000">Play with N100: WIN N50,000</option>
									<option value="200:100000">Play with N200: WIN N100,000</option>
									<option value="300:150000">Play with N300: WIN N150,000</option>
									<option value="400:200000">Play with N400: WIN N200,000</option>
									<option value="500:250000">Play with N500: WIN N250,000</option>
									<option value="700:300000">Play with N700: WIN N300,000</option>
									<option value="1000:500000">Play with N1000: WIN N500,000</option>
								</select>
								<div class="m-t-30 text-center">
									<button  id="play-house" class="btn btn-danger btn-square md-trigger" data-modal="buyticket">Play Game</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card-block">
						<div class="card borderless-card">
							<div class="card-block-big bg-info quick-note-card text-center" id="business">
								<div class="card-header">
									<h5 class="text-white business">Play For Business Funding</h5>
								</div>								
								<h5 class="sub-title text-warning">Select Game Type</h5>
								<select name="business" class="form-control form-control-success" id="business">
									<option value="">Please Select Game Type</option>
									<option value="100:50000">Play with N100: WIN N50,000</option>
									<option value="200:100000">Play with N200: WIN N100,000</option>
									<option value="300:200000">Play with N300: WIN N200,000</option>
									<option value="500:300000">Play with N500: WIN N300,000</option>
									<option value="1000:500000">Play with N1000: WIN N500,000</option>
								</select>
								<div class="m-t-30 text-center">
									<button  id="play-business" class="btn btn-danger btn-square md-trigger" data-modal="buyticket">Play Game</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!------animated modal window---->
			<?php form_open();?>
				<input type="hidden" name="win_amount" value="5">
				<div class="md-modal md-effect-8" id="buyticket">
					<div class="md-content" style="max-width: 480px">
						<h3 id="where"></h3>
						<div class="card">
							<div class="card-header">
							<h4 id="amount"></h4>
							<h5 id="winning"></h5>
							<p>Please note, by clicking PLAY NOW an unrefundable N<b id="ticket"></b> would be deducted from your wallet. Check Form Again... </p>
							</div>
							<div class="form-group">
								<select name="wallet" class="form-control form-control-success" required style="font-size: 16px;">
									<option value="">Select Wallet</option>
									<option value="<?= $money;?>" class="text-warning">AVAILABLE BALANCE (<?php if(isset($money)){
										echo "N". $money.".00";
									} else{
										echo "N0.00";
									}?>)</option>
								</select>
							</div>
							<div class="col-md-6"><button id="button" class="btn btn-info">Buy Ticket</button></div>
							<button type="button" class="btn btn-danger waves-effect md-close" style="margin-left: 300px; margin-top: -37px">Close</button>
						</div>
					</div>
				</div>
			<?php form_close();?>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>front/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    	var category, val, winning, ticket;
    	var url = '<?php echo base_url('user/lottery/play');?>';
    	$('#button').click(function() {
			event.preventDefault();
			var send_data = {
				amount: $('#ticket').text(),
				wallet: $('select[name="wallet"]').val(),
				ticket_num: 'PMB-' + Math.floor((Math.random() * 10000000) + 1),
				gametype: $('#where').text(),
				win_amount: $('#winning').text().substr(5),
				'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'// 
			}
			$.post({
				url: '<?php echo base_url('user/lottery/store');?>',
				data: send_data,
			  	error: function() {
	              // alert('Something is wrong');
	           	},
	           	success: function(data) {
	                // alert("Your request saved successfully");  
	           },
			});
			window.location = url;
			return false;
		});

    	$('#play-school').on('click',function(){

    		event.preventDefault();
	    	if($("select[name='school']").val() == null){
	    		category = "Please select Game Type!";
	    	} else{
        		category = $('.text-white.school').text();
	    	}
	    	$('#school').on('change',function(){
        		val = $("select[name='school']").val().split(':');
        		winning = val[1];
        		ticket = val[0];
    			document.getElementById("where").innerHTML = category;
    			document.getElementById("amount").innerHTML = "Play with N" + ticket;
    			document.getElementById("winning").innerHTML = "WIN N" + winning;
    			document.getElementById("ticket").innerHTML = ticket;
    		});
	    });
    
	    $('#play-house').on('click',function(){

	    	event.preventDefault();
	    	if($("select[name='house']").val() == null){
	    		category = "Please select Game Type!";
	    	} else{
				category = $('.text-white.house').text();
	    	}
	    	$('#house').on('change',function(){
    			val = $("select[name='house']").val().split(':');
        		winning = val[1];
        		ticket = val[0];
    			document.getElementById("where").innerHTML = category;
    			document.getElementById("amount").innerHTML = "Play with N" + ticket;
    			document.getElementById("winning").innerHTML = "WIN N" + winning;
    			document.getElementById("ticket").innerHTML = ticket;
    		});
	    });

	    $('#play-business').on('click',function(){

	    	event.preventDefault();
	    	if($("select[name='business']").val() == null){
	    		category = "Please select Game Type!";
	    	} else{
	    		category = $('.text-white.business').text();
	    	}
	    	$('#business').on('change',function(){
    			val = $("select[name='business']").val().split(':');
        		winning = val[1];
        		ticket = val[0];
    			document.getElementById("where").innerHTML = category;
    			document.getElementById("amount").innerHTML = "Play with N" + ticket;
    			document.getElementById("winning").innerHTML = "WIN N" + winning;
    			document.getElementById("ticket").innerHTML = ticket;
    		});
	    });
    });
</script>
