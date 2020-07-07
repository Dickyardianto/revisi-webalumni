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

    <style>
        .alert {
            animation: autoHide 0s ease-in 3s forwards;
        }

        @keyframes autoHide {
            to {
                visibility: hidden;
                position: absolute;
            }
        }
    </style>
</head>

<body>

    <div class="container" style="margin-top: 80px; margin-bottom: 50px;">
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="<?= base_url(''); ?>">Beranda</a></li>
            <li class="active"><a href="<?= base_url('berita'); ?>">Berita</a></li>
        </ul>
        <!-- END BREADCRUMB -->


        <div class="row" style="margin-top: 30px;">
            <div class="col-md-8">

                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p>Cari Berita</p>
                                <form action="<?= base_url('berita/cariBerita'); ?>" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="judulBerita" placeholder="Berita mana yang akan anda cari ?">
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($title != 'Berita') : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $kategori; ?>
                        </div>
                    </div>
                <?php else : ?>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if ($daftarBerita) : ?>
                                <?php foreach ($daftarBerita as $B) : ?>
                                    <?php if ($B->stat_berita == 1) : ?>
                                        <!-- CONTACT ITEM -->
                                        <a href="<?= base_url('berita/baca/') . $B->id_berita; ?>">
                                            <div class="panel panel-default">
                                                <div class="col-sm-4">
                                                    <div class="panel-body" style="width: 200px; height: 200px; overflow: hidden;">
                                                        <?php if ($B->foto == NULL) { ?>
                                                            <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="height: 100%;">
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url('uploads/content/berita/' . $B->foto); ?> " alt="<?= $B->judul_berita; ?>" title="<?= $B->judul_berita; ?>" style="height: 100%;">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8" style="transform: translate(0, 50%);">
                                                    <div class="panel-body">

                                                        <?php if ($B->judul_berita == "") { ?>
                                                            <h2><b>Belum di isi</b></h2>
                                                        <?php } else { ?>
                                                            <h3 class="text-primary" id="bacaBerita" name="bacaBerita"><b><?= $B->judul_berita; ?></b></h3>
                                                            <!-- <h3><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('berita/baca/') . $B->id_berita; ?>"><?= $B->judul_berita; ?></a></b></h3> -->
                                                        <?php } ?>

                                                        <?php if ($B->date_created == "") { ?>
                                                            <p><small>Tanggal Dibuat</small><br>Belum di isi</p>
                                                        <?php } else { ?>
                                                            <p class="text-primary"><small><b class="text-info" style="margin-right: 10px;">Berita </b><?= date_format(date_create($B->date_created), "l, j F Y"); ?> <?= date_format(date_create($B->time_created), "H:m"); ?> WIB</small></p>
                                                            <!-- <p><small><b class="text-info" style="margin-right: 10px;">Berita </b><?= date_format(date_create($B->date_created), "l, j F Y"); ?> <?= date_format(date_create($B->time_created), "H:m"); ?> WIB</small></p> -->
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                                <!-- END CONTACT ITEM -->
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <h4 class="text-danger text-center" style="margin-bottom: 30px;">Berita tidak ditemukan!</h4>
                            <?php endif; ?>
                        </div>

                        <?= $this->pagination->create_links(); ?>

                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <h6 class="text-warning" style="margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px dotted #000 ;"><b>Daftar Kategori</b></h6>
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

</body>

</html>