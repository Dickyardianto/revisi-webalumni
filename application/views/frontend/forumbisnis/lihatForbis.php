<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title><?= $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?= base_url('assets/html/favicon.ico'); ?>" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/html/css/theme-default.css'); ?>" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>

    <div class="container" style="margin-top: 80px;">
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="<?= base_url(''); ?>">Beranda</a></li>
            <li><a href="<?= base_url('forumBisnis'); ?>">Forum Bisnis</a></li>
            <li class="active"><a href="">Lihat Forum Bisnis</a></li>
        </ul>

        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h5>Lihat Forum Bisnis</h5>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="col-md-12">
                            <div class="panel-body" style=" padding: 25px;">

                                <?php if ($forumBisnis[0]->nama_bisnis_usaha == "") { ?>
                                    <h3><b>Belum di isi</b></h3>
                                <?php } else { ?>
                                    <h3><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('forumBisnis/lihatForbis/') . $forumBisnis[0]->id_forbis; ?>"><?= $forumBisnis[0]->nama_bisnis_usaha; ?></a></b></h3>
                                <?php } ?>

                                <?php if ($forumBisnis[0]->nama_lengkap == "") { ?>
                                    <h3><b>Belum di isi</b></h3>
                                <?php } else { ?>
                                    <p style="font-size: 15px;" class="text-primary" id="usernamePenulis" name="usernamePenulis"><b>Pemilik Bisnis : </b><?= $forumBisnis[0]->nama_lengkap; ?></p>
                                <?php } ?>

                            </div>
                            <div class="panel-body" style=" padding: 0 25px 0 25px;">
                                <div class="profile-image">
                                    <?php if ($forumBisnis[0]->nama_foto_bisnis == NULL) { ?>
                                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="width: 100%;">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/logo-bisnis/' . $forumBisnis[0]->nama_foto_bisnis); ?> " alt="<?= $forumBisnis[0]->nama_bisnis_usaha; ?>" title="<?= $forumBisnis[0]->nama_bisnis_usaha; ?>" style="width: 100%;">
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="panel-body" style=" padding: 25px;">
                                <?php if ($forumBisnis[0]->deskripsi_bisnis == "") { ?>
                                    <h3><b>Belum di isi</b></h3>
                                <?php } else { ?>
                                    <p style="font-size: 15px;" class="text-primary" id="isiBerita" name="isiBerita"><?= nl2br($forumBisnis[0]->deskripsi_bisnis); ?></p>
                                <?php } ?>
                            </div>


                        </div>
                        <!-- END CONTACT ITEM -->
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h6 class="text-info" style="margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px dotted #000 ;"><b>Forum Bisnis Lainnya</b></h6>
                <?php foreach ($forumBisnisLainnya as $B) : ?>

                    <a href="<?= base_url('forumBisnis/lihatForbis/') . $B->id_forbis; ?>">
                        <div class="panel panel-default">
                            <div class="col-md-4">
                                <div class="panel-body" style="width: 100px; height: 100px; overflow: hidden;">
                                    <?php if ($B->nama_foto_bisnis == NULL) { ?>
                                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="height: 100%;">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/logo-bisnis/' . $B->nama_foto_bisnis); ?> " alt="<?= $B->nama_bisnis_usaha; ?>" title="<?= $B->nama_bisnis_usaha; ?>" style="height: 100%;">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="panel-body">
                                    <?php if ($B->nama_bisnis_usaha == "") { ?>
                                        <h2><b>Belum di isi</b></h2>
                                    <?php } else { ?>
                                        <h6 class="text-primary" id="namaBisnisUsaha" name="namaBisnisUsaha"><b><?= $B->nama_bisnis_usaha; ?></b></h6>
                                        <!-- <h3><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('berita/baca/') . $B->id_berita; ?>"><?= $B->judul_berita; ?></a></b></h3> -->
                                    <?php } ?>


                                </div>
                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>
                <a class="text-info" href="<?= base_url('forumBisnis'); ?>">Selengkapnya &raquo;</a>
            </div>
        </div>
    </div>

</body>

</html>