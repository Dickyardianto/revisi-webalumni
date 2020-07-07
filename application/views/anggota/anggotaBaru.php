<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Anggota</li>
    <li class="active"><a href="<?= base_url('anggota/Anggota/KelolaAnggota'); ?>">Tambah Anggota</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Tambah Anggota</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">
                    <p>Formulir Permohonan Anggota Baru IKASMA3BDG.</p>

                    <div class="form-group">
                        <form action="<?= base_url('anggota/Anggota/tambahCalonAnggota'); ?>" class="form-horizontal" id="form-tambah-anggota-validate" method="post" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Lengkap</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Panggilan / Alias</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="namaPanggilanAlias" placeholder="Nama Panggilan / Alias" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tanggal Lahir</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="dp-3" class="form-control datepicker" data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="tglLahir" placeholder="Tanggal Lahir" required />
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Angkatan / Tahun Lulus</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="angkatan" placeholder="Angkatan / Tahun Lulus" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">No Telepon</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="noTelepon" id="noTelepon" placeholder="No. Telepon" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control form-email " name="email" id="email" placeholder="Email" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Foto</label>
                                    <div class="col-md-8">
                                        <input type="file" class="file" id="file-simple" name="fileSaya" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-success pull-right">Simpan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <label class="text-muted">Catatan : </label>
                                <ol>
                                    <li>Anggota yang baru ditambahkan akan diverifikasi terlebih dahulu oleh admin agar terdaftar sebagai
                                        anggota.</li>
                                    <li>Setelah di verifikasi, maka akun anggota dapat digunakan.</li>
                                </ol>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });
        </script>