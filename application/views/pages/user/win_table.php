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
                    <th>Transaction By</th>
                    <th>Wallet</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($winnings as $winning): ?>
                <tr>
                    <td><?= $winning->TransactionID; ?></td>
                    <td><?= $winning->Gateway; ?></td>
                    <td>N<?= $winning->Amount; ?>.00</td>
                    <td><label class="label label-inverse-success"><?= $winning->WinStatus ;?></label>
                    </td>
                    <td><?= $winning->GameType ;?></td>
                    <td><?= $winning->TransactionBy ;?></td>
                    <td><?= $winning->Wallet ;?></td>
                    <td><?= $winning->Created ;?></td>
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
                    <th>Transaction By</th>
                    <th>Wallet</th>
                    <th>Created</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>