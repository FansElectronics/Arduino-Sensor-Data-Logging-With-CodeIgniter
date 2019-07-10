<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Logging
            <small>Data monitoring selama ini</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="<?= base_url('home/laporan'); ?>"><i class="fa fa-table"></i> Data Logging</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-customers"><i class="fa fa-pencil-square-o"></i> BUAT REKAP LAPORAN</button>
                        <a href="<?= base_url('home/delete_all') ?>" class="btn btn-danger" onClick="alert('Apakah anda yakin menghapus semua data?')"><i class="fa fa-trash"></i></a>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tblcustomers" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal & Waktu</th>
                                    <th>Suhu</th>
                                    <th>Kelembaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datalog as $dl) : ?>
                                    <?php $datetime = $dl['tanggal'] . ' ' . $dl['waktu']; ?>
                                    <tr>
                                        <td><?= $datetime; ?></td>
                                        <td><?= $dl['suhu']; ?> C</td>
                                        <td><?= $dl['kelembaban']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->

                    <!-- .modal -->
                    <div class="modal modal-primary fade" id="modal-customers">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Tentukan Tanggal Rekap Laporan</h4>
                                </div>
                                <form method="post" action="<?= base_url('produksi'); ?>">
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <!-- Date range -->
                                                    <div class="form-group">
                                                        <label>Date range:</label>

                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" id="report" name="report">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
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
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->