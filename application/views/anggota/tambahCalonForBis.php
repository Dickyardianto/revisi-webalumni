<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Forum Bisnis</li>
    <li class="active"><a href="<?= base_url('anggota/ForumBisnis/tambahCalonForBis'); ?>">Tambah Forum Bisnis</li></a>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Tambah Forum Bisnis</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">
                    <p>Formulir Permohonan Forum Bisnis Baru IKASMA3BDG.</p>

                    <div class="form-group">
                        <form action="<?= base_url('anggota/ForumBisnis/setAddForbis'); ?>" class="form-horizontal" id="form-tambah-forbis-validate" method="post" enctype="multipart/form-data">
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">* Nama Bisnis / Usaha</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="namaBisnisUsahaModal" placeholder="Nama Forum Binis" required clear />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">* Jenis Bisnis / Usaha :</label>
                                    <div class="col-md-8">
                                        <select name="jenisBisnisUsahaModal" class="validate[required] form-control select" required>
                                            <option value="">Pilih Jenis</option>
                                            <?php foreach ($jenisBisnis as $jb) { ?>
                                                <option value="<?= $jb->id_jenis_bisnis ?>">
                                                    <?= $jb->nama_jenis_bisnis ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">* Deskripsi Bisnis / Usaha :</label>
                                    <div class="col-md-8">
                                        <textarea rows="5" class="form-control" name="deskripsiBisnisUsahaModal" placeholder="Deskripsi Singkat Bisnis / Usaha" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">* Alamat Bisnis / Usaha :</label>
                                    <div class="col-md-8">
                                        <textarea rows="5" class="form-control" name="alamatBisnisUsahaModal" placeholder="Alamat Bisnis / Usaha" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">* No. Telepon :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="noTelpBisnisUsahaModal" placeholder="No Telepon Bisnis / Usaha" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Alamat Website Bisnis :</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="urlBisnisModal" placeholder="Contoh: ikasma3bdg.com" />
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="pemilikBisnisUsahaModal" value="<?= $info[0]->id_anggota; ?>">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">* Logo Bisnis / Usaha</label>
                                    <div class="col-md-8">
                                        <input type="file" class="file" id="file-simple" name="fileLogo" required />
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
                                    <li>Tanda * Harus di isi.</li>
                                    <li>Forum bisnis yang ditambahkan akan diverifikasi terlebih dahulu oleh admin agar terdaftar sebagai forum bisnis aktif.</li>
                                    <li>Setelah di verifikasi, maka forum bisnis baru dapat ditampilkan di halaman user</li>
                                </ol>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>



<script>
    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
</script>