<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Dokumen</a></li>
    <li class="active">Kelola Dokumen</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Dokumen</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-2">
            <button class="btn btn-success" data-toggle="modal" data-target="#tambahJenis">
                <i class="fa fa-plus-circle"></i>
                <span>Tambah Dokumen Baru</span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <!-- START PANEL WITH STATIC CONTROLS -->
            <div class="panel panel-default">

                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-actions datatable">
                                <thead>
                                    <tr>
                                        <th width="10">No</th>
                                        <!-- <th width="50">Nama File</th> -->
                                        <th width="100">Nama Dokumen</th>
                                        <th width="50">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dokumen as $dk) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <!-- <td><strong><?= $dk->nama_file; ?></strong></td> -->
                                            <td><strong><?= $dk->nama_dokumen; ?></strong></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info btn-rounded btn-ubah-dokumen" id="<?= $dk->id_dokumen; ?>" title="Ubah" data-toggle="modal" data-target="#ubahdokumen" id="<?= $dk->id_dokumen; ?>"><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-rounded mb-control btn-hapus-dokumen" id="<?= $dk->id_dokumen; ?>" title="Hapus" data-box="#hapusDokumen" id="<?= $dk->id_dokumen; ?>"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                <h4 class="modal-title" id="defModalHead">Tambah Dokumen</h4>
            </div>
            <form action="<?= base_url('admin/dokumen/tambahDokumen'); ?>" class="form-horizontal" id="add-jenis-validate" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Dokumen :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaDokumen" placeholder="Masukkan Nama Dokumen" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">* File Dokumen (.pdf)</label>
                        <div class="col-md-8">
                            <input type="file" class="file" id="file-simple" name="fileSaya" required />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-md-12" style="text-align: left;">
                        <label class="control-label">* harus diisi</label>

                    </div>
                    <div class="col-md-12" style="text-align: left;">
                        <label class="control-label"> * Dokumen yang di upload harus berekstensi pdf</label>

                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL TAMBAH Dokumen -->

<!-- MODALS UBAH Dokumen -->
<div class="modal animated zoomIn" id="ubahdokumen" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Ubah Dokumen</h4>
            </div>
            <form action="<?= base_url('admin/Dokumen/ubahDokumen'); ?>" class="form-horizontal" id="update-jenis-validate" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="idDokumen" id="idDokumen" required />
                            <input type="hidden" class="form-control" id="fileDokumen" name="fileDokumen" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Dokumen :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaDokumen" id="namaDokumen" placeholder="Masukkan Nama Dokumen" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">* File Dokumen (.pdf)</label>
                        <div class="col-md-8">
                            <input type="file" class="file" id="file-simples" name="fileSaya" required />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="col-md-12" style="text-align: left;">
                        <label class="control-label">* harus diisi</label>
                    </div>
                    <div class="col-md-12" style="text-align: left;">
                        <label class="control-label"> * Dokumen yang di upload harus berekstensi pdf</label>
                    </div>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL UBAH Dokumen -->

<!-- MESSAGE BOX DELETE Dokumen -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="hapusDokumen">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Dokumen</strong>
            </div>
            <form action="<?= base_url('admin/Dokumen/hapusDokumen'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p style="font-size: 16px;">Anda yakin akan menghapus Dokumen <label class="control-label" id="namaDokumenss"></label> ?</p>

                        <div class="form-group hidden">
                            <input type="text" id="idDokumens" name="idDokumen" class="form-control">
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
    $("#form-tambah-berita-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });

    $("#file-simples").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });

    $("#add-jenis-validate").validate();
    $("#update-jenis-validate").validate();

    $(".btn-ubah-dokumen").click(function() {
        console.log(this.id);
        var idDokumen = this.id;

        $.post("<?= base_url('admin/Dokumen/getDokumenById/') ?>", {
                id: idDokumen
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);
                // var FileDokumen = data_obj.anggota[0].id_dokumen;

                document.getElementById('idDokumen').value = data_obj.dokumen[0].id_dokumen;
                document.getElementById('namaDokumen').value = data_obj.dokumen[0].nama_dokumen;
                // document.getElementById('file-simples').value = data_obj.dokumen[0].nama_file;
            });
    });

    $(".btn-hapus-dokumen").click(function() {
        console.log(this.id);
        var idDokumen = this.id;

        $.post("<?= base_url('admin/Dokumen/getDokumenById') ?>", {
                id: idDokumen
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idDokumens').value = data_obj.dokumen[0].id_dokumen;
                document.getElementById('namaDokumenss').innerHTML = data_obj.dokumen[0].nama_dokumen;


            })
    });
</script>