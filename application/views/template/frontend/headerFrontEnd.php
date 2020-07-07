<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/back-end/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/html/favicon.ico') ?>" type="image/x-icon" />

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/back-end/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?= base_url('assets/back-end/vendor/magnific-popup/magnific-popup.css') ?>" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?= base_url('assets/back-end/css/creative.min.css') ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand text-primary page-scroll" href="#page-top">IKASMA3BDG</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= base_url(''); ?>" class="page-scroll" href="">Beranda</a></li>
                    <li><a href="<?= base_url('berita'); ?>" class="page-scroll" href="">Berita</a></li>
                    <li><a href="<?= base_url('forumBisnis'); ?>" class="page-scroll" href="">Forum Bisnis</a></li>
                    <li><a href="<?= base_url('komunitas'); ?>" class="page-scroll" href="">Komunitas</a></li>
                    <li><a href="<?= base_url('home/cariAnggota'); ?>" class="page-scroll" href="">Teman</a></li>

                    <?php if ($this->session->userdata('logged_in') == 'Sudah Login') : ?>
                        <li class="dropdown" style="margin-right: 20px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="navbar-avatar">
                                    <img src="<?= base_url('uploads/avatars/' . $info[0]->nama_foto); ?>" alt="<?= $info[0]->nama_lengkap; ?>" title="<?= $info[0]->nama_lengkap; ?>" style="width: 20px; height: 20px; overflow=hidden;" />
                                </span>
                                <?= $info[0]->nama_lengkap; ?>
                            </a>

                            <ul class="dropdown-menu">
                                <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) : ?>
                                    <li><a href="<?= base_url($info[0]->role); ?>">Beranda <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                                <?php else : ?>
                                    <li><a href="<?= base_url($info[0]->role); ?>">Profil <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                                    <li><a href="<?= base_url($info[0]->role) . '/pengaturan'; ?>">Pengaturan <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                                <?php endif; ?>
                                <li><a href="<?= base_url('login/Logout'); ?>">Log Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li style="margin-left: 30px;">
                            <a href="<?= base_url('register'); ?>" title="Registrasi" class="page-scroll">Registrasi</a>
                        </li>
                        <li>
                            <a href="<?= base_url('login'); ?>" title="Login" class="page-scroll">Login</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>