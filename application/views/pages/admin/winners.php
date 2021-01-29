<div class="main-body">
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header-title">
                <h4 style="color: red">Winners</h4>
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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/winners');?>">Winnings</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5>All Winners</h5>
                        </div>
                        <?php $this->load->view('pages/user/win_table');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>