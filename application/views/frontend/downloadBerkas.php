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

                <?php if ($berkas) : ?>
                    <ol>
                        <?php foreach ($berkas as $b) : ?>
                            <li><a href="<?= base_url('uploads/berkas/' . $b->nama_file); ?>" target="blank"><?= $b->nama_dokumen; ?></a></li>
                        <?php endforeach; ?>
                    </ol>
                <?php else : ?>
                    <h3>Tidak Ada Dokumen</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>