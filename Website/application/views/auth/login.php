<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><i class="fa fa-cogs"></i> <b><?= $app_name; ?></b></a>
        </div>
        <!-- /.login-logo -->
        <div class=" login-box-body">
            <p class="login-box-msg">Masuk untuk memulai session</p>
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('auth'); ?>">
                <div class="form-group has-feedback">
                    <input type="text" name="username" id="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span class="help-block"><?= form_error('username'); ?></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class="help-block"><?= form_error('password'); ?></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->