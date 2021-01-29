<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4>Daily House Rent Play</h4>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard');?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/house-rent');?>">Play For House Rent</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5>Daily Draw Play For House Rent</h5>
                        </div>
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
                        <?php } ?>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr>                                      
        									<th>Username</th>
                                            <th>Ticket Number</th>
        									<th>Date</th>
        									<th>Amount</th>
        									<th>Transaction ID</th>
        									<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user->TransactionBy; ?></td>
                                            <td><?= $user->TicketNumber; ?></td>
                                            <td><?= $user->Created; ?></td>
                                            <td>N<?= $user->Amount ;?></td>
                                            <td><?= $user->TransactionID ;?></td>
                                            <td><a class="btn btn-info btn-round" data-toggle="modal" data-target="#winner" id="<?= $user->id;?>" data-id="<?= $user->User_id;?>">Make Winner</a>
                                            <a class="btn btn-danger btn-round" data-toggle="modal" data-target="#loser" id="<?= $user->id;?>" data-id="<?= $user->User_id;?>">Make Loser</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Ticket Number</th>
        									<th>Date</th>
        									<th>Amount</th>
        									<th>Transaction ID</th>
        									<th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- modal window -->
                    <div class="modal fade" id="winner" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Make Winner</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                    			<h5 class="text-center">Are You Sure To Win This Ticket?</h5>
                                    <div>
                                        <label class="form-control-label">Win Amount:</label>
                                        <input type="text" name="win_amount" class="form-control" placeholder="N5,000">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="button3" class="btn btn-primary">Win</button>
                                </div>
                            </div>
                        </div>
                    </div>	
                    <div class="modal fade" id="loser" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Make Loser</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <h5 class="text-center">Are You Sure To Loss This Ticket?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="button4" class="btn btn-primary">Loss</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>
<script src="<?php echo base_url(); ?>front/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var url = '<?php echo base_url('admin/house-rent');?>';
        $('#button3').click(function() {
            event.preventDefault();
            var send_data = {
                win_amount: $('input[name="win_amount"]')[0].value,
                t_id: $('a[data-target="#winner"]').attr('id'),
                userid: $('a[data-target="#winner"]').attr('data-id'),
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'// 
            }
            // console.log(send_data);
            $.post({
                url: '<?php echo base_url('admin/house-rent/win');?>',
                data: send_data,
                error: function() {
                  // alert('Something is wrong');
                },
                success: function(data) {
                    // alert("Your request have been saved successfully");  
               },
            });
            window.location = url;
            return false;
        });

        $('#button4').click(function() {
            event.preventDefault();
            var send_data = {
                t_id: $('a[data-target="#loser"]').attr('id'),
                userid: $('a[data-target="#loser"]').attr('data-id'),
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'// 
            }
            // console.log(send_data);
            $.post({
                url: '<?php echo base_url('admin/house-rent/loss');?>',
                data: send_data,
                error: function() {
                  // alert('Something is wrong');
                },
                success: function(data) {
                    // alert("Your request have been saved successfully");  
               },
            });
            window.location = url;
            return false;
        });
    });
</script>