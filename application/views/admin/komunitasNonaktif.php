<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Komunitas</li>
    <li class="active"><a href="<?= base_url('admin/Komunitas/komunitasNonaktif'); ?>">Komunitas Nonaktif</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2>Komunitas Nonaktif</h2>
</div>

<?= showFlashMessage(); ?>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <!-- SEARCH -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <p>Cari Komunitas</p>
                        <form action="<?= base_url('admin/Komunitas/cariStatusKomunitasNon'); ?>" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="namaKomunitas" placeholder="Komunitas mana yang akan anda cari ?">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SEARCH -->


    <div class="row">
        <!-- KOMUNITAS CONTENT -->
        <div class="row">
                <?php if ($komunitas) : ?>
                    <?php foreach ($komunitas as $A) { ?>
                        <?php if ($A->stat_komunitas == 0) : ?>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-body profile">
                                        <div class="profile-image">
                                            <?php if ($A->logo_komunitas == NULL) { ?>
                                                <img src="<?php echo base_url('uploads/content/komunitas/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url('uploads/content/komunitas/' . $A->logo_komunitas); ?> " alt="<?= $A->nama_komunitas; ?>" title="<?= $A->nama_komunitas; ?>">
                                            <?php } ?>
                                        </div>
                                        <div class="profile-data">
                                            <div class="profile-data-name">
                                                <h3 style="color:white;"><?= $A->nama_komunitas; ?><h3>
                                            </div>

                                        </div>
                                        <div class="profile-controls">
                                            <a class="profile-control-left btn-ubah-foto" title="UbahGambar" id="<?= $A->id_komunitas; ?>" data-toggle="modal" data-target="#message-box-ubah-gambar-komunitas"><span class="fa fa-edit"></span></a>
                                            <a class="profile-control-right btn-hapus-komunitas" title="Hapus" id="<?= $A->id_komunitas; ?>" data-toggle="modal" data-target="#message-box-delete-anggota"><span class="fa fa-trash-o"></span></a>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="contact-info">
                                            <h3>Tentang Komunitas ini</h3>
                                            <p> <?= $A->deskripsi_komunitas ?></p>
                                            <div class="panel-body">
                                                <div class="contact-info">
                                                    <p><i class="fa fa-link" aria-hidden="true"></i> <strong>Link Komunitas</strong><br>
                                                        <h5><a><?= $A->tautat_komunitas; ?></a></h5>
                                                    </p>

                                                    <?php if ($A->sifat_komunitas == "Publik") { ?>
                                                        <p><i class="fa fa-eye" aria-hidden="true"></i> <strong> <?= $A->sifat_komunitas ?> </strong><br>
                                                            <h5>Semua orang bisa join ke komunitas ini.</h5>
                                                        </p>
                                                    <?php } else { ?>
                                                        <p><i class="fa fa-eye" aria-hidden="true"></i> <strong>Private </strong><br>
                                                            <h5>Tidak semua orang bisa menemukan komunitas ini.</h5>
                                                        </p>
                                                    <?php } ?>

                                                    <?php if ($A->jenis_komunitas == "Aktif") { ?>
                                                        <p><i class="fa fa-globe" aria-hidden="true"></i> <strong><?= $A->jenis_komunitas ?></strong><br>
                                                            <h5>Banyak orang menggunakan komunitas ini</h5>
                                                        </p>
                                                    <?php } else { ?>
                                                        <p><i class="fa fa-globe" aria-hidden="true"></i> <strong>Pasif</strong><br>
                                                            <h5>Hanya sebagian anggota menggunakan komunitas ini dan sedikit hal yang diposting</h5>
                                                        </p>
                                                    <?php } ?>

                                                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Lokasi</strong><br>
                                                        <h5><?= $A->lokasi_komunitas ?></h5>
                                                    </p>
                                                    <p><i class="fa fa-users" aria-hidden="true"></i> <strong>Anggota</strong><br>
                                                        <h5>+- <?= $A->anggota_komunitas ?></h5>
                                                    </p>
                                                    <hr>
                                                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <small>Tanggal Dibuat</small><br>
                                                        <h5><?= $A->date_created; ?></h5>
                                                    </p>
                                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> <small>Waktu Dibuat</small><br>
                                                        <h5><?= $A->time_created; ?></h5>
                                                    </p>
                                                    <p><i class="fa fa-user" aria-hidden="true"></i> <small>Pengupload Komunitas</small><br>
                                                        <h5><?= $A->username; ?></h5>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- BUTTON UBAH  -->
                                    <div class="panel-footer text-center">
                                        <a class="btn btn-primary btn-rounded btn-block  btn-ubah-komunitas" title="Ubah Berita" id="<?= $A->id_komunitas; ?>" data-toggle="modal" data-target="#message-box-ubah-komunitas"><i class="fa fa-edit"></i>Ubah Komunitas</a>
                                    </div>
                                    <!-- BUTTON UBAH -->
                                </div>
                            </div>

                        <?php endif; ?>
                    <?php } ?>
                <?php else : ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="text-center" style="margin-top: 10px;">Komunitas tidak ditemukan</h2>
                        </div>
                    </div>
                <?php endif; ?>

        </div>
        <!-- KOMUNITAS CONTENT -->
    </div>
    <!-- PAGE CONTENT WRAP -->


    <!-- MODAL UBAH KOMUNITAS -->
    <div class="modal animated zoomIn" id="message-box-ubah-komunitas" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="<?= base_url('admin/Komunitas/setUpdateKomunitas'); ?>" class="form-horizontal" id="ubah-anggota-validate" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Ubah Komunitas</h4>
                    </div>
                    <div>
                        <div class="panel-body tab-content">
                            <div class="form-group hidden">
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="idUbahKomunitas" name="idUbahKomunitas">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Komunitas</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="namaUbahKomunitas" id="namaUbahKomunitas" placeholder="" required clear />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi Komunitas</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="lokasiUbahKomunitas" id="lokasiUbahKomunitas" placeholder="" required clear />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tautat Komunitas</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="tautatUbahKomunitas" id="tautatUbahKomunitas" placeholder="" required clear />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Deskripsi Komunitas</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="deskripsiUbahKomunitas" id="deskripsiUbahKomunitas" placeholder="" rows="4" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Sifat Komunitas</label>
                            <div class="col-md-8">
                                <select name="sifatUbahKomunitas" id="sifatUbahKomunitas" class="select form-control validate[required]">
                                    <option value="Publik">Publik </option>
                                    <option value="Private">Private </option>
                                    <option value="Hidden">Hidden </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Aktifkan kembali Komunitas</label>
                            <div class="col-md-8">
                                <select name="jenisUbahKomunitas" id="jenisUbahKomunitas" class="select form-control validate[required]">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Pasif">Pasif </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jumlah Anggota</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="anggotaUbahKomunitas" id="anggotaUbahKomunitas" placeholder="+-" required clear />
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Aktifkan kembali Komunitas</label>
                        <div class="col-md-8">
                            <select name="statUbahKomunitasss" id="statUbahKomunitasss" class="select form-control">
                                <option value="1">Ya</option>
                                <option value="0">Tidak </option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-md-12" style="text-align: left;">
                            <label class="control-label">* harus diisi</label>
                        </div>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL UBAH KOMUNITAS -->


    <!-- MODAL UBAH GAMBAR KOMUNITAS -->
    <div class="modal animated zoomIn" id="message-box-ubah-gambar-komunitas" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('admin/Komunitas/setUpdateFotoKomunitas'); ?>" class="form-horizontal" id="ubah-anggota-validate" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="defModalHead">Ubah Komunitas</h4>
                    </div>
                    <div>
                        <div class="panel-body tab-content">
                            <div class="form-group hidden">
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="idUbahFoto" name="idUbahFoto">
                                    <input type="text" class="form-control" id="namaUbahFotoKomunitas" name=" namaUbahFotoKomunitas">
                                    <input type="text" class="form-control" id="namaKomunitas" name="namaKomunitas">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Foto</label>
                        <div class="col-md-8" style="margin-left: 10px; margin-top: 12px;">
                            <img id="namaFotoKomunitas" src="<?= base_url('uploads/content/komunitas/'); ?>" width="350" style="margin-bottom: 10px;" />
                            <input type="hidden" class="form-control" id="ubahFotoKomunitas" name="ubahFotoKomunitas" readonly />
                            <br>
                            <input type="file" class="file" id="file-simple" name="fileSaya" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="col-md-12" style="text-align: left;">
                            <label class="control-label">*Harap Logo Komunitas yang sesuai</label>
                        </div>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL UBAH GAMBAR KOMUNITAS -->


    <!-- MODAL DELETE ANGGOTA -->
    <div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-delete-anggota">

        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title">
                    <span class="fa fa-times"></span> Hapus <strong>Komunitas</strong>
                </div>
                <form action="<?= base_url('admin/Komunitas/hapusKomunitas'); ?>" class="form-horizontal" method="post">
                    <div class="mb-content">
                        <div class="panel-body">
                            <p>Anda yakin akan menghapus komunitas dari IKASMA3BDG dengan identitas sebagai berikut :</p>

                            <div class="form-group hidden">
                                <input type="text" id="idKomunitasHapus" name="idKomunitasHapus" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Nama Komunitas : </label>
                                <div class="col-md-9">
                                    <label class="control-label" id="namaAktifKomunitas"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Tautat Komunitas : </label>
                                <div class="col-md-9">
                                    <label class="control-label" id="tautatAktifKomunitas"></label>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Pengupload : </label>
                                <div class="col-md-9">
                                    <label class="control-label" id="idAktifPengupload"></label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Hapus</button>
                            <a href="<?= base_url('admin/Komunitas/kelolaStatusKomunitas'); ?>" class="btn btn-default btn-lg">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- END MODAL DELETE ANGGOTA -->

    <script>
        $("#form-ubah-gambar-komunitas-validate").validate();

        $("#file-simple").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any"
        });

        $("#file-name").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any"
        });

        $(".btn-ubah-komunitas").click(function() {
            console.log(this.id);
            var idUbahKomunitas = this.id;

            $.post("<?= base_url('admin/Komunitas/KomunitasJSON/') ?>", {
                    id: idUbahKomunitas
                },
                function(data) {
                    var data_obj = JSON.parse(data);

                    var idUbahKomunitas = data_obj.komunitas[0].id_komunitas;
                    var namaUbahKomunitas = data_obj.komunitas[0].nama_komunitas;
                    var tautatUbahKomunitas = data_obj.komunitas[0].tautat_komunitas;
                    var lokasiUbahKomunitas = data_obj.komunitas[0].lokasi_komunitas;
                    var deskripsiUbahKomunitas = data_obj.komunitas[0].deskripsi_komunitas;
                    var sifatUbahKomunitas = data_obj.komunitas[0].sifat_komunitas;
                    var jenisUbahKomunitas = data_obj.komunitas[0].jenis_komunitas;
                    var anggotaUbahKomunitas = data_obj.komunitas[0].anggota_komunitas;

                    var statUbahKomunitasss = data_obj.komunitas[0].stat_komunitasss;

                    document.getElementById('idUbahKomunitas').value = idUbahKomunitas;
                    document.getElementById('namaUbahKomunitas').value = namaUbahKomunitas;
                    document.getElementById('tautatUbahKomunitas').value = tautatUbahKomunitas;
                    document.getElementById('lokasiUbahKomunitas').value = lokasiUbahKomunitas;
                    document.getElementById('deskripsiUbahKomunitas').value = deskripsiUbahKomunitas;
                    document.getElementById('sifatUbahKomunitas').value = sifatUbahKomunitas;
                    document.getElementById('jenisUbahKomunitas').value = jenisUbahKomunitas;
                    document.getElementById('anggotaUbahKomunitas').value = anggotaUbahKomunitas;

                    document.getElementById('statUbahKomunitas').value = statUbahKomunitasss;

                });
        });

        $(".btn-ubah-foto").click(function() {
            console.log(this.id);
            var idUbahFoto = this.id;

            $.post("<?= base_url('admin/Komunitas/KomunitasJSON/') ?>", {
                    id: idUbahFoto
                },
                function(data) {
                    var data_obj = JSON.parse(data);

                    var idUbahFoto = data_obj.komunitas[0].id_komunitas;
                    var logoKomunitas = data_obj.komunitas[0].logo_komunitas;
                    var namaKomunitas = data_obj.komunitas[0].nama_komunitas;

                    document.getElementById('idUbahFoto').value = idUbahFoto;
                    document.getElementById('namaFotoKomunitas').src = '<?= base_url('uploads/content/komunitas/'); ?>' + logoKomunitas;
                    document.getElementById('namaKomunitas').value = namaKomunitas;
                });
        });

        $(".btn-hapus-komunitas").click(function() {
            console.log(this.id);
            var idKomunitasHapus = this.id;

            $.post("<?= base_url('admin/Komunitas/KomunitasJSON/') ?>", {
                    id: idKomunitasHapus
                },
                function(data) {
                    var data_obj = JSON.parse(data);

                    var namaAktifKomunitas = data_obj.komunitas[0].nama_komunitas;
                    var tautatAktifKomunitas = data_obj.komunitas[0].tautat_komunitas;
                    var idAktifPengupload = data_obj.komunitas[0].id_pengupload;

                    document.getElementById('idKomunitasHapus').value = data_obj.komunitas[0].id_komunitas;
                    document.getElementById('namaAktifKomunitas').innerHTML = data_obj.komunitas[0].nama_komunitas;
                    document.getElementById('tautatAktifKomunitas').innerHTML = data_obj.komunitas[0].tautat_komunitas;
                    document.getElementById('idAktifPengupload').innerHTML = data_obj.komunitas[0].id_pengupload;

                });
        });
    </script>