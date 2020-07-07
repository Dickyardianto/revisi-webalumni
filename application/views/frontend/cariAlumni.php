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
	<script type='text/javascript' src="<?= base_url('assets/html/js/plugins/jquery-validation/jquery.validate.js') ?>"></script>
	<!-- END PLUGINS -->

</head>

<body>

	<!-- <div class="page-title" > -->
	<!-- <h2> Cari Teman Anda</h2> -->
	<!-- </div> -->

	<!-- START BREADCRUMB -->
	<ul class="breadcrumb" style="margin-top:80px;">
		<li><a href="<?= base_url(''); ?>">Beranda</a></li>
		<li class="active"><a href="<?= base_url('Home/cariAlumni'); ?>">Cari Alumni</a></li>
	</ul>
	<!-- END BREADCRUMB -->

	<div class="page-content-wrap">

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<p>Cari Alumni.</p>
						<form action="<?= base_url('home/cariAlumniIka'); ?>" method="post">
							<div class="form-group">
								<div class="col-md-12">
									<div class="input-group">
										<div class="input-group-addon">
											<span class="fa fa-search"></span>
										</div>
										<input type="text" class="form-control" name="namaAnggota" placeholder="Masukkan nama yang akan anda cari.">
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
			<?php if (empty($dataAnggota)) : ?>
				<h2 class="text-center">Mohon maaf data tidak ditemukan !</h2>
			<?php else : ?>

				<?php foreach ($dataAnggota as $A) { ?>
					<div class="col-md-3">
						<!-- CONTACT ITEM -->
						<div class="panel panel-default">
							<div class="panel-body profile">
								<div class="profile-image">
									<?php if ($A->nama_foto == NULL || empty($A->nama_foto)) { ?>
										<img src="<?= base_url('uploads/no-image.jpg'); ?> " alt="Default Image" title="Default Image">
									<?php } else { ?>
										<img src="<?= base_url('uploads/avatars/' . $A->nama_foto); ?> " alt="<?= $A->nama_lengkap; ?>" title="<?= $A->nama_lengkap; ?>">
									<?php } ?>
								</div>
								<div class="profile-data">
									<?php if ($A->support == 1) { ?>
										<div class="profile-data-name"><?= $A->nama_lengkap; ?> <span class="badge badge-success">Member</span></div>
									<?php } else { ?>
										<div class="profile-data-name"><?= $A->nama_lengkap; ?></div>
									<?php } ?>

									<?php if ($A->angkatan == NULL || empty($A->angkatan)) { ?>
										<div class="profile-data-title">Belum di isi</div>
									<?php } else { ?>
										<div class="profile-data-title"><?= $A->angkatan; ?></div>
									<?php } ?>
								</div>
							</div>
							<div class="panel-body">
								<div class="contact-info">
									<?php if ($A->email == "") { ?>
										<p style="font-size: 12px;"><small>Email :</small> Belum di isi</p>
									<?php } else { ?>
										<p style="font-size: 12px;"><small>Email :</small> <?= $A->email; ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
						<!-- END CONTACT ITEM -->
					</div>
				<?php } ?>

			<?php endif; ?>
		</div>

	</div>

	<!-- START PRELOADS -->
	<audio id="audio-alert" src="<?= base_url('assets/html/audio/alert.mp3') ?>" preload="auto"></audio>
	<audio id="audio-fail" src="<?= base_url('assets/html/audio/fail.mp3') ?>" preload="auto"></audio>
	<!-- END PRELOADS -->

	<!-- START SCRIPTS -->
	<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/bootstrap/bootstrap.min.js') ?>"></script>

	<!-- START THIS PAGE PLUGINS-->
	<!-- <script type='text/javascript' src="<?= base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>"></script>         -->
	<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/scrolltotop/scrolltopcontrol.js') ?>"></script>

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

	<script type="text/javascript" src="<?= base_url('assets/html/js/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
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

</body>

</html>