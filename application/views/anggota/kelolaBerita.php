<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Berita</li>
    <li class="active"><a href="<?= base_url('anggota/Berita'); ?>">Kelola Berita</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Berita</h2>
</div>

<?= showFlashMessage(); ?>


<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('anggota/Berita/formTambahCalonBerita'); ?>" class="btn btn-success" style="margin-bottom: 15px;"><b>&plus;</b> Tambah Berita</a>
            <a href="<?= base_url('anggota/Berita/beritaNonaktif'); ?>" class="btn btn-info" style="margin-bottom: 15px;">Berita Nonaktif</a>
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <p>Cari Berita</p>
                        <form action="<?= base_url('anggota/Berita/cariBerita'); ?>" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="judulBerita" placeholder="Berita apa yang anda cari ?">
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

    <div class="row">

        <?php if ($berita) : ?>
            <?php foreach ($berita as $B) : ?>
                <?php if ($B->stat_berita == 1) : ?>
                    <div class="col-md-4">
                        <!-- CONTACT ITEM -->
                        <div class="panel panel-default">
                            <div class="panel-body profile">
                                <div class="profile-image">
                                    <?php if ($B->foto == NULL) { ?>
                                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/content/berita/' . $B->foto); ?> " alt="<?= $B->judul_berita; ?>" title="<?= $B->judul_berita; ?>">
                                    <?php } ?>
                                </div>
                                <div class="profile-data">
                                    <div class="profile-data-name"><?= $B->judul_berita; ?></div>
                                </div>
                                <div class="profile-controls">
                                    <a class="profile-control-left btn-ubah-foto" title="Ubah Foto" id="<?= $B->id_berita; ?>" data-toggle="modal" data-target="#message-box-ubah-foto"><span class="fa fa-edit"></span></a>
                                    <a class="profile-control-right btn-hapus-berita" title="Hapus" id="<?= $B->id_berita; ?>" data-toggle="modal" data-target="#message-box-hapus-berita"><span class="fa fa-trash-o"></span></a>
                                </div>
                            </div>
                            <div class="panel-body" style="height: 100%;">
                                <div class="contact-info">

                                    <?php if ($B->date_created == "") { ?>
                                        <p><small>Tanggal Dibuat</small><br>Belum di isi</p>
                                    <?php } else { ?>
                                        <p><small>Tanggal Dibuat</small><br><?= $B->date_created; ?></p>
                                    <?php } ?>

                                    <?php if ($B->time_created == "") { ?>
                                        <p><small>Waktu Dibuat</small><br>Belum di isi</p>
                                    <?php } else { ?>
                                        <p><small>Waktu Dibuat</small><br><?= $B->time_created; ?></p>
                                    <?php } ?>

                                    <?php if ($B->kategori == "") { ?>
                                        <p><small>Kategori</small><br>Belum di isi</p>
                                    <?php } else { ?>
                                        <p><small>Kategori</small><br><?= $B->kategori; ?></p>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <a class="btn btn-primary btn-rounded btn-block btn-ubah-berita" title="Ubah Berita" id="<?= $B->id_berita; ?>" data-toggle="modal" data-target="#message-box-ubah-berita"><span class="fa fa-edit"></span>Ubah</a>
                                <a class="btn btn-info btn-rounded btn-block btn-isi-berita" title="Isi Berita" id="<?= $B->id_berita; ?>" data-toggle="modal" data-target="#message-box-isi-berita">Isi Berita</a>
                            </div>
                            <!-- END CONTACT ITEM -->
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center" style="margin-top: 10px;">Berita tidak ditemukan</h2>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- MODAL UBAH BERITA -->
<div class="modal animated zoomIn" id="message-box-ubah-berita" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('anggota/Berita/setUpdateBerita'); ?>" class="form-horizontal" id="form-ubah-berita-validate" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Ubah Berita</h4>
                </div>
                <div>
                    <div class="panel-body tab-content">
                        <div class="form-group hidden">
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="idUbahBerita" name="idUbahBerita">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Judul Berita</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="judulBerita" name="judulBerita" placeholder="Judul Berita" />
                    </div>
                </div>

                <div div class="form-group">
                    <label class="col-md-2 control-label">Isi Berita</label>
                    <div class="col-md-8">
                        <textarea class="form-control" id="isiBerita" name="isiBerita" placeholder="Isi berita" rows="20" cols="50"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Sumber</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="sumberBerita" name="sumberBerita" placeholder="Sumber Berita" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Credit</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="creditBerita" name="creditBerita" placeholder="creditBerita" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Kategori : </label>
                    <div class="col-md-8">
                        <select name="kategoriBerita" id="kategoriBerita" class="validate[required] select form-control">
                            <?php foreach ($daftarKategori as $kategori) : ?>
                                <option value="<?= $kategori->id; ?>"><?= $kategori->kategori; ?></option>
                            <?php endforeach; ?>
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
<!-- END MODAL UBAH BERITA -->

<!-- MODAL UBAH FOTO -->
<div class="modal animated zoomIn" id="message-box-ubah-foto" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('anggota/Berita/setUpdateFoto'); ?>" class="form-horizontal" id="form-ubah-berita-validate" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Ubah Foto</h4>
                </div>
                <div>
                    <div class="panel-body tab-content">
                        <div class="form-group hidden">
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="idUbahFoto" name="idUbahFoto">
                                <input type="text" class="form-control" id="judulUbahFotoBerita" name="judulUbahFotoBerita">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Foto</label>
                    <div class="col-md-8" style="margin-left: 10px; margin-top: 12px;">
                        <img id="namaFotoBerita" src="<?= base_url('uploads/content/berita/'); ?>" width="350" style="margin-bottom: 10px;" />
                        <input type="hidden" class="form-control" id="ubahFotoBerita" name="ubahFotoBerita" readonly />
                        <input type="file" class="file" id="file-simple" name="fileSaya" />
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
<!-- END MODAL UBAH FOTO -->


<!-- MODAL DELETE BERITA -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-hapus-berita">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Berita</strong>
            </div>
            <form action="<?= base_url('anggota/Berita/hapusBerita'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Anda yakin akan menghapus berita dari IKASMA3BDG dengan detail sebagai berikut :</p>

                        <div class="form-group hidden">
                            <input type="text" id="idBeritaHapus" name="idBeritaHapus" class="form-control" value="<?= $berita[0]->id_berita ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Judul Berita : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="judulAktifBerita"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Hapus</button>
                        <a href="<?= base_url('anggota/Berita'); ?>" class="btn btn-default btn-lg">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MODAL DELETE BERITA -->

<!-- MODAL ISI BERITA -->
<div class="modal animated zoomIn" id="message-box-isi-berita" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title" id="judulIsiBerita"></h2>
                <div class="form-group hidden">
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="idIsiBerita" name="idIsiBerita">
                    </div>
                </div>
                <hr>
                <p class="h4" id="isiBeritaOpened" name="isiBeritaOpened"></p>
                <hr>
                <small>Sumber</small> :
                <p id="sumberBeritaOpened" name="sumberBeritaOpened"></p>
                <small>Credit</small> :
                <p id="creditBeritaOpened" name="creditBeritaOpened"></p>
            </div>
            </>
        </div>
    </div>
    <!-- END MODAL ISI BERITA -->

    <script>
        $("#form-ubah-berita-validate").validate();

        $("#file-simple").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any"
        });

        $(".btn-ubah-berita").click(function() {
            console.log(this.id);
            var idUbahBerita = this.id;

            $.post("<?= base_url('anggota/Berita/beritaJSON/') ?>", {
                    id: idUbahBerita
                },
                function(data) {
                    var data_obj = JSON.parse(data);

                    var idBerita = data_obj.berita[0].id_berita;
                    var judulBerita = data_obj.berita[0].judul_berita;
                    var isiBerita = data_obj.berita[0].isi_berita;
                    var sumberBerita = data_obj.berita[0].sumber;
                    var creditBerita = data_obj.berita[0].credit;
                    var idKategori = data_obj.berita[0].id_kategori;

                    document.getElementById('idUbahBerita').value = idBerita;
                    document.getElementById('judulBerita').value = judulBerita;
                    document.getElementById('isiBerita').value = isiBerita;
                    document.getElementById('sumberBerita').value = sumberBerita;
                    document.getElementById('creditBerita').value = creditBerita;

                    $("#kategoriBerita").val(idKategori).change();
                });
        });

        $(".btn-ubah-foto").click(function() {
            console.log(this.id);
            var idUbahBerita = this.id;

            $.post("<?= base_url('anggota/Berita/beritaJSON/') ?>", {
                    id: idUbahBerita
                },
                function(data) {
                    var data_obj = JSON.parse(data);

                    var idUbahFoto = data_obj.berita[0].id_berita;
                    var judulUbahFotoBerita = data_obj.berita[0].judul_berita;
                    var foto = data_obj.berita[0].foto;

                    document.getElementById('idUbahFoto').value = idUbahFoto;
                    document.getElementById('namaFotoBerita').src = '<?= base_url('uploads/content/berita/'); ?>' + foto;
                    document.getElementById('ubahFotoBerita').value = foto;
                    document.getElementById('judulUbahFotoBerita').value = judulUbahFotoBerita;
                });
        });

        $(".btn-hapus-berita").click(function() {
            console.log(this.id);
            var idBeritaHapus = this.id;

            $.post("<?= base_url('anggota/Berita/beritaJSON/') ?>", {
                    id: idBeritaHapus
                },
                function(data) {
                    var data_obj = JSON.parse(data);

                    document.getElementById('idBeritaHapus').value = data_obj.berita[0].id_berita;
                    document.getElementById('judulAktifBerita').innerHTML = data_obj.berita[0].judul_berita;

                });
        });

        $(".btn-isi-berita").click(function() {
            console.log(this.id);
            var idIsiBerita = this.id;

            $.post("<?= base_url('anggota/Berita/beritaJSON/') ?>", {
                    id: idIsiBerita
                },
                function(data) {
                    var data_obj = JSON.parse(data);

                    var judulIsiBerita = data_obj.berita[0].judul_berita;
                    var isiBeritaOpened = data_obj.berita[0].isi_berita;
                    var sumberBeritaOpened = data_obj.berita[0].sumber;
                    var creditBeritaOpened = data_obj.berita[0].credit;

                    document.getElementById('judulIsiBerita').innerHTML = judulIsiBerita;
                    document.getElementById('isiBeritaOpened').innerHTML = isiBeritaOpened.replace(/\r\n|\r|\n/g, "<br />");
                    document.getElementById('sumberBeritaOpened').innerHTML = sumberBeritaOpened;
                    document.getElementById('creditBeritaOpened').innerHTML = creditBeritaOpened;
                });
        });
    </script>