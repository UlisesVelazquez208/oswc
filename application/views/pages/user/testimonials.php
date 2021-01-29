<div class="main-body">
	<div class="page-wrapper">
        <div class="page-header">
            <a href="<?= base_url('user/add-testimonial');?>" class="btn btn-success btn-round">
            <i class="fa fa-plus"></i>Send Testimonial</a>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('user');?>">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user/testimonials');?>">Testimonials</a>
                </ul>
            </div>
        </div>
        <div class="page-body">
        	<div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">Testimonials</h5>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <form method="get" name="form1" class="form-horizontal" tabindex="1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group m-b">
                                                    <span class="input-group-addon "><i class="fa fa-calendar fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control form-control-success" name="date1">
                                                    <input type="text" class="form-control form-control-success" name="date2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="padding-left:0;">
                                        <button type="submit" class="btn btn-info" name="search">View</button>
                                        </div>
                                    </div>
                                </form>
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr class="text-info">
                                            <th>Ticket Number</th>
                                            <th>Title</th>
                                            <th>UserName</th>
                                            <th>Status</th>
        									<th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user->TicketNumber; ?></td>
                                            <td><?= $user->Title ;?></td>
                                            <td><?= $user->UserName; ?></td>
                                            <?php if($user->Status === 'Completed'){?>
                                            <td><label class="label label-inverse-success"><?= $user->Status ;?></label>
                                            </td>
                                            <?php } else{?>
                                                <td><label class="label label-inverse-warning"><?= $user->Status ;?></label>
                                                </td>
                                            <?php }?>

                                            <td><?= $user->Date ;?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Ticket Number</th>
                                            <th>Title</th>
                                            <th>UserName</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>