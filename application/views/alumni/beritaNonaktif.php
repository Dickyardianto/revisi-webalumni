<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Berita</li>
    <li class="active"><a href="<?= base_url('alumni/Berita'); ?>">Kelola Berita</a></li>
    <li><a href="<?= base_url('alumni/Berita/beritaNonaktif'); ?>">Berita Nonaktif</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2>Berita Nonaktif</h2>
</div>

<?= showFlashMessage(); ?>


<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('alumni/Berita'); ?>" class="btn btn-info" style="margin-bottom: 15px;">Berita Aktif</a>
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <p>Cari Berita</p>
                        <form action="<?= base_url('alumni/Berita/cariBeritaNonaktif'); ?>" method="post">
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
                <?php if ($B->stat_berita == 0) : ?>
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

<!-- MODAL DELETE BERITA -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-hapus-berita">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Pembatalan <strong>Berita</strong>
            </div>
            <form action="<?= base_url('alumni/Berita/hapusBeritaNon'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Anda yakin akan membatalkan ajuan berita dengan detail sebagai berikut :</p>

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
                        <a href="<?= base_url('alumni/Berita/beritaNonaktif'); ?>" class="btn btn-default btn-lg">Batal</a>
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

        $(".btn-hapus-berita").click(function() {
            console.log(this.id);
            var idBeritaHapus = this.id;

            $.post("<?= base_url('alumni/Berita/beritaJSON/') ?>", {
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

            $.post("<?= base_url('alumni/Berita/beritaJSON/') ?>", {
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