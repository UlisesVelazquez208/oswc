<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <a href="<?= base_url('user/withdrawal/request');?>" class="btn btn-success btn-round">Request for Withdrawal</a>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('user');?>">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>!">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user/withdrawals');?>">Withdrawals</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">My Withdrawals</h5>
                        </div>
                        <?php $this->load->view('pages/user/with_table');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
