<footer class="footer text-center">
    <span class="text-danger">Copyright © <?= date("Y");?> <a href="<?= base_url('/');?>">PMBCLUB Lottery</a></span>
</footer>
    <script src="<?php echo base_url(); ?>front/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- j-pro js -->
    <!-- <script src="<?php echo base_url(); ?>back/assets/pages/j-pro/js/jquery.ui.min.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/j-pro/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/j-pro/js/jquery.j-pro.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/j-pro/js/jquery-cloneya.min.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/j-pro/js/j-forms-additions.min.js"></script> -->
    <!-- jquery slimscroll js -->
    <script src="<?php echo base_url(); ?>back/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
	<script src="<?php echo base_url(); ?>back/bower_components/modernizr/modernizr.js"></script>
	<script src="<?php echo base_url(); ?>back/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- classie js -->
    <script src="<?php echo base_url(); ?>back/bower_components/classie/classie.js"></script>
    <!-- Switch component js -->
    <script src="<?php echo base_url(); ?>back/bower_components/switchery/dist/switchery.min.js"></script>
    <!-- Tags js -->
    <script src="<?php echo base_url(); ?>back/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
    <!-- Calender js -->
    <script src="<?php echo base_url(); ?>back/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>front/js/components/daterangepicker.js"></script>

    <!-- c3 chart js -->
    <script src="<?php echo base_url(); ?>back/bower_components/d3/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/c3/c3.js"></script>
    <!-- sweet alert js -->
    <script src="<?php echo base_url(); ?>back/bower_components/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>back/assets/js/modal.js"></script> -->
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script src="<?php echo base_url(); ?>back/assets/js/modalEffects.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/js/classie.js"></script>

    <!-- data-table js -->
    <script src="<?php echo base_url(); ?>back/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <!-- product list js -->
    <script src="<?php echo base_url(); ?>back/assets/pages/product-list/product-list.js"></script>
    <!-- i18next.min.js -->
    <script src="<?php echo base_url(); ?>back/bower_components/i18next/i18next.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script src="<?php echo base_url(); ?>back/bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <!-- <script src="<?php echo base_url(); ?>back/assets/pages/dashboard/ecommerce-dashboard.js"></script> -->
    <script src="<?php echo base_url(); ?>back/assets/pages/data-table/js/data-table-custom.js"></script>
    <script src="<?php echo base_url(); ?>back/assets/js/script.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#numbersOnly").keydown(function (e) {
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });

        $('#show-elements-select').on('change',function(){
            var Strval = this.value;
            if(Strval==="Bank"){
                $("#gatewayType").show();
            }else{
                $("#gatewayType").hide();
            }
        });

        $('#daterange').daterangepicker();
    </script>

    </body>
</html>
