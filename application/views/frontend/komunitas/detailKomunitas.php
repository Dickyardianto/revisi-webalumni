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

<style>
    body {
        font-family: 'Open Sans', sans-serif;
    }

    .fb-profile img.fb-image-lg {
        z-index: 0;
        width: 100%;
        margin-bottom: 10px;
    }

    .fb-image-profile {
        margin: -90px 10px 0px 50px;
        z-index: 9;
        background-size: cover;
    }

    @media (max-width:768px) {

        .fb-profile-text>h1 {
            font-weight: 700;
            font-size: 16px;
        }

        .fb-image-profile {
            margin: -135px 1000px 10px 25px;
            z-index: 9;
        }
    }
</style>

<body>
    <?php if ($komunitas) : ?>

        <div class="container">
            <div class="fb-profile">
                <div class="panel panel-default">
                    <img align="left" class="fb-image-lg" src="<?= base_url('uploads/content/komunitas/defaultGrey.jpg') ?>" height="250" alt="Profile image example" />
                    <img align="left" class="profile-image fb-image-profile thumbnail" width="200" height="200" src="<?= base_url('uploads/content/komunitas/') . $komunitas[0]->logo_komunitas ?>" alt="Profile image example" />

                    <div class="fb-profile-text">
                        <div class="col-md-6">
                            <h2><?= $komunitas[0]->nama_komunitas ?></h2>
                            <div class="col-md-4">
                                <p><br><i class="fa fa-calendar" aria-hidden="true"></i> <small>Ditambahkan pada :</small>
                                    <h3><?= date_format(date_create($komunitas[0]->date_created), "l, j F Y"); ?></h3>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <br>
                                            <h3>Tentang Komunitas ini</h3>
                                            <div class="col-md-10">
                                                <h4> <?= $komunitas[0]->deskripsi_komunitas ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p><i class="fa fa-link" aria-hidden="true"></i> <strong>Link Komunitas</strong><br>
                                                <h5><a><?= $komunitas[0]->tautat_komunitas; ?></a></h5>
                                            </p>

                                            <?php if ($komunitas[0]->sifat_komunitas == "Publik") { ?>
                                                <p><i class="fa fa-eye" aria-hidden="true"></i> <strong> <?= $komunitas[0]->sifat_komunitas ?> </strong><br>
                                                    <h5>Semua orang bisa join ke komunitas ini.</h5>
                                                </p>
                                            <?php } else { ?>
                                                <p><i class="fa fa-eye" aria-hidden="true"></i> <strong>Private </strong><br>
                                                    <h5>Tidak semua orang bisa join ke komunitas ini.</h5>
                                                </p>

                                            <?php } ?>

                                            <?php if ($komunitas[0]->jenis_komunitas == "Aktif") { ?>
                                                <p><i class="fa fa-globe" aria-hidden="true"></i> <strong><?= $komunitas[0]->jenis_komunitas ?></strong><br>
                                                    <h5>Banyak orang menggunakan komunitas ini</h5>
                                                </p>
                                            <?php } else { ?>
                                                <p><i class="fa fa-globe" aria-hidden="true"></i> <strong>Pasif</strong><br>
                                                    <h5>Ssebagian orang menggunakan komunitas ini</h5>
                                                </p>
                                            <?php } ?>

                                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Lokasi</strong><br>
                                                <h5><?= $komunitas[0]->lokasi_komunitas ?></h5>
                                            </p>
                                            <p><i class="fa fa-users" aria-hidden="true"></i> <strong>Anggota</strong><br>
                                                <h5>+- <?= $komunitas[0]->anggota_komunitas ?></h5>
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <a href="<?= base_url('komunitas') ?>" class="btn btn-primary btn-block"> Kembali</a>
                                <br>
                            </div>

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
                </div>
            </div>
        </div>