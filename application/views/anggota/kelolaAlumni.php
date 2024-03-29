<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Keanggotaan</li>
    <li class="active"><a href="<?= base_url('anggota/Anggota/KelolaAlumni'); ?>">Tambah Alumni</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Tambah Alumni</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">


                <div class="panel-body">
                    <div class="tab-pane active" id="tab-first">
                        <p>Daftar Permohonan Calon Alumni IKASMA3BDG.</p>

                        <div class="form-group">
                            <form action="<?= base_url('anggota/Anggota/tambahCalonAlumni'); ?>" class="form-horizontal" id="form-tambah-anggota-validate" method="post" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" name="angkatan" placeholder="Angkatan / Tahun Lulus" maxlength="4" required />
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
                                        <li>Calon alumni baru harus diverifikasi terlebih dahulu agar terdaftar sebagai
                                            alumni aktif.</li>
                                        <li>Setelah di verifikasi, maka akun alumni dapat digunakan.</li>
                                        <li>Akun secara default menggunakan nomor telepon untuk masuk.</li>
                                    </ol>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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