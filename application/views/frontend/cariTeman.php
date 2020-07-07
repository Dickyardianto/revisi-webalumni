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
		<li class="active"><a href="<?= base_url('Home/cariTeman'); ?>">Cari Teman Anda</a></li>
	</ul>
	<!-- END BREADCRUMB -->

	<div class="page-content-wrap">

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<p>Cari Teman Anda.</p>
						<form action="<?= base_url('home/cariTeman'); ?>" method="post">
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
										<div class="profile-data-title"><small>Angkatan :</small> Belum di isi</div>
									<?php } else { ?>
										<div class="profile-data-title"><small>Angkatan :</small> <?= $A->angkatan; ?></div>
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
								<div class="contact-info">
									<?php if ($A->no_telp == "") { ?>
										<p style="font-size: 12px;"><small>No Telp :</small> Belum di isi</p>
									<?php } else { ?>
										<p style="font-size: 12px;"><small>No Telp :</small> <?= $A->no_telp; ?></p>
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


</body>

</html>