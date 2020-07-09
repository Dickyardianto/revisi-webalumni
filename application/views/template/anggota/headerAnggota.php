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

    <!-- jQuery JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/jquery/jquery-ui.min.js') ?>">
    </script>
    <script type='text/javascript' src="<?php echo base_url('assets/html/js/plugins/jquery-validation/jquery.validate.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/fileinput/fileinput.min.js') ?>">
    </script>
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
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="#" class="profile-mini">
                        <?php if (empty($info[0]->nama_foto)) { ?>
                            <img src="<?php echo base_url('uploads/no-image.jpg'); ?>" alt="Belum ada foto" />
                        <?php } else { ?>
                            <img src="<?php echo base_url('uploads/avatars/' . $info[0]->nama_foto); ?>" alt="<?= $info[0]->nama_lengkap; ?>" title="<?= $info[0]->nama_lengkap; ?>" />
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
                            <div class="profile-data-title">Anggota</div>
                        </div>
                    </div>
                </li>
                <!-- <li class="xn-title">Navigation</li> -->
                <li>
                    <a href="<?php echo base_url('anggota') ?>"><span class="fa fa-home"></span> <span class="xn-text">Beranda</span></a>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Anggota</span></a>
                    <ul>
                        <li><a href="<?= base_url('anggota/Anggota') ?>"><span class="fa fa-user"></span> Lihat
                                Anggota</a></li>
                        <li><a href="<?= base_url('anggota/Anggota/KelolaAnggota') ?>"><span class="fa fa-plus"></span>
                                Tambah Anggota </a></li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Alumni</span></a>
                    <ul>
                        <li><a href="<?= base_url('anggota/Anggota') ?>"><span class="fa fa-user"></span> Lihat
                                Alumni</a></li>
                        <li><a href="<?= base_url('anggota/Anggota/KelolaAnggota') ?>"><span class="fa fa-plus"></span>
                                Tambah Alumni </a></li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-envelope-o"></span> <span class="xn-text">Berita</span></a>
                    <ul>
                        <li><a href="<?= base_url('anggota/Berita'); ?>"><span class="fa fa-align-left"></span> <span class="xn-text">Kelola Berita</span></a></li>
                        <li><a href="<?= base_url('anggota/Berita/beritaNonaktif'); ?>"><span class="fa fa-minus"></span> <span class="xn-text">Berita Nonaktif</span></a></li>
                        <li><a href="<?= base_url('anggota/Berita/formTambahCalonBerita') ?>"><span class="fa fa-plus"></span>Tambah Berita </a></li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-briefcase"></span> <span class="xn-text">Forum Bisnis</span></a>
                    <ul>
                        <li><a href="<?= base_url('anggota/ForumBisnis') ?>"><span class="fa fa-bullhorn"></span>
                                Kelola Forum Bisnis</a></li>
                        <li><a href="<?= base_url('anggota/ForumBisnis/forumBisnisNonaktif') ?>"><span class="fa fa-minus"></span>
                                Forum Bisnis Nonaktif </a></li>
                        <li><a href="<?= base_url('anggota/ForumBisnis/tambahCalonForbis') ?>"><span class="fa fa-plus"></span>
                                Tambah Forum Bisnis</a></li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-camera-retro"></span> <span class="xn-text">Komunitas</span></a>
                    <ul>
                        <li><a href="<?= base_url('anggota/Komunitas') ?>"><span class="fa fa-cube"></span>Kelola Komunitas</a></li>
                        <li><a href="<?= base_url('anggota/Komunitas/komunitasNonaktif') ?>"><span class="fa fa-minus"></span> Komunitas Nonaktif</a></li>
                        <li><a href="<?= base_url('anggota/Komunitas/tambahKomunitas') ?>"><span class="fa fa-plus"></span> Tambah Komunitas </a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url('anggota/Pengaturan'); ?>"><span class="glyphicon glyphicon-cog"></span> <span class="xn-text">Pengaturan</span></a>
                </li>
                <!-- <li class="xn-openable">
                        <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Anggota</span></a>
                        <ul>
                            <li><a href="<?php echo base_url('index.php/welcome/post') ?>"><span class="fa fa-user"></span> Kelola Calon Anggota</a></li>
                            <li><a href="<?php echo base_url('index.php/welcome/people') ?>"><span class="fa fa-users"></span> Kelola Anggota </a></li>
                            <li><a href="<?php echo base_url('index.php/welcome/masterdata') ?>"><span class="fa fa-plus"></span> Tambah Data Master</a></li>
                        </ul>
                    </li>                   -->
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
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <!-- END SIGN OUT -->
                <!-- MESSAGES -->
                <!-- <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Permohonan Akun</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    
                                    <img src="<?php echo base_url('assets/html/assets/images/users/user2.jpg') ?>" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Meminta untuk menjadi anggota alumni</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    
                                    <img src="<?php echo base_url('assets/html/assets/images/users/user2.jpg') ?>" class="pull-left" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Meminta untuk menjadi anggota alumni</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    
                                    <img src="<?php echo base_url('assets/html/assets/images/users/user2.jpg') ?>" class="pull-left" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Meminta untuk menjadi anggota alumni</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    
                                    <img src="<?php echo base_url('assets/html/assets/images/users/user2.jpg') ?>" class="pull-left" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>Meminta untuk menjadi anggota alumni</p>
                                </a>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="<?php echo base_url('index.php/welcome/post'); ?>">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li> -->
                <!-- END MESSAGES -->

            </ul>
            <!-- END X-NAVIGATION VERTICAL -->