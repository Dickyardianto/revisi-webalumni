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
            <li class="active">Download Berkas IKASMA3BDG</li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="row">
            <div class="col-md-8">
                <h1>Download Berkas IKASMA3BDG</h1>

                <ol>
                    <li><a href="<?= base_url('uploads/berkas/cobain.pdf'); ?>">Algoritma A Star - Intelejensia Buatan(Baca: CONTOH)</a></li>
                </ol>
            </div>
        </div>
    </div>

</body>

</html>