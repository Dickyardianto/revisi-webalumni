<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Berita</li>
    <li><a href="<?= base_url('alumni/Berita'); ?>">Kelola Berita</li></a>
    <li class="active"><a href="<?= base_url('alumni/Berita/formTambahCalonBerita'); ?>">Tambah Berita</li></a>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Tambah Berita</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <p>Formulir Permohonan Berita Baru IKASMA3BDG.</p>

                    <div class="form-group">
                        <form action="<?= base_url('alumni/Berita/tambahCalonBerita'); ?>" class="form-horizontal" id="form-tambah-berita-validate" method="post" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Judul Berita</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="judulBerita" placeholder="Judul Berita" required clear />
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="idPengupload" value="<?= $info[0]->id_user ?>">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Isi Berita</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="isiBerita" placeholder="Isi Berita" rows="4" cols="50"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Sumber</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="sumberBerita" placeholder="Sumber Berita" required clear />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Credit</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="creditBerita" placeholder="Daftar nama kontributor untuk berita ini" required clear />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kategori : </label>
                                    <div class="col-md-8">
                                        <select name="idKategori" id="idKategori" class="select form-control validate[required]">
                                            <?php foreach ($daftarKategori as $kategori) : ?>
                                                <option value="<?= $kategori->id; ?>"><?= $kategori->kategori; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Foto Berita</label>
                                    <div class="col-md-8">
                                        <input type="file" class="file" id="file-simple" name="fileSaya" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-success pull-right">Simpan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <label class="text-muted">Catatan : </label>
                                <ol>
                                    <li>Berita harus diverifikasi terlebih dahulu agar terdaftar sebagai
                                        berita aktif.</li>
                                    <li>Setelah di verifikasi, maka berita dapat dipublikasi di halaman
                                        user</li>
                                </ol>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $("#form-tambah-berita-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
</script>