<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4 style="color: red">Withdrawals</h4>
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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/withdrawal-requests');?>">Withdrawals</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5>All Withdrawal Requests</h5>
                        </div>
                        <?php $this->load->view('pages/user/with_table');?>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Gateway</th>
                                            <th>Amount</th>
                                            <th>Status</th>
        									<th>Username</th>
        									<th>Created</th>
        									<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1554988226</td>
                                            <td>Bank Transfer</td>
                                            <td>N10000.00</td>
                                            <td><label class="label label-inverse-success">Withdrawal</label></td>
        									<td>username</td>
        									<td>12-04-2019</td>
        									<td><a class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve Request"><i class="fa fa-check"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>1554988246</td>
                                            <td>Paystack</td>
                                            <td>N10000.00</td>
                                            <td><label class="label label-inverse-success">Withdrawal</label></td>
        									<td>username</td>
        									<td>12-04-2019</td>
        									<td><a class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve Request"><i class="fa fa-check"></i></a></td>
                                        </tr> 
                                        <tr>
                                            <td>2554988246</td>
                                            <td>Paystack</td>
                                            <td>N20000.00</td>
                                            <td><label class="label label-inverse-success">Withdrawal</label></td>
        									<td>username</td>
        									<td>12-04-2019</td>
        									<td><a class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve Request"><i class="fa fa-check"></i></a></td>
                                        </tr>									
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Transaction ID</th>
                                            <th>Gateway</th>
                                            <th>Amount</th>
                                            <th>Status</th>
        									<th>Username</th>
        									<th>Created</th>
        									<th>Action</th>
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
    