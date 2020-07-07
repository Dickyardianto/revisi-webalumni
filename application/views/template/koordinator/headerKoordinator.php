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
                            <div class="profile-data-title">Koordinator</div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="<?= base_url('koordinator'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Beranda</span></a>
                </li>
                <li>
                    <a href="<?= base_url('koordinator/Profile/'); ?>"><span class="glyphicon glyphicon-user"></span>
                        <span class="xn-text">Profil</span></a>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Anggota</span></a>
                    <ul>
                        <li><a href="<?= base_url('koordinator/Anggota') ?>"><span class="fa fa-user"></span> Kelola
                                Calon Anggota</a></li>
                        <li><a href="<?= base_url('koordinator/Anggota/kelolaAnggota') ?>"><span class="fa fa-users"></span> Kelola Anggota </a></li>
                        <li><a href="<?= base_url('koordinator/Anggota/kelolaPemulihanAnggota') ?>"><span class="fa fa-users"></span> Kelola Pemulihan Anggota</a></li>
                        <!-- <li><a href="<?= base_url('koordinator/Anggota/dataMaster'); ?>"><span class="fa fa-plus"></span> Data Master</a></li> -->
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-envelope-o"></span> <span class="xn-text">Berita</span></a>
                    <ul>
                        <li><a href="<?= base_url('koordinator/Berita'); ?>"><span class="fa fa-align-left"></span>
                                <span class="xn-text">Kelola Calon Berita</span></a></li>
                        <li><a href="<?= base_url('koordinator/Berita/kelolaBerita'); ?>"><span class="fa fa-align-left"></span>
                                <span class="xn-text">Kelola Berita Aktif</span></a>
                        </li>
                        <li><a href="<?= base_url('koordinator/Berita/kelolaKategori'); ?>"><span class="fa fa-align-left"></span>
                                <span class="xn-text">Kelola Kategori</span></a>
                        </li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-briefcase"></span> <span class="xn-text">Forum Bisnis</span></a>
                    <ul>
                        <li><a href="<?= base_url('koordinator/ForumBisnis/kelolaCalonForBis'); ?>"><span class="fa fa-clipboard"></span> <span class="xn-text">Kelola Calon ForBis</span></a>
                        </li>
                        <li><a href="<?= base_url('koordinator/ForumBisnis'); ?>"><span class="fa fa-bullhorn"></span>
                                <span class="xn-text">Kelola Forum Bisnis</span></a></li>
                        <li><a href="<?= base_url('koordinator/ForumBisnis/kelolaJenisBisnis'); ?>"><span class="fa fa-book"></span> <span class="xn-text">Kelola Jenis Bisnis</span></a>
                        </li>
                    </ul>
                </li>

                <li class="xn-openable">
                    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Komunitas</span></a>
                    <ul>
                        <li><a href="<?= base_url('koordinator/Komunitas') ?>"><span class="fa fa-user"></span> Kelola
                                Calon Komunitas</a></li>
                        <li><a href="<?= base_url('koordinator/Komunitas/komunitasNonaktif'); ?>"><span class="fa fa-minus"></span> <span class="xn-text">Komunitas Nonaktif</span></a></li>
                        <li><a href="<?= base_url('koordinator/Komunitas/kelolaStatusKomunitas') ?>"><span class="fa fa-users"></span> Kelola Status Komunitas </a></li>
                    </ul>
                </li>





                <li>
                    <a href="<?= base_url('koordinator/Pengaturan'); ?>"><span class="glyphicon glyphicon-cog"></span>
                        <span class="xn-text">Pengaturan</span></a>
                </li>
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

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