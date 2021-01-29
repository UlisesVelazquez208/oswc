<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <a href="<?= base_url('user/add-deposit');?>" class="btn btn-success btn-round">
            <i class="fa fa-plus"></i>Add Deposit</a>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('user');?>">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('user/deposits');?>">Deposits</a>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">My Deposits</h5>
                        </div>
                        <?php $this->load->view('pages/user/dep_table');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>