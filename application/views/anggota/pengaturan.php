<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li class="active"><a href="<?= base_url('anggota/Pengaturan'); ?>">Pengaturan</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- START CONTENT FRAME -->
<div class="content-frame">

    <!-- START CONTENT FRAME TOP -->
    <div class="content-frame-top">
        <div class="page-title">
            <h2>Pengaturan</h2>
        </div>
        <div class="pull-right">
            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
        </div>
    </div>
    <!-- END CONTENT FRAME TOP -->

    <?= showFlashMessage(); ?>

    <!-- START CONTENT FRAME LEFT -->
    <div class="content-frame-left">
        <div class="panel panel-default tabs" style="margin-top: 0px;">
            <div class="panel-body list-group border-bottom">
                <ul class="nav nav-tabs-vertical" role="tablist">
                    <li><a href="#tab-gambar-profile" role="tab" data-toggle="tab" class="list-group-item"><span class="fa fa-user"></span> Gambar Profil</a></li>
                    <li><a href="#tab-akun" role="tab" data-toggle="tab" class="list-group-item"><span class="fa fa-cog"></span> Akun</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END CONTENT FRAME LEFT -->

    <!-- START CONTENT FRAME BODY -->
    <div class="content-frame-body">
        <div class="panel panel-default tab-content">
            <div class="panel-body tab-pane active" id="tab-gambar-profile">
                <h3>Gambar Profil</h3>
                <div class="col-md-12">
                    <div class="row">
                        <?php if ($info[0]->nama_foto == null) { ?>
                            <img src="<?= base_url('uploads/no-image.jpg'); ?>" alt="<?= $info[0]->nama_lengkap; ?>" title="<?= $info[0]->nama_lengkap; ?>" width="150" />
                        <?php } else { ?>
                            <img src="<?= base_url('uploads/avatars/' . $info[0]->nama_foto); ?>" alt="<?= $info[0]->nama_lengkap; ?>" title="<?= $info[0]->nama_lengkap; ?>" width="200" />
                        <?php } ?>
                    </div>
                    <br>
                    <div class="row">
                        <form action="<?= base_url('anggota/Pengaturan/setUpdateImageProfile'); ?>" method="post" enctype="multipart/form-data" id="form-update-profile-image">
                            <div class="hidden">
                                <input type="text" name="namaPengguna" value="<?= $info[0]->nama_lengkap; ?>">
                                <input type="text" name="idPengguna" value="<?= $info[0]->id_anggota; ?>">
                            </div>
                            <input type="file" class="file" id="file-simple" name="fileSaya" required>
                            <button type="submit" class="btn btn-success" id="btn-save-image">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-body tab-pane" id="tab-akun">
                <h3>Akun</h3>
                <div class="form-group panel-body">
                    <div class="row">
                        <label class="col-md-2 control-label">Username :</label>
                        <div class="col-md-3">
                            <label class="control-label"><?= $info[0]->username; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-2 control-label">Password :</label>
                        <div class="col-md-3">
                            <label class="control-label">*********</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-info btn-username" title="Ganti" data-toggle="modal" data-target="#UbahUsernameModal">
                                <i class="fa fa-pencil-square"></i>
                                <span>Ganti Username</span>
                            </button>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-danger" title="Ganti Password" data-toggle="modal" data-target="#UbahPasswordModal" style="margin-top: 7px;">
                                <i class="glyphicon glyphicon-remove"></i>
                                <span>Ganti Password</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT FRAME BODY -->

</div>
<!-- END CONTENT FRAME -->

<!-- MODALS USERNAME -->
<div class="modal animated zoomIn" id="UbahUsernameModal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Username</h4>
            </div>
            <form action="<?= base_url('anggota/Pengaturan/setUpdateUsername') ?>" class="form-horizontal" id="username-validate" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" name="idUserUsername" value="<?= $info[0]->id_user; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Username Lama :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="<?= $info[0]->username; ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Username Baru :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="usernameBaru" placeholder="Username Baru" required />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-md-12" style="text-align: left;">
                        <label class="control-label">* harus diisi</label>
                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL USERNAME -->

<!-- MODALS PASSWORD -->
<div class="modal animated zoomIn" id="UbahPasswordModal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></a>
                <h4 class="modal-title" id="defModalHead">Password Baru</h4>
            </div>
            <form action="<?= base_url('anggota/Pengaturan/setUpdatePassword') ?>" class="form-horizontal" id="password-validate" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" name="idUserPassword" value="<?= $info[0]->id_user; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Password Lama :</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwordLama" placeholder="Password Lama" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Password Baru :</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="passwordBaru" placeholder="Password Baru" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Ulangi Password Baru :</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="ulangiPasswordBaru" placeholder="Ulangi Password Baru" required />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-md-12" style="text-align: left;">
                        <label class="control-label">* harus diisi</label>
                    </div>

                    <a href="" class="btn btn-danger">Tutup</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL PASSWORD -->

<script type="text/javascript">
    $("#username-validate").validate();
    $("#password-validate").validate();
    $("#form-update-profile-image").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
</script>