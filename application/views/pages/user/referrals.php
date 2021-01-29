<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">Your referrer details</h5>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('user');?>">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('user/referrals');?>">Referrals</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr class="text-info">
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
        									<th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user->Username; ?></td>
                                            <td><?= $user->Name; ?></td>
                                            <td><?= $user->Email; ?></td>
                                            <td><?= $user->Phone ;?></td>
                                            <td><?= $user->Gender ;?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
        									<th>Gender</th>
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
  