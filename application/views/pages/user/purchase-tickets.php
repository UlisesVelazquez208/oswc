<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <a href="<?= base_url('user/lottery/play');?>" class="btn btn-success btn-round">Buy Ticket</a>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('user');?>">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user/purchase');?>">Purchased Tickets</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">My Purchased Tickets</h5>
                        </div>
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr class="text-info">
                                            <th>Transaction ID</th>
                                            <th>Gateway</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Game Type</th>
                                            <th>Win Status</th>
                                            <th>Transaction By</th>
                                            <th>Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($purchases as $purchase): ?>
                                        <tr>
                                            <td><?= $purchase->TransactionID; ?></td>
                                            <td><?= $purchase->Gateway; ?></td>

                                            <?php if($purchase->Amount < 1){?>
                                                <td>N0.00</td>
                                            <?php } else{?>
                                                <td>N<?= $purchase->Amount; ?>.00</td>
                                            <?php }?>

                                            <?php if($purchase->Status === 'Completed'){?>
                                                <td><label class="label label-inverse-success"><?= $purchase->Status ;?></label>
                                                </td>
                                            <?php } else{?>
                                                <td><label class="label label-inverse-warning"><?= $purchase->Status ;?></label>
                                                </td>
                                            <?php }?>

                                            <td><?= $purchase->GameType ;?></td>

                                            <?php if($purchase->WinStatus === 'Win'){?>
                                                <td><label class="label label-inverse-success"><?= $purchase->WinStatus ;?></label>
                                                </td>
                                            <?php } else if($purchase->WinStatus === 'Loss'){?>
                                                <td><label class="label label-inverse-danger"><?= $purchase->WinStatus ;?></label>
                                                </td>
                                            <?php } else{?>
                                                <td><label class="label label-inverse-info">...</label>
                                                </td>
                                            <?php }?>
                                            <td><?= $purchase->TransactionBy ;?></td>
                                            <td><?= $purchase->Created ;?></td>
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
                                            <th>Win Status</th>
                                            <th>Transaction By</th>
                                            <th>Created</th>
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