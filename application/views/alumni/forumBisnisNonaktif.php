<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Forum Bisnis</li>
    <li class="active"><a href="<?= base_url('alumni/ForumBisnis'); ?>">Lihat Forum Bisnis</a></li>
    <li><a href="<?= base_url('alumni/ForumBisnis/forumBisnisNonaktif'); ?>">Forum Bisnis Nonaktif</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2>Forum Bisnis Nonaktif</h2>
</div>

<?= showFlashMessage(); ?>


<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('alumni/ForumBisnis'); ?>" class="btn btn-info" style="margin-bottom: 15px;">Forum Bisnis Aktif</a>
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <p>Cari Forum Bisnis</p>
                        <form action="<?= base_url('alumni/ForumBisnis/cariForumBisnisNonAktif'); ?>" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="namaBisnis" placeholder="Temukan forum bisnis anda disini.">
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

    <div class="row">
        <?php if ($forumBisnis) : ?>
            <?php foreach ($forumBisnis as $B) : ?>

                <div class="col-md-4">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <?php if ($B->nama_foto_bisnis == NULL) { ?>
                                    <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/logo-bisnis/' . $B->nama_foto_bisnis); ?> " alt="<?= $B->nama_foto_bisnis; ?>" title="<?= $B->nama_bisnis_usaha; ?>">
                                <?php } ?>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $B->nama_bisnis_usaha; ?></div>
                            </div>
                            <div class="profile-controls">
                                <a class="profile-control-right btn-hapus-forbis" title="Hapus" id="<?= $B->id_forbis; ?>" data-toggle="modal" data-target="#hapusForbis"><span class="fa fa-trash-o"></span></a>
                            </div>
                        </div>
                        <div class="panel-body" style="height: 100%;">
                            <div class="contact-info">

                                <?php if ($B->deskripsi_bisnis == "") { ?>
                                    <p><small>Deskripsi Bisnis</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Deskripsi Bisnis</small><br><?= $B->deskripsi_bisnis; ?></p>
                                <?php } ?>

                                <?php if ($B->alamat_bisnis == "") { ?>
                                    <p><small>Alamat Bisnis</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Alamat Bisnis</small><br><?= $B->alamat_bisnis; ?></p>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- END CONTACT ITEM -->
                    </div>
                </div>
            <?php endforeach; ?>

        <?php else : ?>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center" style="margin-top: 10px;">Forum Bisnis tidak ditemukan</h2>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- MODAL DELETE FORUM BISNIS -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="hapusForbis">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Pengajuan Forum Bisnis</strong>
            </div>
            <form action="<?= base_url('alumni/ForumBisnis/setDeleteForumBisnisNonaktif'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p style="font-size: 16px;">Anda yakin akan menghapus pengajuan Forum Bisnis <label class="control-label" id="namaForumBisnisDelete"></label> ?</p>

                        <div class="form-group hidden">
                            <input type="text" id="idForbisDelete" name="idForbisDelete" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Hapus</button>
                        <a href="<?= base_url('alumni/ForumBisnis/forumBisnisNonaktif'); ?>" class="btn btn-default btn-lg">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MODAL DELETE FORUM BISNIS -->



<script>
    $("#form-ubah-berita-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });

    $(".btn-hapus-forbis").click(function() {
        var idForbis = this.id;

        $.post("<?= base_url('alumni/ForumBisnis/getForbisById/') ?>", {
                id: idForbis
            },
            function(data, success) {

                var data_obj = JSON.parse(data);

                document.getElementById('idForbisDelete').value = data_obj.forbis[0].id_forbis;
                document.getElementById('namaForumBisnisDelete').innerHTML = data_obj.forbis[0]
                    .nama_bisnis_usaha;
            })
    });
</script>