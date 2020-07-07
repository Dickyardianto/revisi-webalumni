<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Beranda</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap" style="margin-top: 15px;">

    <!-- START WIDGETS -->
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <a href="<?= base_url('koordinator/anggota/kelolaAnggota'); ?>" style="color:#33414E;">
                        <div class="widget-int num-count"><?= $jumlah_anggota ?></div>
                        <div class="widget-title" style="font-size: 12px;">user terdaftar</div>
                        <div class="widget-subtitle">Pada website anda</div>
                    </a>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->



        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <a href="<?= base_url('koordinator/anggota'); ?>" style="color:#33414E;">
                        <div class="widget-int num-count"><?= $jumlah_anggota_belum_verifikasi; ?></div>
                        <div class="widget-title" style="font-size: 12px;">user belum terverifikasi</div>
                        <div class="widget-subtitle">Pada website anda</div>
                    </a>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-title" style="font-size: 12px;">Anggota Terdaftar</div>
                        <!-- <div class="widget-subtitle">27/08/2014 15:23</div> -->
                        <div class="widget-int"><?= $jumlah_pendaftar_anggota ?></div>
                    </div>
                    <div>
                        <div class="widget-title" style="font-size: 12px;">Alumni Terdaftar</div>
                        <!-- <div class="widget-subtitle">Visitors</div> -->
                        <div class="widget-int"><?= $jumlah_pendaftar_alumni ?></div>
                    </div>
                    <!-- <div> -->
                    <!-- <div class="widget-title">New</div>
                        <div class="widget-subtitle">Visitors</div>
                        <div class="widget-int">1,977</div> -->
                    <!-- </div> -->
                </div>
            </div>
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET CLOCK -->
            <div class="widget widget-danger widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <!-- <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div> -->
            </div>
            <!-- END WIDGET CLOCK -->

        </div>
    </div>
    <!-- END WIDGETS -->



    <div class="row">
        <div class="col-md-4">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>
                <div class="widget-data">
                    <a href="<?= base_url('koordinator/berita'); ?>" style="color:#33414E;">
                        <div class="widget-int num-count"><?= $jumlahBeritaNon ?></div>
                        <div class="widget-title" style="font-size: 12px;">Calon Berita Belum terverifikasi</div>
                        <div class="widget-subtitle">Pada website anda</div>
                    </a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <div class="col-md-4">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-camera-retro"></span>
                </div>
                <div class="widget-data">
                    <a href="<?= base_url('koordinator/komunitas'); ?>" style="color:#33414E;">
                        <div class="widget-int num-count"><?= $jumlahKomunitasNon ?></div>
                        <div class="widget-title" style="font-size: 12px;">Calon Komunitas Belum terverifikasi</div>
                        <div class="widget-subtitle">Pada website anda</div>
                    </a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>

        <div class="col-md-4">
            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-briefcase"></span>
                </div>
                <div class="widget-data">
                    <a href="<?= base_url('koordinator/forumBisnis/kelolaCalonForBis'); ?>" style="color:#33414E;">
                        <div class="widget-int num-count"><?= $jumlahForbisNon ?></div>
                        <div class="widget-title" style="font-size: 12px;">Calon Forbis Belum terverifikasi</div>
                        <div class="widget-subtitle">Pada website anda</div>
                    </a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->
        </div>

    </div>


    <div class="row">

        <div class="col-md-4">
            <!-- START SALES & EVENTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Berita hari ini</h3>
                        <span>Lihat selengkapnya <a href="koordinator/berita/KelolaBerita">disini</a></span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li> -->
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder">
                        <?php if (empty($berita)) : ?>
                            <h5 style="margin:10px">Uppss .. belum ada berita terjadwal pada hari ini</h5>
                        <?php else : ?>
                            <?php foreach ($berita as $b) : ?>
                                <h3 style="margin:10px"><?= $b->judul_berita ?></h3>
                                <hr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- END SALES & EVENTS BLOCK -->
        </div>

        <div class="col-md-4">
            <!-- START SALES & EVENTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Komunitas terkait hari ini</h3>
                        <span>Lihat selengkapnya <a href="koordinator/Komunitas/kelolaStatusKomunitas">disini</a></span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li> -->
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder">
                        <?php if (empty($komunitas)) : ?>
                            <h5 style="margin:10px">Uppss .. belum ada komunitas terjadwal pada hari ini</h5>
                        <?php else : ?>
                            <?php foreach ($komunitas as $k) : ?>
                                <h3 style="margin:10px"><?= $k->nama_komunitas ?></h3>
                                <hr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- END SALES & EVENTS BLOCK -->

        </div>
    </div>

    <!-- START DASHBOARD CHART -->
    <!-- <div class="block-full-width">
        <div id="dashboard-chart" style="height: 250px; width: 100%; float: left;"></div>
        <div class="chart-legend">
            <div id="dashboard-legend"></div>
        </div>
    </div> -->
    <!-- END DASHBOARD CHART -->

</div>
<!-- END PAGE CONTENT WRAPPER -->