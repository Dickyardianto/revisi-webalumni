<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Anggota</li>
    <li class="active"><a href="<?= base_url('anggota/Anggota'); ?>">Lihat Anggota</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Lihat Anggota</h2>
</div>

<?= showFlashMessage(); ?>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <p>Cari Anggota</p>
                        <form action="<?= base_url('anggota/Anggota/cariAnggota'); ?>" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="namaAnggota" placeholder="Siapa yang akan anda cari ?">
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
        <?php if ($anggota) : ?>
            <?php foreach ($anggota as $A) { ?>
                <div class="col-md-3">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <?php if ($A->nama_foto == NULL) { ?>
                                    <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/avatars/' . $A->nama_foto); ?> " alt="<?= $A->nama_lengkap; ?>" title="<?= $A->nama_lengkap; ?>">
                                <?php } ?>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $A->nama_lengkap; ?></div>

                                <?php if ($A->status_bekerja != NULL || $A->status_bekerja != "") { ?>

                                    <?php if ($A->status_bekerja == 0 && $A->bisnis_usaha == 0) { ?>
                                        <div class="profile-data-title">Tidak Bekerja</div>
                                    <?php } else if ($A->status_bekerja == 0 && $A->bisnis_usaha == 1) { ?>
                                        <div class="profile-data-title">Tidak Bekerja / Punya Usaha</div>
                                    <?php } else { ?>
                                        <div class="profile-data-title"><?= $A->jabatan; ?></div>
                                    <?php } ?>

                                <?php } else { ?>
                                    <div class="profile-data-title">Profesi belum diisi</div>
                                <?php } ?>

                            </div>


                        </div>
                        <div class="panel-body">
                            <div class="contact-info">
                                <?php if ($A->no_telp == "") { ?>
                                    <p><small>Mobile</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Mobile</small><br><?= $A->no_telp; ?></p>
                                <?php } ?>

                                <?php if ($A->email == "") { ?>
                                    <p><small>Email</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Email</small><br><?= $A->email; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <a class="btn btn-info btn-rounded btn-block btn-detail-anggota" id="<?= $A->id_anggota; ?>" title="Lihat">Lihat</a>
                        </div>
                    </div>
                    <!-- END CONTACT ITEM -->
                </div>
            <?php } ?>
        <?php else : ?>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center" style="margin-top: 10px;">Anggota tidak ditemukan</h2>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>
<!-- END PAGE CONTENT WRAP -->


<script>
    $(".btn-detail-anggota").click(function() {
        console.log(this.id);
        var idAnggota = this.id;
        $(".btn-detail-anggota").attr("href", '<?= base_url("anggota/Anggota/detailAnggota/"); ?>' + idAnggota);
    });
</script>