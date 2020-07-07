<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Komunitas</li>
    <li class="active"><a href="<?= base_url('alumni/Komunitas/komunitasNonaktif'); ?>">Komunitas Nonaktif</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Komunitas Nonaktif</h2>
</div>

<?= showFlashMessage(); ?>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <!-- BUTTON -->
    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('alumni/Komunitas'); ?>" class="btn btn-info"></b>Komunitas Akitf</a>
            <br>
            <br>
        </div>
    </div>
    <!-- BUTTON -->

    <!-- SEARCH -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Cari Komunitas</p>
                    <form action="<?= base_url('alumni/Komunitas/cariStatusKomunitasNonaktif'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-md-12">
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
    <!-- SEARCH -->

    <!-- KOMUNITAS CONTENT -->
    <div class="row">
        <?php if ($komunitas) : ?>
            <?php foreach ($komunitas as $A) { ?>
                <div class="col-md-4    ">
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

                        </div>
                        <div class="panel-body">
                            <div class="contact-info">
                                <?php if ($info[0]->id_user == $A->id_pengupload) { ?>
                                    <h3>Tentang Komunitas ini</h3>
                                    <p> <?= $A->deskripsi_komunitas ?></p>
                                <?php } ?>

                                <div class="panel-body">
                                    <div class="contact-info">
                                        <p><i class="fa fa-link" aria-hidden="true"></i> <strong>Link Komunitas</strong><br>
                                            <?php if ($info[0]->id_user == $A->id_pengupload) { ?>
                                                <h5><a><?= $A->tautat_komunitas ?></a></h5>
                                            <?php } else { ?>
                                                <h5><a>Komunitas belum aktif</a></h5>
                                            <?php } ?>
                                        </p>

                                        <?php if ($info[0]->id_user == $A->id_pengupload) { ?>
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

                                            <p><i class="fa fa-user" aria-hidden="true"></i> <strong>Pengupload Komunitas</strong><br>
                                                <h5><?= $A->username; ?></h5>
                                            </p>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- BUTTON HAPUS  -->
                        <?php if ($info[0]->id_user == $A->id_pengupload) { ?>
                            <div class="panel-body">
                                <div class="contact-info">
                                    <a class="btn btn-danger btn-block btn-hapus-komunitas" title="Hapus Komunitas" id="<?= $A->id_komunitas; ?>" id="<?= $A->id_komunitas; ?>" data-toggle="modal" data-target="#message-box-delete-komunitas"><i class="fa fa-edit"></i>Batalkan Permohonan Komunitas</a>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- BUTTON HAPUS -->

                        <!-- END CONTACT ITEM -->
                    </div>
                </div>
            <?php } ?>
        <?php else : ?>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center" style="margin-top: 10px;">Komunitas tidak ditemukan</h2>
                </div>
            </div>
        <?php endif; ?>
        <!-- KOMUNITAS CONTENT -->
    </div>
</div>
<!-- PAGE CONTENT WRAP -->


<!-- MODAL DELETE ANGGOTA -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-delete-komunitas">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Komunitas</strong>
            </div>
            <form action="<?= base_url('alumni/Komunitas/batalkanPermohonanKomunitas'); ?>" class="form-horizontal" method="post">
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
                        <a href="<?= base_url('alumni/Komunitas/komunitasNonaktif'); ?>" class="btn btn-default btn-lg">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MODAL DELETE ANGGOTA -->

<script>
    $("#form-ubah-komunitas-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });


    $(".btn-hapus-komunitas").click(function() {
        console.log(this.id);
        var idKomunitasHapus = this.id;

        $.post("<?= base_url('alumni/Komunitas/komunitasJSON/') ?>", {
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