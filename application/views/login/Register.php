<div class="login-container">

    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <strong><?= showFlashMessage(); ?></strong>

            <div class="login-title"><strong>Selamat Datang</strong>, Mohon isi formulir dibawah ini untuk mendaftar
                menjadi anggota IKASMA3BDG</div>
            <form action="<?= base_url('login/Register/createRegisterAnggota'); ?>" class="form-horizontal" method="post" id="form-register-anggota-validate" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="namaLengkap" maxlength="100" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Nama Panggilan / alias" name="namaPanggilanAlias" maxlength="50" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" id="dp-3" class="form-control datepicker" data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="tglLahir" placeholder="Tanggal Lahir" required />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Angkatan" name="angkatan" maxlength="4" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <select class="form-control" name="role">
                            <option value="0">Daftar Sebagai</option>
                            <option value="3">Anggota</option>
                            <option value="4">Alumni</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="email" class="form-control" placeholder="Email" name="email" maxlength="75" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="No. Telepon" name="noTelepon" id="noTelepon" maxlength="14" required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" style="color: white; margin-bottom: 5px;">Foto</label><br>
                    <div class="col-md-12">
                        <input type="file" class="file" name="fileSaya" id="file-simple" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 pull-right">
                        <button type="submit" class="btn btn-info btn-block">Daftar</button>
                    </div>
                </div>

                <div class="login-subtitle">
                    Sudah punya akun? <a href="<?= base_url('login'); ?>">Login di sini</a>
                </div>

            </form>
        </div>

        <div class="login-footer">
            <div class="pull-left">
                &copy; 2020 <a href="<?= base_url(); ?>" title="IKASMA3BDG">IKASMA3BDG</a>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $("#form-register-anggota-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
</script>