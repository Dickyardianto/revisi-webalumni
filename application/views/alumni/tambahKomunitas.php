<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Komunitas</li>
    <li class="active"><a href="<?= base_url('alumni/Komunitas/tambahKomunitas'); ?>">Tambah Komunitas</li></a>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Tambah Komunitas</h2>
</div>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <!-- KOMUNITAS CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="tab-pane active" id="tab-first">
                        <p>Daftar Permohonan Calon Komunitas IKASMA3BDG.</p>

                        <div class="form-group">
                            <form action="<?= base_url('alumni/Komunitas/tambahCalonKomunitas'); ?>" class="form-horizontal" id="form-tambah-komunitas-validate" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Komunitas</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaKomunitas" placeholder="Nama Komunitas Aktif" required clear />
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control" name="idPengupload" value="<?= $info[0]->id_user ?>">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Lokasi Komunitas</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="lokasiKomunitas" placeholder="Lokasi Komunitas" required clear />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tautat Komunitas</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="tautatKomunitas" placeholder="Tautan Komunitas/Link Website Komunitas" required clear />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Deskripsi Komunitas</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="deskKomunitas" placeholder="Deskripsi Komunitas" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Sitaf Komunitas : </label>
                                        <div class="col-md-8">
                                            <select name="sifatKomunitas" class="select form-control validate[required]">
                                                <option value="Publik">Publik </option>
                                                <option value="Private">Private </option>
                                                <option value="Hidden">Hidden </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis Komunitas : </label>
                                        <div class="col-md-8">
                                            <select name="jenisKomunitas" class="select form-control validate[required]">
                                                <option value="Aktif">Aktif </option>
                                                <option value="Pasif">Pasif </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah Anggota</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="anggotaKomunitas" placeholder="Perkiraan Jumlah anggota aktif pada komunitas" required clear />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Logo Komunitas</label>
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

                                <!-- CATATAN -->
                                <div class="panel-footer">
                                    <label class="text-muted">Catatan : </label>
                                    <ol>
                                        <li>Calon Komunitas Baru yang anda buat harus diverifikasi terlebih dahulu agar terdaftar sebagai
                                            Komunitas aktif oleh admin (1x24jam)</li>
                                        <li>Setelah di verifikasi, maka Komunitas anda dapat diolah dan akan ditampilkan di halaman user</li>
                                        <li>Logo harap disesuaikan dengan logo komunitas sebenarnya</li>
                                    </ol>
                                </div>
                                <!-- CATATAN -->

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- KOMUNITAS CONTENT -->

</div>

<script>
    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
</script>