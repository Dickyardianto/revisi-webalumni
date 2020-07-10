        <div class="login-container lightmode">

            <div class="login-box animated fadeInDown">
                <!-- <div class="login-logo"></div> -->
                <div class="login-body" style="margin-top: 80px;">
                    <strong><?= showFlashMessage(); ?></strong>

                    <div class="login-title"><strong>Login</strong> dengan menggunakan akun Anda</div>
                    <form action="<?= base_url('auth'); ?>" class="form-horizontal" method="post" id="form-login-validate">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Username" name="userName" maxlength="50" value="<?= set_value('userName'); ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="Password" name="passWord" maxlength="50" required />
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-6">
                                <a href="<?= base_url('login/ForgotPassword'); ?>" class="btn btn-link btn-block">Forgot
                                    your password?</a>
                            </div>

                            <div class="col-md-6 pull-right">
                                <button type="submit" class="btn btn-info btn-block">Login</button>
                            </div>
                        </div>
                        <div class="login-subtitle">
                            Belum jadi anggota IKASMA3BDG? Silahkan daftar <a href="<?= base_url('register'); ?>">di
                                sini</a>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2020 <a href="<?= base_url(); ?>" title="IKASMA3BDG">IKASMA3BDG</a>
                    </div>
                    <div class="pull-right">
                        <a href="<?= base_url('#about'); ?>">About</a> |
                        <a href="<?= base_url('#contact'); ?>">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            $("#form-login-validate").validate();
        </script>