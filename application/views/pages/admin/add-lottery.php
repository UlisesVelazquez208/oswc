<!-- Add Manage Lottery -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="text-align: center">
            <h5 class="modal-title">Manage Lottery</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body p-b-0">
            <div class="card-block">
                <div class="j-wrapper j-wrapper-640">
                    <?= form_open('admin/manage-lottery/add', 'class="j-pro"');?>
                        <div class="j-content">
                            <!-- start name -->
                            <div class="j-unit">
                                <label class="j-input j-select">
                                    <select name="type">
                                        <option value="" selected="">Select lottery type</option>
                                        <option value="play-for-school-fees">play for school fees</option>
                                        <option value="play-for-house-rent">play for house rent</option>
										<option value="play-for-business-funding">play for business funding</option>
                                    </select>
                                    <?= form_error('type');?>
                                    <i></i>
                                </label>
                            </div>
                            <!-- end name -->
							<div class="j-row">
                                <div class="j-span6 j-unit">
                                    <label class="j-label">Lottery Start Date</label>
                                    <div class="j-input">
                                        <!-- <label class="j-icon-right" for="date_from">
                                            <i class="icofont icofont-ui-calendar"></i>
                                        </label> -->
                                        <input type="date" id="date_from" class="form-control" name="date_from">
                                    </div>
                                    <?= form_error('date_from');?>
                                </div>
                                <div class="j-span6 j-unit">
                                    <label class="j-label">Lottery End Date</label>
                                    <div class="j-input">
                                        <!-- <label class="j-icon-right" for="date_to">
                                            <i class="icofont icofont-ui-calendar"></i>
                                        </label> -->
                                        <input type="date" id="date_to" max="<?= date('Y-m-d');?>" class="form-control" name="date_to">
                                    </div>
                                    <?= form_error('date_to');?>
                                </div>
                            </div>
                            <div class="j-divider j-gap-bottom-25"></div>
                            <div class="j-unit">
                                <label class="j-input j-select">
                                    <select name="status">
                                        <option value="" selected="">Select Status</option>
                                        <option value="Running">Running</option>
                                        <option value="Expired">Expired</option>
                                    </select>
                                    <?= form_error('status');?>
                                    <i></i>
                                </label>
                            </div>
                            <!-- start response from server -->
                            <div class="j-response"></div>
                            <!-- end response from server -->
                        </div>
                        <!-- end /.content -->
                        <div class="j-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <!-- end /.footer -->
                    <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
