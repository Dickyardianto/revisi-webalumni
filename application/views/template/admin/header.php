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
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/html/css/theme-default.css') ?>" />
    <!-- EOF CSS INCLUDE -->

    <style>
        .alert {
            animation: autoHide 0s ease-in 8s forwards;
        }

        @keyframes autoHide {
            to {
                visibility: hidden;
                position: absolute;
            }
        }
    </style>

    <!-- START PLUGINS -->
    <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/jquery/jquery-ui.min.js') ?>">
    </script>
    <script type='text/javascript' src="<?php echo base_url('assets/html/js/plugins/jquery-validation/jquery.validate.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/fileinput/fileinput.min.js') ?>">
    </script>
    <!-- END PLUGINS -->

</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container animated fadeIn page-navigation-top-fixed">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar page-sidebar-fixed scroll">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="<?= base_url(''); ?>">IKASMA3BDG</a>
                </li>
                <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <?php if (empty($info[0]->nama_foto)) { ?>
                            <img src="<?php echo base_url('uploads/no-image.jpg'); ?>" alt="Belum ada foto" />
                        <?php } else { ?>
                            <img src="<?php echo base_url('uploads/avatars/gambar-admin/' . $info[0]->nama_foto); ?>" alt="<?= $info[0]->nama_lengkap; ?>" title="<?= $info[0]->nama_lengkap; ?>" />
                        <?php } ?>
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                            <?php if (empty($info[0]->nama_foto)) { ?>
                                <img src="<?php echo base_url('uploads/no-image.jpg'); ?>" alt="Belum ada foto" />
                            <?php } else { ?>
                                <img src="<?php echo base_url('uploads/avatars/' . $info[0]->nama_foto); ?>" alt="<?= $info[0]->nama_lengkap; ?>" title="<?= $info[0]->nama_lengkap; ?>" />
                            <?php } ?>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?= $info[0]->nama_lengkap; ?></div>
                            <div class="profile-data-title">Admin</div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url('admin') ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Beranda</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/Profile') ?>"><span class="glyphicon glyphicon-user"></span>
                        <span class="xn-text">Profil</span></a>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Keanggotaan</span></a>
                    <ul>
                        <li><a href="<?php echo base_url('admin/Anggota') ?>"><span class="fa fa-user"></span> Kelola Calon Anggota </a></li>
                        <li><a href="<?php echo base_url('admin/Anggota/kelolaAnggota') ?>"><span class="fa fa-users"></span> Kelola Anggota </a></li>
                        <li><a href="<?php echo base_url('admin/Anggota/kelolaPemulihanAnggota') ?>"><span class="fa fa-users"></span> Kelola Pemulihan Akun </a></li>
                        <!-- <li><a href="<?php echo base_url('admin/Anggota/dataMaster') ?>"><span class="fa fa-plus"></span> Data Master</a></li> -->
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-envelope-o"></span> <span class="xn-text">Berita</span></a>
                    <ul>
                        <li><a href="<?= base_url('admin/Berita'); ?>"><span class="fa fa-align-left"></span> <span class="xn-text">Kelola Calon Berita</span></a></li>
                        <li><a href="<?= base_url('admin/Berita/kelolaBerita'); ?>"><span class="fa fa-align-left"></span>
                                <span class="xn-text">Kelola Berita Aktif</span></a>
                        </li>
                        <li><a href="<?= base_url('admin/Berita/kelolaKategori'); ?>"><span class="fa fa-align-left"></span>
                                <span class="xn-text">Kelola Kategori</span></a>
                        </li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-briefcase"></span> <span class="xn-text">Forum Bisnis</span></a>
                    <ul>
                        <li><a href="<?= base_url('admin/ForumBisnis/kelolaCalonForBis'); ?>"><span class="fa fa-clipboard"></span> <span class="xn-text">Kelola Calon ForBis</span></a>
                        </li>
                        <li><a href="<?= base_url('admin/ForumBisnis'); ?>"><span class="fa fa-bullhorn"></span> <span class="xn-text">Kelola Forum Bisnis</span></a></li>
                        <li><a href="<?= base_url('admin/ForumBisnis/kelolaJenisBisnis'); ?>"><span class="fa fa-book"></span> <span class="xn-text">Kelola Jenis Bisnis</span></a>
                        </li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-camera-retro"></span> <span class="xn-text">Komunitas</span></a>
                    <ul>
                        <li><a href="<?= base_url('admin/komunitas'); ?>"><span class="fa fa-cube"></span> <span class="xn-text">Kelola Calon Komunitas</span></a></li>
                        <li><a href="<?= base_url('admin/komunitas/komunitasNonaktif'); ?>"><span class="fa fa-minus"></span> <span class="xn-text">Komunitas Nonaktif</span></a></li>
                        <li><a href="<?= base_url('admin/Komunitas/kelolaStatusKomunitas'); ?>"><span class="fa fa-cubes"></span> <span class="xn-text">Kelola Komunitas Aktif</span></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('admin/Pengaturan'); ?>"><span class="glyphicon glyphicon-cog"></span> <span class="xn-text">Pengaturan</span></a>
                </li>
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content animated fadeIn">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
                <!-- SIGN OUT -->
                <li class="xn-icon-button pull-right">
                    <a href="javascript:void(0);" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <!-- END SIGN OUT -->

            </ul>
            <!-- END X-NAVIGATION VERTICAL -->