<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>&nbsp;<strong>
</footer>
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>

<script>
    $(function() {
        $('#tblcustomers').DataTable({
            'lengthChange': false,
            'pageLength': 14,
            "autoWidth": true
        })
        $('#tbldetailcustomers').DataTable({
            'lengthChange': false,
            'pageLength': 14,
            'autoWidth': true,
            'searching': false
        })
    })
</script>
<script>
    $(function() {
        //Date range picker
        $('#report').daterangepicker()
        //Date range picker with time picker
        $('#reporttime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        })

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false,
            showMeridian: false
        })
    })
</script>
<script>
    Morris.Bar({
        element: 'graph',
        data: <?= $graph; ?>,
        resize: true,
        xkey: 'tanggal',
        ykeys: ['shift_1', 'shift_2', 'shift_3'],
        labels: ['Shift 1', 'Shift 2', 'Shift 3'],
        barColors: ['#00c0ef', '#00a65a', '#f39c12', ],
        hideHover: 'auto'
    });
</script>
<script type="text/javascript">
    var timestamp = '<?= time(); ?>';

    function updateTime() {
        $('#jamtanggal').html(Date(timestamp));
        timestamp++;
    }
    $(function() {
        setInterval(updateTime, 1000);
    }); <
    /body>

    <
    /html>