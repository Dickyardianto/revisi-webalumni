<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?= base_url('koordinator/forumBisnis'); ?>">Forum Bisnis</a></li>
    <li class="active"><a href="<?= base_url('koordinator/ForumBisnis/kelolaJenisBisnis'); ?>">Kelola Jenis Bisnis</a>
    </li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Jenis Bisnis</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-2">
            <button class="btn btn-success" data-toggle="modal" data-target="#tambahJenis">
                <i class="fa fa-plus-circle"></i>
                <span>Tambah Jenis Bisnis</span>
            </button>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <!-- START PANEL WITH STATIC CONTROLS -->
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Jenis Bisnis</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                        Collapse</a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>

                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-actions datatable">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th width="100">Nama Jenis Bisnis / Usaha</th>
                                        <th width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jenisBisnis as $jb) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++; ?></td>
                                            <td><strong><?= $jb->nama_jenis_bisnis; ?></strong></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-rounded btn-ubah-jenis-bisnis" id="<?= $jb->id_jenis_bisnis; ?>" title="Ubah" data-toggle="modal" data-target="#ubahJenisBisnis" id="<?= $jb->id_jenis_bisnis; ?>"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-rounded mb-control btn-hapus-jenis-bisnis" id="<?= $jb->id_jenis_bisnis; ?>" title="Hapus" data-box="#hapusJenisBisnis" id="<?= $jb->id_jenis_bisnis; ?>"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">

                </div>
            </div>
            <!-- END PANEL WITH STATIC CONTROLS -->

        </div>

    </div>
    <!-- END ROW -->

</div>
<!-- END PAGE CONTENT WRAP -->

<!-- MODALS TAMBAH JENIS BISNIS -->
<div class="modal animated zoomIn" id="tambahJenis" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Tambah Jenis Bisnis</h4>
            </div>
            <form action="<?= base_url('koordinator/ForumBisnis/setAddJenisBisnis'); ?>" class="form-horizontal" id="add-jenis-validate" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Jenis Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaJenisBisnisModal" placeholder="Nama Jenis Bisnis / Usaha" required />
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
<!-- END MODAL TAMBAH JENIS BISNIS -->

<!-- MODALS UBAH JENIS BISNIS -->
<div class="modal animated zoomIn" id="ubahJenisBisnis" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Ubah Jenis Bisnis</h4>
            </div>
            <form action="<?= base_url('koordinator/ForumBisnis/setUpdateJenisBisnis'); ?>" class="form-horizontal" id="update-jenis-validate" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="idJenisBisnisEdit" id="idJenisBisnisEdit" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Jenis Bisnis / Usaha :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaJenisBisnisEdit" id="namaJenisBisnisEdit" placeholder="Nama Jenis Bisnis / Usaha" required />
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
<!-- END MODAL UBAH JENIS BISNIS -->

<!-- MESSAGE BOX DELETE JENIS BISNIS -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="hapusJenisBisnis">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Jenis Bisnis</strong>
            </div>
            <form action="<?= base_url('koordinator/ForumBisnis/setDeleteJenisBisnis'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p style="font-size: 16px;">Anda yakin akan menghapus Jenis Bisnis <label class="control-label" id="namaJenisBisnisDelete"></label> ?</p>

                        <div class="form-group hidden">
                            <input type="text" id="idJenisBisnisDelete" name="idJenisBisnisDelete" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Hapus</button>
                        <button type="button" class="btn btn-default btn-lg mb-control-close">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MESSAGE BOX DELETE JENIS BISNIS -->

<script>
    $("#add-jenis-validate").validate();
    $("#update-jenis-validate").validate();

    $(".btn-ubah-jenis-bisnis").click(function() {
        console.log(this.id);
        var idJenisBisnis = this.id;

        $.post("<?= base_url('koordinator/ForumBisnis/getJenisBisnisById/') ?>", {
                id: idJenisBisnis
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idJenisBisnisEdit').value = data_obj.jenisBisnis[0].id_jenis_bisnis;
                document.getElementById('namaJenisBisnisEdit').value = data_obj.jenisBisnis[0]
                    .nama_jenis_bisnis;
            });
    });

    $(".btn-hapus-jenis-bisnis").click(function() {
        console.log(this.id);
        var idJenisBisnis = this.id;

        $.post("<?= base_url('koordinator/ForumBisnis/getJenisBisnisById') ?>", {
                id: idJenisBisnis
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idJenisBisnisDelete').value = data_obj.jenisBisnis[0].id_jenis_bisnis;
                document.getElementById('namaJenisBisnisDelete').innerHTML = data_obj.jenisBisnis[0]
                    .nama_jenis_bisnis;
            })
    });
</script>