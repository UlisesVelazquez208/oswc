<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <a data-toggle="modal" data-target="#add-lottery" class="btn btn-success btn-round" style="color: yellow"><i class="fa fa-plus"> Add Manage Lottery</i></a>
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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/manage-lottery');?>">Manage Lottery</a>
                    </li>
                </ul>
            </div><br/><br/>
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
            <?php } ?>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5>Manage Lottery</h5>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap" style="text-align: center;">
                                    <thead>
                                        <tr>                                      
        									<th style="text-align: center;">Lottery Name</th>
                                            <th style="text-align: center;">Start Date</th>
        									<th style="text-align: center;">End Date</th>
        									<th style="text-align: center;">Status</th>
        									<th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lotteries as $lottery): ?>
                                        <tr data-id="<?= $lottery->id; ?>" data-type="<?= $lottery->LotteryName; ?>" data-start="<?= $lottery->StartDate; ?>" data-end="<?= $lottery->EndDate; ?>" data-status="<?= $lottery->Status;?>">
                                            <td><?= $lottery->LotteryName; ?></td>
                                            <td><?= $lottery->StartDate; ?></td>
                                            <td><?= $lottery->EndDate; ?></td>
                                            <?php if($lottery->Status == 'Expired') {?>
                                                <td><label class="label label-inverse-danger"><?= $lottery->Status;?></label></td>
                                            <?php }else {?>
                                                <td><label class="label label-inverse-success"><?= $lottery->Status;?></label></td>
                                            <?php }?>
                                            
                                            <td><button id="<?=$lottery->id;?>" class="label label-inverse-info btn-edit"><i class="icofont icofont-edit-alt"> Edit</i> </button><button onclick="del(<?=$lottery->id;?>)" class="label label-inverse-danger btn-delete"><i class="icofont icofont-delete-alt"> Delete</i></button></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: center;">Lottery Name</th>
                                            <th style="text-align: center;">Start Date</th>
        									<th style="text-align: center;">End Date</th>
        									<th style="text-align: center;">Status</th>
        									<th style="text-align: center;">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- modal window -->
                    <div class="modal fade" id="add-lottery" tabindex="-1">
                        <?php $this->load->view('pages/admin/add-lottery');?>
                    </div>		
                </div>
            </div>
        </div>
    </div>
</div>
<!-- edit and delete lottery  with jquery -->
<script src="<?php echo base_url(); ?>front/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">

    $("body").on("click", ".btn-edit", function(){

        var type = $(this).parents("tr").attr('data-type');
        var startdate = $(this).parents("tr").attr('data-start');
        var enddate = $(this).parents("tr").attr('data-end');
        var status = $(this).parents("tr").attr('data-status');

        $(this).parents("tr").find("td:eq(0)").html('<input name="type" value="'+ type +'">');
        $(this).parents("tr").find("td:eq(1)").html('<input name="date_from" value="'+startdate+'">');
        $(this).parents("tr").find("td:eq(2)").html('<input name="date_to" value="' +enddate +'">');
        $(this).parents("tr").find("td:eq(3)").html('<input name="status" value="'+ status +'">');
    
        $(this).parents("tr").find("td:eq(4)").prepend("<button class='label label-inverse-success btn-update'>Update</button><button onclick='cancel()' class='label label-inverse-danger btn-cancel'>Cancel</button>");
        $(this).hide();
    });
   
    $("body").on("click", ".btn-cancel", function(){

        var type = $(this).parents("tr").attr('data-type');
        var startdate = $(this).parents("tr").attr('data-start');
        var enddate = $(this).parents("tr").attr('data-end');
        var status = $(this).parents("tr").attr('data-status');
    
        $(this).parents("tr").find("td:eq(0)").text(type);
        $(this).parents("tr").find("td:eq(1)").text(startdate);
        $(this).parents("tr").find("td:eq(2)").text(enddate);
        $(this).parents("tr").find("td:eq(3)").text(status);
   
        $(this).parents("tr").find(".btn-edit").show();
        $(this).parents("tr").find(".btn-update").remove();
        $(this).parents("tr").find(".btn-cancel").remove();
    });
   
    $("body").on("click", ".btn-update", function(){

        var id = $(this).parents("tr").attr('data-id');
        var type = $(this).parents("tr").find("input[name='type']").val();
        var startdate = $(this).parents("tr").find("input[name='date_from']").val();
        var enddate = $(this).parents("tr").find("input[name='date_to']").val();
        var status = $(this).parents("tr").find("input[name='status']").val();
    
        $(this).parents("tr").find("td:eq(0)").text(type);
        $(this).parents("tr").find("td:eq(1)").text(startdate);
        $(this).parents("tr").find("td:eq(2)").text(enddate);
        $(this).parents("tr").find("td:eq(3)").text(status);
     
        $(this).parents("tr").attr('data-type', type);
        $(this).parents("tr").attr('data-start', startdate);
        $(this).parents("tr").attr('data-end', enddate);
        $(this).parents("tr").attr('data-status', status);
    
        $(this).parents("tr").find(".btn-edit").show();
        $(this).parents("tr").find(".btn-cancel").remove();
        $(this).parents("tr").find(".btn-update").remove();

        var url = "<?= base_url('admin/manage-lottery/');?>" + id + "/edit";
        send_data = {
            type: type,
            start: startdate,
            end: enddate,
            status: status
        };
        console.log(send_data);
        $.post({
            url: url,
            data: send_data,
            error: function() {
              alert('Something is wrong');
            },
            success: function(data) {
                $(".main-body").load(url);
                console.log(data);
                alert(data);  
                // alert("Record added successfully");  
           },
        });
        alert(send_data);
        // $(".main-body").load(url, send_data, function(response, status, http){ 
        //     if(status == "success") 
        //         alert("Content loaded successfully!"); 
        //     if(status == "error") 
        //         alert("Error: " + http.status + ": " + http.statusText); 
        // }); 
    });
        function del(id){
            alert("Are you sure you want to delete it?");
            var url = "<?= base_url('Lotteries/delete/');?>" + id;
            $(".main-body").load(url);
            $(this).parents("tr").remove();
        }
    </script>