<div class="login-container">

    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <strong><?= showFlashMessage(); ?></strong>

            <div class="row">
                <div class="col-md-6">
                    <a href="<?= base_url(''); ?>" class="btn btn-default btn-block btn-lg" title="Kembali">Kembali</a>
                </div>

                <div class="col-md-6">
                    <a href="<?= base_url('login'); ?>" class="btn btn-info btn-block btn-lg" title="Login">Login</a>
                </div>
            </div>
        </div>

        <div class="login-footer">
            <div class="pull-left">
                &copy; 2020 <a href="<?= base_url(); ?>" title="IKASMA3BDG">IKASMA3BDG</a>
            </div>
        </div>
    </div>