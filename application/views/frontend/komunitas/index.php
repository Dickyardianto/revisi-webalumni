<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="<?= base_url('assets/html/favicon.ico'); ?>" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/html/css/theme-default.css') ?>" />

    <style>
        .profile-page .profile-header {
            position: relative
        }

        .profile-page .profile-header .profile-image img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            border: 3px solid #fff;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            margin-bottom: 15px;
        }

        .profile-page .profile-header .social-icon a {
            margin: 0 5px
        }

        .profile-page .profile-sub-header {
            min-height: 60px;
            width: 100%
        }

        .profile-page .profile-sub-header ul.box-list {
            display: inline-table;
            table-layout: fixed;
            width: 100%;
            background: #eee
        }

        .profile-page .profile-sub-header ul.box-list li {
            border-right: 1px solid #e0e0e0;
            display: table-cell;
            list-style: none
        }

        .profile-page .profile-sub-header ul.box-list li:last-child {
            border-right: none
        }

        .profile-page .profile-sub-header ul.box-list li a {
            display: block;
            color: #424242
        }
    </style>

</head>

<body>

    <div class="container" style="margin-top: 80px;">

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li>Komunitas</li>
            <li class="active"><a href="<?= base_url('Komunitas'); ?>">Lihat Komunitas</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h2> Lihat Komunitas</h2>
        </div>

        <?= showFlashMessage(); ?>

        <!-- PAGE CONTENT WRAP -->
        <div class="page-content-wrap">

            <!-- SEARCH -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <p>Cari Komunitas</p>
                                <form action="<?= base_url('komunitas/cariKomunitas'); ?>" method="post">
                                    <div class="col-md-12">
                                        <div class="form-group">
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
            </div>
            <!-- SEARCH -->

            <div class="profile-page">
                <div class="row">
                    <?php if ($komunitas) : ?>
                        <?php foreach ($komunitas as $A) { ?>
                            <div class="col-md-6 col-md-12">
                                <div class="panel default profile-header">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="profile-image float-md-right">
                                                    <?php if ($A->logo_komunitas == NULL) { ?>
                                                        <img src="<?php echo base_url('uploads/content/komunitas/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url('uploads/content/komunitas/' . $A->logo_komunitas); ?> " alt="<?= $A->nama_komunitas; ?>" title="<?= $A->nama_komunitas; ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <h4 class="m-t-0 m-b-0">
                                                    <h2><?= $A->nama_komunitas; ?></h2>
                                                </h4>
                                                <span class="job_post"><i class="fa fa-eye" aria-hidden="true"></i> <strong> <?= $A->sifat_komunitas ?> |</strong></span>
                                                <span class="job_post"><i class="fa fa-user" aria-hidden="true"></i><strong> Anggota : +-<?= $A->anggota_komunitas ?></strong></span>

                                                <?php if ($A->sifat_komunitas == 'Publik') { ?>
                                                    <p>
                                                        <h5>Semua orang bisa join ke komunitas ini.</h5>
                                                    </p>
                                                <?php } else { ?>
                                                    <p><i>
                                                            <h5>Sebagian orang bisa join ke komunitas ini!</h5>
                                                        </i></p>
                                                <?php } ?>
                                                <hr>
                                                <div>
                                                    <a href="<?= base_url('Komunitas/detailKomunitas/') .  $A->id_komunitas; ?>  " class="btn btn-primary btn-block" title="Detail komunitas" id="<?= $A->id_komunitas; ?>">Lihat semua</a>
                                                </div>
                                                <p class="social-icon m-t-5 m-b-0">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php else : ?>
                        <h4 class="text-danger text-center" style="margin-bottom: 30px;">Komunitas tidak ditemukan!</h4>
                    <?php endif; ?>
                </div>
            </div>



            <script>
                $("#form-ubah-komunitas-validate").validate();

                $("#file-simple").fileinput({
                    showUpload: false,
                    showCaption: false,
                    browseClass: "btn btn-danger",
                    fileType: "any"
                });
            </script>
</body>

</html>