<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">My Transactions</h5>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('user');?>">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('user/transactions');?>">Transactions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php $this->load->view('pages/user/tr_table');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>