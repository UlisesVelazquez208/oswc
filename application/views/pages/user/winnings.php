<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-xl-12">
				    <div class="card">
                        <div class="card-header">
                            <h5 style="color: blue">My Winnings</h5>
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('user');?>">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('user/winnings');?>">Winnings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php $this->load->view('pages/user/win_table');?>
                    </div>              
                </div>                
            </div>
        </div>
    </div>
</div>