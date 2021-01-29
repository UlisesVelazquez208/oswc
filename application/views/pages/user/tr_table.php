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
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction->TransactionID; ?></td>
                    <td><?= $transaction->Gateway; ?></td>

                    <?php if($transaction->Amount < 1){?>
                        <td>N0.00</td>
                    <?php } else{?>
                        <td>N<?= $transaction->Amount; ?>.00</td>
                    <?php }?>

                    <?php if($transaction->Status === 'Completed'){?>
                        <td><label class="label label-inverse-success"><?= $transaction->Status ;?></label>
                        </td>
                    <?php } else{?>
                        <td><label class="label label-inverse-warning"><?= $transaction->Status ;?></label>
                        </td>
                    <?php }?>

                    <td><?= $transaction->GameType ;?></td>

                    <?php if($transaction->WinStatus === 'Win'){?>
                        <td><label class="label label-inverse-success"><?= $transaction->WinStatus ;?></label>
                        </td>
                    <?php } else if($transaction->WinStatus === 'Loss'){?>
                        <td><label class="label label-inverse-danger"><?= $transaction->WinStatus ;?></label>
                        </td>
                    <?php } else{?>
                        <td><label class="label label-inverse-info">...</label>
                        </td>
                    <?php }?>
                    <td><?= $transaction->TransactionBy ;?></td>
                    <td><?= $transaction->Created ;?></td>
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