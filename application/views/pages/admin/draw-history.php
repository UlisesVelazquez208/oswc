<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4 style="color: red">Draw Histories</h4>
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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/draw-history');?>">Draw History</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5>All Draw Histories</h5>
                        </div>
                         <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr>                                      
        									<th>Username</th>
                                            <th>Ticket Number</th>
        									<th>Date</th>
        									<th>Amount</th>
        									<th>Game Type</th>
        									<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user->TransactionBy; ?></td>
                                            <td><?= $user->TicketNumber; ?></td>
                                            <td><?= $user->Created; ?></td>
                                            <td>N<?= $user->Amount ;?></td>
                                            <td><?= $user->GameType ;?></td>
                                            <?php if($user->WinStatus == 'Win'){?>
                                                <td class="btn btn-info btn-round"><?= $user->WinStatus;?></td>
                                            <?php } else{?>
                                                <td class="btn btn-danger btn-round"><?= $user->WinStatus;?></td>
                                            <?php }?>
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
        									<th>Status</th>
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
