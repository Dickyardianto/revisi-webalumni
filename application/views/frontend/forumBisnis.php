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

    <div class="page-title" style="margin-top: 10px;">
        <h2>Forum Bisnis IKASMA3Bandung</h2>
    </div>

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?= base_url('Home'); ?>">Beranda</a></li>
        <li class="active"><a href="<?= base_url('Home/forumBisnisAnggota'); ?>">Forum Bisnis</a></li>
    </ul>
    <!-- END BREADCRUMB -->

    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Cari Forum Bisnis</p>
                        <form action="<?= base_url('Home/cariForumBisnis'); ?>" method="post">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" name="namaForbis" placeholder="Temukan bisnis yang menarik untuk anda.">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php if (empty($forumBisnis)) : ?>
                    <tr>
                        <td colspan="7">
                            <h2 class="text-center" style="margin-top: 10px;">Upss . . . ! Forum bisnis tidak ditemukan.</h2>
                        </td>
                    </tr>
                <?php else : ?>
                    <div class="row">
                        <?php foreach ($forumBisnis as $A) { ?>
                            <div class="col-md-3">
                                <!-- CONTACT ITEM -->
                                <div class="panel panel-default">
                                    <div class="panel-body profile">
                                        <div class="profile-image">
                                            <?php if ($A->nama_foto_bisnis == NULL) { ?>
                                                <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url('uploads/logo-bisnis/' . $A->nama_foto_bisnis); ?> ">
                                            <?php } ?>
                                        </div>
                                        <div class="profile-data">
                                            <div class="profile-data-name"><?= $A->nama_bisnis_usaha; ?></div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="contact-info">
                                            <?php if ($A->pemilik_id == "") { ?>
                                                <p><small>Pemilik Bisnis</small><br>Belum di isi</p>
                                            <?php } else { ?>
                                                <p><small>Pemilik Bisnis</small><br><?= $A->nama_lengkap; ?></p>
                                            <?php } ?>

                                            <?php if ($A->nama_jenis_bisnis == "") { ?>
                                                <p><small>Jenis bisnis</small><br>Belum di isi</p>
                                            <?php } else { ?>
                                                <p><small>Jenis bisnis</small><br><?= $A->nama_jenis_bisnis; ?></p>
                                            <?php } ?>

                                            <?php if ($A->email == "") { ?>
                                                <p><small>Email</small><br>Belum di isi</p>
                                            <?php } else { ?>
                                                <p><small>Email</small><br><?= $A->email; ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="panel-footer text-center">
                                        <a class="btn btn-info btn-rounded btn-block btn-detail-forbis" id="<?= $A->id_forbis; ?>" data-toggle="modal" data-target="#message-box-detail-forbis" title="Lihat">Lihat</a>
                                    </div>
                                </div>
                                <!-- END CONTACT ITEM -->
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                    </div>
            </div>

        </div>
    </div>



    <div class="modal animated zoomIn" style="margin-top: 100px;" id="message-box-detail-forbis" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                    <div class="text-center" style="margin-top: 10px; margin-bottom:10px; margin-left:20px;">
                        <img class="img-circle" id="namaFotoBisnis" src="<?= base_url('uploads/logo-bisnis/'); ?>" width="180" height="180" />
                    </div>
                    <h2 style="margin-top: 10px;" class="text-center" id="namaBisnisUsaha"></h2>

                    <div style="margin:auto">
                        <div class="row">
                            <div class="col-md-3" style="margin-right: -20px;">
                                <h5>Deskripsi Bisnis : </h5>
                            </div>
                            <div class="col-md-9">
                                <h5 id="deskripsiBisnis" name="deskripsiBisnis"></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" style="margin-right: -20px;">
                                <h5>Alamat Bisnis &nbsp;&nbsp;&nbsp;&nbsp;: </h5>
                            </div>
                            <div class="col-md-9">
                                <h5 id="alamatBisnis" name="alamatBisnis"></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3" style="margin-right: -20px;">
                                <h5>No Telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </h5>
                            </div>
                            <div class="col-md-9">
                                <h5 id="noTelpBisnis" name="noTelpBisnis"></h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</body>

<!-- START PRELOADS -->
<audio id="audio-alert" src="<?= base_url('assets/html/audio/alert.mp3') ?>" preload="auto"></audio>
<audio id="audio-fail" src="<?= base_url('assets/html/audio/fail.mp3') ?>" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/bootstrap/bootstrap.min.js') ?>">
</script>

<!-- START THIS PAGE PLUGINS-->
<!-- <script type='text/javascript' src="<?= base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>"></script>         -->
<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/scrolltotop/scrolltopcontrol.js') ?>">
</script>

<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/morris/raphael-min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/morris/morris.min.js') ?>"></script>        -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/rickshaw/d3.v3.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/rickshaw/rickshaw.min.js') ?>"></script> -->
<!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>'></script> -->
<!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>'></script>                 -->
<!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/bootstrap/bootstrap-datepicker.js') ?>'></script>                 -->
<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/owl/owl.carousel.min.js') ?>"></script>

<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/moment.min.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/daterangepicker/daterangepicker.js') ?>"></script> -->
<!-- END THIS PAGE PLUGINS-->

<!-- TAB  PLUGINS -->
<!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>'></script> -->
<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>

<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/bootstrap/bootstrap-file-input.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/bootstrap/bootstrap-select.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/tagsinput/jquery.tagsinput.min.js') ?>"></script> -->
<!-- TAB PLUGINS -->

<!--TABLE PLUGINS -->
<!-- <script type='text/javascript' src='<?= base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>'></script> -->
<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/datatables/jquery.dataTables.min.js') ?>">
</script>
<!--TABLE PLUGINS -->

<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/dropzone/dropzone.min.js') ?>"></script> -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/fileinput/fileinput.min.js') ?>"></script>  -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/plugins/filetree/jqueryFileTree.js'); ?>"></script>     -->

<!-- START TEMPLATE -->
<!-- <script type="text/javascript" src="<?= base_url('assets/html/js/settings.js') ?>"></script> -->

<script type="text/javascript" src="<?= base_url('assets/html/js/plugins.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/html/js/actions.js') ?>"></script>

<script type="text/javascript" src="<?= base_url('assets/html/js/demo_dashboard.js') ?>"></script>
<!-- END TEMPLATE -->

<script type="text/javascript" src="<?= base_url('assets/html/js/custom-javascript.js'); ?>"></script>

<!-- END SCRIPTS -->


<script type='text/javascript'>
    $(".btn-detail-forbis").click(function() {
        // console.log(this.id);
        var idForbis = this.id;

        $.post("<?= base_url('Home/getForbisById/') ?>", {
                id: idForbis
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                var fotoBisnis = data_obj.forbis[0].nama_foto_bisnis;
                var deskripsiBisnis = data_obj.forbis[0].deskripsi_bisnis;
                var alamatBisnis = data_obj.forbis[0].alamat_bisnis;
                var noTelpBisnis = data_obj.forbis[0].no_telp_bisnis;

                document.getElementById('namaBisnisUsaha').innerHTML = data_obj.forbis[0].nama_bisnis_usaha;
                document.getElementById('namaFotoBisnis').src = '<?= base_url('uploads/logo-bisnis/') ?>' + fotoBisnis;
                document.getElementById('deskripsiBisnis').innerHTML = deskripsiBisnis;
                document.getElementById('alamatBisnis').innerHTML = alamatBisnis;
                document.getElementById('noTelpBisnis').innerHTML = noTelpBisnis;

            });
    });
</script>


</html>