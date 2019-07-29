<!DOCTYPE html>
<html>

<head>

    <title><?= $title; ?> - <?= $app_name; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<section class="content-header">
    <h1>
        Data Logging
        <small>Data monitoring selama ini</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="<?= base_url(); ?>"><i class="fa fa-table"></i> Data Logging</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('main/delete_all') ?>" class="btn btn-danger" onClick="alert('Apakah anda yakin menghapus semua data?')"><i class="fa fa-trash"></i> Hapus Semua Data</a>
                    <?= $this->session->flashdata('message'); ?>
                </div>

                <div class="box-body">
                    <table id="tableLogging" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal & Waktu</th>
                                <th>Suhu</th>
                                <th>Kecepatan</th>
                                <th>Tegangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datalog as $dl) : ?>
                                <?php $datetime = $dl['tanggal'] . ' ' . $dl['waktu']; ?>
                                <tr>
                                    <td><?= $datetime; ?></td>
                                    <td><?= $dl['suhu']; ?> C</td>
                                    <td><?= $dl['kecepatan']; ?></td>
                                    <td><?= $dl['tegangan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

                <!-- .modal -->
                <div class="modal modal-primary fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tentukan Tanggal Rekap Laporan</h4>
                            </div>
                            <form method="post" action="<?= base_url('laporan'); ?>">
                                <div class="modal-body">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label>Date range:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input autocomplete="off" type="text" class="form-control pull-right" id="rangePicker" name="report">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-outline">Buat Laporan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?= base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script>
    $(function() {
        $('#tableLogging').DataTable()
    })
    $(function() {
        $('#rangePicker').daterangepicker()
    })
</script>
</body>

</html>