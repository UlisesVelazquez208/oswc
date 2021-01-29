<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">My Commissions</h5>
                            <div class="page-header-breadcrumb">
	                <ul class="breadcrumb-title">
	                    <li class="breadcrumb-item">
	                        <a href="<?= base_url('user');?>">
	                            <i class="icofont icofont-home"></i>
	                        </a>
	                    </li>
	                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
	                    </li>
	                    <li class="breadcrumb-item"><a href="<?= base_url('user/commissions');?>">Commssions</a>
	                    </li>
	                </ul>
	            </div>
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
								<div class="row">
									<div class="col-sm-12">
										<table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
		                                    <thead>
		                                        <tr class="text-info">
		                                            <th>Transaction ID</th>
													<th>Gateway</th>
													<th>Amount</th>
													<th>Status</th>
													<th>Game Type</th>
													<th>Transaction By</th>
													<th>Created</th>
													<th>Actions</th>
		                                        </tr>
		                                    </thead>
		                                    <tbody>
		                                        <?php foreach ($commissions as $commission): ?>
		                                        <tr>
		                                            <td><?= $commission->TransactionID; ?></td>
		                                            <td><?= $commission->Gateway; ?></td>
		                                            <td>N<?= $commission->Amount; ?>.00</td>
		                                            <td>
		                                            	<label class="label label-inverse-success"><?= $commission->Status ;?>
		                                            	</label>
		                                            </td>
		                                            <td><?= $commission->TransactionBy ;?></td>
		                                            <td><?= $commission->Created ;?></td>
		                                        </tr>
		                                        <?php endforeach; ?>
		                                    </tbody>
		                                    <tfoot>
		                                        <tr>
		                                            <th>Transaction ID</th>
													<th>Gateway</th>
													<th>Amount</th>
													<th>Status</th>
													<th>Game Type</th>
													<th>Transaction By</th>
													<th>Created</th>
													<th>Actions</th>
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
    </div>
</div>