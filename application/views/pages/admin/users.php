<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4 style="color: red">All Users</h4>
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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/users');?>">Users</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5>All Users</h5>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Username</th>
        									<th>Phone</th>
        									<th>Gender</th>
        									<th>Country</th>
        									<th>State</th>
        									<th>Address</th>
        									<th>Date Registered</th>
                                            <th>Date Updated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user->Name; ?></td>
                                            <td><?= $user->Email; ?></td>
                                            <td><?= $user->Username; ?></td>
                                            <td><?= $user->Phone ;?></td>
                                            <td><?= $user->Gender ;?></td>
                                            <td><?= $user->Country ;?></td>
                                            <td><?= $user->State ;?></td>
                                            <td><?= $user->Address ;?></td>
                                            <td><?= $user->DateRegistered ;?></td>
                                            <td><?= $user->DateUpdated ;?></td>
                                        </tr>
                                        <?php endforeach; ?>	
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Username</th>
        									<th>Phone</th>
        									<th>Gender</th>
        									<th>Country</th>
        									<th>State</th>
        									<th>Address</th>
        									<th>Date Registered</th>
                                            <th>Date Updated</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <p><?php echo $links; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    