<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?= base_url('koordinator/Berita'); ?>">Berita</a></li>
    <li class="active"><a href="<?= base_url('koordinator/Berita/kelolaKategori'); ?>">Kelola Kategori</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Kategori</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-2">
            <button class="btn btn-success" data-toggle="modal" data-target="#tambahKategori">
                <i class="fa fa-plus-circle"></i>
                <span>Tambah Kategori</span>
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
                                        <th width="50" class="text-center">No</th>
                                        <th width="100">Nama Kategori</th>
                                        <th width="50" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kategori as $k) {
                                    ?>
                                        <?php if ($k->id != 1) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><strong><?= $k->kategori; ?></strong></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-rounded btn-ubah-kategori" id="<?= $k->id; ?>" title="Ubah Kategori" data-toggle="modal" name data-target="#ubahKategori"><i class="fa fa-pencil"></i></button>
                                                    <button type="button" class="btn btn-danger btn-rounded mb-control btn-hapus-kategori" id="<?= $k->id; ?>" title="Hapus" data-box="#hapusKategori"><i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- <div class="panel-footer">

            </div> -->
            </div>
            <!-- END PANEL WITH STATIC CONTROLS -->

        </div>

    </div>
    <!-- END ROW -->

</div>
<!-- END PAGE CONTENT WRAP -->

<!-- MODALS TAMBAH KATEGORI -->
<div class="modal animated zoomIn" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Tambah Kategori</h4>
            </div>
            <form action="<?= base_url('koordinator/Berita/setAddKategori'); ?>" class="form-horizontal" id="add-kategori-validate" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Kategori :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaKategori" placeholder="Nama Kategori" required />
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
<!-- END MODAL TAMBAH KATEGORI -->

<!-- MODALS UBAH KATEGORI -->
<div class="modal animated zoomIn" id="ubahKategori" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="defModalHead">Ubah Kategori</h4>
            </div>
            <form action="<?= base_url('koordinator/Berita/setUpdateKategori'); ?>" class="form-horizontal" id="update-kategori-validate" method="post">
                <div class="modal-body">
                    <div class="form-group hidden">
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="idKategoriEdit" id="idKategoriEdit" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">* Nama Kategori :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="namaKategoriEdit" id="namaKategoriEdit" placeholder="Nama Kategori" required />
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
<!-- END MODAL UBAH KATEGORI -->

<!-- MESSAGE BOX DELETE KATEGORI -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="hapusKategori">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Kategori</strong>
            </div>
            <form action="<?= base_url('koordinator/Berita/setDeleteKategori'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p style="font-size: 16px;">Anda yakin akan menghapus kategori <label class="control-label" id="namaKategoriDelete"></label> ?</p>

                        <div class="form-group hidden">
                            <input type="text" id="idKategoriDelete" name="idKategoriDelete" class="form-control">
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
<!-- END MESSAGE BOX DELETE KATEGORI -->

<script>
    $("#add-kategori-validate").validate();
    $("#update-kategori-validate").validate();

    $(".btn-ubah-kategori").click(function() {
        console.log(this.id);
        var idKategori = this.id;

        $.post("<?= base_url('koordinator/Berita/kategoriJSON/') ?>", {
                id: idKategori
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idKategoriEdit').value = data_obj.kategori[0].id;
                document.getElementById('namaKategoriEdit').value = data_obj.kategori[0].kategori;
            });
    });

    $(".btn-hapus-kategori").click(function() {
        console.log(this.id);
        var idKategori = this.id;

        $.post("<?= base_url('koordinator/Berita/kategoriJSON') ?>", {
                id: idKategori
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idKategoriDelete').value = data_obj.kategori[0].id;
                document.getElementById('namaKategoriDelete').innerHTML = data_obj.kategori[0]
                    .kategori;
            })
    });
</script>