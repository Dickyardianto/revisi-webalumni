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

    <div class="container" style="margin-top: 80px; margin-bottom: 50px;">
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="<?= base_url(''); ?>">Beranda</a></li>
            <li><a href="<?= base_url('berita'); ?>">Berita</a></li>
            <li class="active"><a href="<?= base_url('berita/baca/') . $berita[0]->id_berita; ?>">Baca Berita</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="row" style="margin-top: 60px;">
            <div class="col-md-8">
                <div class="row">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="col-md-12">
                            <div class="panel-body" style=" padding: 25px;">

                                <?php if ($berita[0]->judul_berita == "") { ?>
                                    <h2><b>Belum di isi</b></h2>
                                <?php } else { ?>
                                    <h2><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('berita/baca/') . $berita[0]->id_berita; ?>"><?= $berita[0]->judul_berita; ?></a></b></h2>
                                <?php } ?>

                                <?php if ($berita[0]->username == "") { ?>
                                    <h2><b>Belum di isi</b></h2>
                                <?php } else { ?>
                                    <p class="text-primary" id="usernamePenulis" name="usernamePenulis"><b>Penulis : </b><?= $berita[0]->username; ?></p>
                                <?php } ?>

                                <?php if ($berita[0]->date_created == "") { ?>
                                    <p><small>Tanggal Dibuat</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small><?= date_format(date_create($berita[0]->date_created), "l, j F Y"); ?> <?= date_format(date_create($berita[0]->time_created), "H:m"); ?> WIB</small></p>
                                <?php } ?>

                            </div>
                            <div class="panel-body" style=" padding: 0 25px 0 25px;">
                                <div class="profile-image">
                                    <?php if ($berita[0]->foto == NULL) { ?>
                                        <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="width: 100%;">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('uploads/content/berita/' . $berita[0]->foto); ?> " alt="<?= $berita[0]->judul_berita; ?>" title="<?= $berita[0]->judul_berita; ?>" style="width: 100%;">
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="panel-body" style=" padding: 25px;">
                                <?php if ($berita[0]->isi_berita == "") { ?>
                                    <h2><b>Belum di isi</b></h2>
                                <?php } else { ?>
                                    <p class="text-primary" id="isiBerita" name="isiBerita"><?= nl2br($berita[0]->isi_berita); ?></p>
                                <?php } ?>
                            </div>

                            <?php if ($berita[0]->credit != "" || $berita[0]->sumber != "") { ?>
                                <div class="panel-body" style=" padding: 25px;">
                                    <p class="text-primary" id="credit" name="credit"><b>Credit : </b><?= $berita[0]->credit; ?></p>
                                    <p class="text-primary" id="sumber" name="sumber"><b>Sumber : </b><?= $berita[0]->sumber; ?></p>
                                </div>
                            <?php } ?>

                            <?php if ($berita[0]->kategori != "") { ?>
                                <div class="panel-body" style=" padding: 0 25px 25px 25px;">
                                    <a class="btn btn-default" href="<?= base_url('berita/kategori/') . $berita[0]->id_kategori; ?>"><?= $berita[0]->kategori; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- END CONTACT ITEM -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-info" style="margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px dotted #000 ;"><b>Berita Lainnya</b></h6>
                        <?php foreach ($daftarBerita as $B) : ?>
                            <?php if ($B->id_berita != $this->uri->segment(3)) : ?>
                                <a href="<?= base_url('berita/baca/') . $B->id_berita; ?>">
                                    <div class="panel panel-default">
                                        <div class="col-md-4">
                                            <div class="panel-body" style="width: 100px; height: 100px; overflow: hidden;">
                                                <?php if ($B->foto == NULL) { ?>
                                                    <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="height: 100%;">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('uploads/content/berita/' . $B->foto); ?> " alt="<?= $B->judul_berita; ?>" title="<?= $B->judul_berita; ?>" style="height: 100%;">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <?php if ($B->judul_berita == "") { ?>
                                                    <h2><b>Belum di isi</b></h2>
                                                <?php } else { ?>
                                                    <h6 class="text-primary" id="bacaBerita" name="bacaBerita"><b><?= $B->judul_berita; ?></b></h6>
                                                    <!-- <h3><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('berita/baca/') . $B->id_berita; ?>"><?= $B->judul_berita; ?></a></b></h3> -->
                                                <?php } ?>

                                                <?php if ($B->date_created == "") { ?>
                                                    <p><small>Tanggal Dibuat</small><br>Belum di isi</p>
                                                <?php } else { ?>
                                                    <span class="text-primary"><?= date_format(date_create($B->date_created), "l, j F Y"); ?> <?= date_format(date_create($B->time_created), "H:m"); ?> WIB</span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <a class="text-info" href="<?= base_url('berita'); ?>">Selengkapnya &raquo;</a>
                    </div>
                    <div class="col-md-12">
                        <h6 class="text-warning" style="margin-top: 50px; margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px dotted #000 ;"><b>Daftar Kategori</b></h6>
                        <?php foreach ($daftarKategori as $k) : ?>
                            <?php if ($k->id == "1") : ?>
                                <a class="btn btn-default" href="<?= base_url('berita/kategori/') . $k->id; ?>" style="margin-bottom: 5px;"><?= $k->kategori; ?></a>
                            <?php else : ?>
                                <?php if ($k->id % 2 == 1) : ?>
                                    <a class="btn btn-warning" href="<?= base_url('berita/kategori/') . $k->id; ?>" style="margin-bottom: 5px;"><?= $k->kategori; ?></a>
                                <?php else : ?>
                                    <a class="btn btn-danger" href="<?= base_url('berita/kategori/') . $k->id; ?>" style="margin-bottom: 5px;"><?= $k->kategori; ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>