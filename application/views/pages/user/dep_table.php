<div class="card-block">
    <div class="dt-responsive table-responsive">
        <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
            <thead>
                <tr class="text-info">
                    <th>Transaction ID</th>
                    <th>Gateway</th>
                    <th>Amount</th>
                    <th>Status</th>
					<th>Transaction By</th>
					<th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deposits as $deposit): ?>
                <tr>
                    <td><?= $deposit->TransactionID; ?></td>
                    <td><?= $deposit->Gateway; ?></td>

                    <?php if($deposit->Amount < 1){?>
                        <td>N0.00</td>
                    <?php } else{?>
                        <td>N<?= $deposit->Amount; ?>.00</td>
                    <?php }?>
                    
                    <?php if($deposit->Status === 'Completed'){?>
                    <td><label class="label label-inverse-success"><?= $deposit->Status ;?></label>
                    </td>
                    <?php } else{?>
                        <td><label class="label label-inverse-warning"><?= $deposit->Status ;?></label>
                        </td>
                    <?php }?>

                    <td><?= $deposit->TransactionBy ;?></td>
                    <td><?= $deposit->Created ;?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Transaction ID</th>
                    <th>Gateway</th>
                    <th>Amount</th>
                    <th>Status</th>
					<th>Transaction By</th>
					<th>Created</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>