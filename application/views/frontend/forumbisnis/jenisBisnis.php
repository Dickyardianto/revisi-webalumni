<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?= base_url('assets/html/favicon.ico'); ?>" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url('assets/html/css/theme-default.css') ?>" />
    <!-- EOF CSS INCLUDE -->

    <!-- START PLUGINS -->
    <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/jquery/jquery-ui.min.js') ?>"></script>
    <script type='text/javascript' src="<?= base_url('assets/html/js/plugins/jquery-validation/jquery.validate.js') ?>">
    </script>
    <!-- END PLUGINS -->

</head>

<body>

    <div class="container" style="margin-top: 80px;">
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="<?= base_url(''); ?>">Beranda</a></li>
            <li class="active"><a href="<?= base_url('forumBisnis'); ?>">Forum Bisnis</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h5>Forum Bisnis</h5>
        </div>

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Cari Forum Bisnis</p>
                        <form action="<?= base_url('forumBisnis/cariForumBisnis'); ?>" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="namaForbis" placeholder="Temukan Forum Bisnis yang menarik untuk anda.">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <a href="<?= base_url('forumBisnis'); ?>" class="btn btn-primary">Reset Pencarian</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h6 class="text-warning" style="margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px dotted #000 ;"><b>Berdasarkan Jenis Bisnis</b></h6>
                <?php foreach ($jenisBisnis as $k) : ?>

                    <a class="btn btn-warning" href="<?= base_url('forumBisnis/jenisBisnis/') . $k->id_jenis_bisnis; ?>" style="margin-bottom: 5px;"><?= $k->nama_jenis_bisnis; ?></a>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="text-info"><b>#<?= $findJenisBisnis[0]->nama_jenis_bisnis ?></b></h2>
            </div>
            <?php if (empty($forumBisnis)) : ?>
                <div class="col-md-12">
                    <p>Data tidak ditemukan!</p>
                </div>
            <?php else : ?>
                <div class="col-md-8">
                    <div class="row">
                        <?php foreach ($forumBisnis as $B) : ?>
                            <?php if ($forumBisnis) : ?>
                                <?php if ($B->stat_forbis == 1) : ?>
                                    <!-- CONTACT ITEM -->
                                    <a style="color: black;" href="<?= base_url('forumBisnis/lihatForbis/') . $B->id_forbis; ?>">
                                        <div class="panel panel-default" style="padding: 15px;">
                                            <div class="col-md-4">
                                                <div class="panel-body" style="width: 200px; height: 150px; overflow: hidden;">
                                                    <div class="profile-image">
                                                        <?php if ($B->nama_foto_bisnis == NULL) { ?>
                                                            <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image" style="width: 100%;">
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url('uploads/logo-bisnis/' . $B->nama_foto_bisnis); ?> " alt="<?= $B->nama_foto_bisnis; ?>" title="<?= $B->nama_bisnis_usaha; ?>" style="height: 100%;">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8" style="transform: translate(0, 50%);">
                                                <div class="panel-body">
                                                    <?php if ($B->nama_bisnis_usaha == "") { ?>
                                                        <h2><b>Belum di isi</b></h2>
                                                    <?php } else { ?>
                                                        <h3 class="text-primary" id="bacaBerita" name="bacaBerita"><b><?= $B->nama_bisnis_usaha; ?></b></h3>
                                                        <!-- <h3><b><a class="text-primary" id="bacaBerita" name="bacaBerita" href="<?= base_url('berita/baca/') . $B->id_forbis; ?>"><?= $B->nama_bisnis_usaha; ?></a></b></h3> -->
                                                    <?php } ?>

                                                    <?php if ($B->pemilik_id == "") { ?>
                                                        <p style="font-size: 13.6px;">Pemilik Bisnis<br>Belum di isi</p>
                                                    <?php } else { ?>
                                                        <p style="font-size: 13.6px;">Pemilik Bisnis : <?= $B->nama_lengkap; ?></p>
                                                    <?php } ?>



                                                </div>
                                            </div>
                                            <!-- END CONTACT ITEM -->
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php else : ?>
                                <p>Data tidak ditemukan!</p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>


</body>




</html>