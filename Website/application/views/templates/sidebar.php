<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- Sidebar user panel -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <?php if ($title == 'Dashboard') { ?>
                <li class="active">
                <?php } else { ?>
                <li>
                <?php } ?>
                <a href="<?= base_url('home'); ?>">
                    <i class="fa fa-tachometer ?>"></i><span> Dashboard</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('auth/logout'); ?>">
                    <i class="fa fa-sign-out ?>"></i> <span>Keluar</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>