<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <a href="<?= base_url('user/payment-profile/create');?>" class="btn btn-success btn-round"><i class="fa fa-plus"></i>Add New</a>
				<span>Add payment profile so that your account can be credited when you win</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('user');?>">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Payment Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">My Payment Profiles</h5>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr class="text-info">
                                            <th>Created</th>
                                            <th>Gateway</th>
                                            <th>Bank Name</th>
                                            <th>Account Name</th>
        									<th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user): ?>
                                        <tr>
                                            <td><?= $user->Created; ?></td>
                                            <td><?= $user->Gateway; ?></td>
                                            <td><?= $user->BankName; ?></td>
                                            <td><?= $user->AccountName ;?></td>
                                            <td><?= $user->AccountNumber ;?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Created</th>
                                            <th>Gateway</th>
                                            <th>Bank Name</th>
                                            <th>Account Name</th>
        									<th>Account Number</th>
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