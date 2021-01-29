<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                
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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/user-payment-profile');?>">User Payment Profiles</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5>All Payment Profiles</h5>
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
    