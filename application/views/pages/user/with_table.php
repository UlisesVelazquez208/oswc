<div class="card-block">
    <div class="dt-responsive table-responsive">
        <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
            <thead>
                <tr class="text-info">
                    <th>Transaction ID</th>
                    <th>Gateway</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Wallet</th>
					<th>Transaction By</th>
					<th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($withdrawals as $withdrawal): ?>
                <tr>
                    <td><?= $withdrawal->TransactionID; ?></td>
                    <td><?= $withdrawal->Gateway; ?></td>
                    <td>N<?= $withdrawal->Amount; ?>.00</td>
                    <td><label class="label label-inverse-primary"><?= $withdrawal->Status ;?></label>
                    </td>
                    <td><?= $withdrawal->Wallet ;?></td>
                    <td><?= $withdrawal->TransactionBy ;?></td>
                    <td><?= $withdrawal->Created ;?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Transaction ID</th>
                    <th>Gateway</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Wallet</th>
					<th>Transaction By</th>
					<th>Created</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>