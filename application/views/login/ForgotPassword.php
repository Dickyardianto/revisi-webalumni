<div class="login-container lightmode">

    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <strong><?= showFlashMessage(); ?></strong>

            <div class="login-title"><strong>Recovery</strong> Akun Anda</div>
            <p>Ketik nomor telepon dan email Anda untuk mencari akun Anda.</p>
            <form action="<?= base_url('login/ForgotPassword/forgotP'); ?>" class="form-horizontal" method="post"
                id="form-login-validate">
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Username Anda" name="userName"
                            maxlength="50" required />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="email" class="form-control" placeholder="Email aktif anda" name="emailName"
                            required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 pull-left">
                        <button type="submit" class="btn btn-info btn-block">Cari</button>
                    </div>
                    <div class="col-md-6 pull-left">
                        <a href="<?= base_url('login'); ?>" class="btn btn-danger btn-block">Batalkan</a>
                    </div>
                </div>
                <div class="login-subtitle">
                    Kembali ke halaman Login? <a href="<?= base_url('login'); ?>">di sini</a>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; 2020 <a href="<?= base_url(); ?>" title="IKASMA3BDG">IKASMA3BDG</a>
            </div>
            <div class="pull-right">
                <a href="<?= base_url('#about'); ?>">About</a> |
                <a href="<?= base_url('#services'); ?>">Privacy</a> |
                <a href="<?= base_url('#contact'); ?>">Contact Us</a>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
$("#form-login-validate").validate();
</script>