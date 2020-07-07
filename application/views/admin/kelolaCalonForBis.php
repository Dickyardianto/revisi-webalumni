<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?= base_url('admin'); ?>">Beranda</a></li>
    <li class="active"><a href="<?= base_url('admin/ForumBisnis/kelolaCalonForBis'); ?>">Kelola Calon Forum Bisnis</a>
    </li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Calon Forum Bisnis</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">


    <div class="row">

        <div class="col-md-12">

            <!-- START PANEL WITH STATIC CONTROLS -->
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Permohonan Calon Forum Bisnis</a>
                    </li>
                    <li><a href="#tab-second" role="tab" data-toggle="tab">Tambah Calon Forum Bisnis</a></li>
                </ul>


                <div class="panel-body tab-content">

                    <div class="tab-pane active" id="tab-first">
                        <p>Daftar Permohonan Calon Forum Bisnis IKASMA3BDG.</p>

                        <div class="form-group">
                            <div class="panel-body">


                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                                <th width="50">No</th>
                                                <th width="100">Logo Bisnis / Usaha</th>
                                                <th width="100">Nama Bisnis / Usaha</th>
                                                <th width="100">Pemilik</th>
                                                <th width="100">Angkatan</th>
                                                <th width="100">Alamat Bisnis / Usaha</th>
                                                <th width="100">Jenis Bisnis</th>
                                                <th width="100">No. Telepon</th>
                                                <th width="100">Url Bisnis</th>
                                                <th width="100">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($kelolaCalonForBis as $forbis) {
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <!-- <td><strong><?= $forbis->nama_foto_bisnis; ?></strong></td> -->

                                                    <?php if ($forbis->nama_foto_bisnis == null) { ?>
                                                        <td><img src="<?= base_url('uploads/no-image.jpg'); ?>" alt="<?= $forbis->nama_foto_bisnis; ?>" title="<?= $forbis->nama_foto_bisnis; ?>" width="80" /></td>
                                                    <?php } else { ?>
                                                        <td><img src="<?= base_url('uploads/logo-bisnis/' . $forbis->nama_foto_bisnis); ?>" alt="<?= $forbis->nama_foto_bisnis; ?>" title="<?= $forbis->nama_foto_bisnis; ?>" width="80" height="80" />
                                                        </td>
                                                    <?php } ?>

                                                    <td><strong><?= $forbis->nama_bisnis_usaha; ?></strong></td>
                                                    <td><?= $forbis->nama_lengkap; ?></td>
                                                    <td><?= $forbis->angkatan; ?></td>
                                                    <td><?= $forbis->alamat_bisnis; ?></td>
                                                    <td><?= $forbis->nama_jenis_bisnis; ?></td>
                                                    <td><?= $forbis->no_telp_bisnis; ?></td>
                                                    <td><a href="<?= $forbis->url_bisnis; ?>"><?= $forbis->url_bisnis; ?></a></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary mb-control btn-terima" data-box="#message-box-terima" id="<?= $forbis->id_forbis; ?>">Terima</button>
                                                        <button type="button" class="btn btn-danger mb-control btn-tolak" data-box="#message-box-tolak" id="<?= $forbis->id_forbis; ?>">Tolak</button>
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

                    <!-- Tab First Tambah Calon Forbis -->
                    <div class="tab-pane" id="tab-second">
                        <h5>Tambah Calon Forum Bisnis Baru IKASMA3BDG</h5>

                        <div class="form-group">
                            <form action="<?= base_url('admin/ForumBisnis/setAddForbis'); ?>" class="form-horizontal" id="tambah-forbis-validate" method="post" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Nama Bisnis / Usaha :</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="namaBisnisUsahaModal" placeholder="Nama Bisnis / Usaha" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Jenis Bisnis / Usaha :</label>
                                        <div class="col-md-7">
                                            <select name="jenisBisnisUsahaModal" class="validate[required] form-control select" required>
                                                <option value="">Pilih Jenis</option>
                                                <?php foreach ($jenisBisnis as $jb) { ?>
                                                    <option value="<?= $jb->id_jenis_bisnis ?>">
                                                        <?= $jb->nama_jenis_bisnis ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Deskripsi Bisnis / Usaha :</label>
                                        <div class="col-md-7">
                                            <textarea rows="5" class="form-control" name="deskripsiBisnisUsahaModal" placeholder="Deskripsi Singkat Bisnis / Usaha" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Alamat Bisnis / Usaha :</label>
                                        <div class="col-md-7">
                                            <textarea rows="5" class="form-control" name="alamatBisnisUsahaModal" placeholder="Alamat Bisnis / Usaha" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* No. Telepon :</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="noTelpBisnisUsahaModal" placeholder="No Telepon Bisnis / Usaha" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Alamat Website Bisnis :</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="urlBisnisModal" placeholder="Contoh: ikasma3bdg.com" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Pemilik :</label>
                                        <div class="col-md-7">
                                            <select name="pemilikBisnisUsahaModal" class="validate[required] form-control select">
                                                <option value="">Pilih Pemilik</option>
                                                <?php foreach ($pemilikForbis as $pf) { ?>
                                                    <option value="<?= $pf->id_anggota ?>"><?= $pf->nama_lengkap; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Foto Bisnis / Usaha :</label>
                                        <div class="col-md-7">
                                            <input type="file" id="file-simple" name="fileLogo" required />
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
                                        <li>Forum Bisnis Baru harus diverifikasi terlebih dahulu agar terdaftar sebagai
                                            Forum Bisnis aktif.</li>
                                        <li>Kecuali berita ditambahkan oleh Admin dan Koordinator akan otomatis aktif.
                                        </li>
                                        <li>Setelah di verifikasi, maka Forum Bisnis baru dapat dipublikasi di halaman
                                            user</li>
                                    </ol>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Tab First Tambah Calon Forbis -->

                </div>

            </div>
            <!-- END ROW -->

        </div>
        <!-- END PAGE CONTENT WRAP -->


        <!-- MESSAGE BOX ACCEPT CALON ANGGOTA -->
        <div class="message-box animated zoomIn" data-sound="alert" id="message-box-terima">

            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title">
                        <span class="fa fa-check"></span> Terima <strong> Sebagai Forum Bisnis baru di IKASMA3BDG
                        </strong>
                    </div>
                    <form action="<?= base_url('admin/ForumBisnis/aktivasiCalonForBis'); ?>" class="form-horizontal" method="post">
                        <div class="mb-content">
                            <div class="panel-body">
                                <p>Apakah benar bahwa Calon Forum Bisnis di bawah ini akan diaktifkan sebagai Forum
                                    Bisnis
                                    Aktif
                                    di IKASMA3BDG identitas sebagai berikut: </p><br>

                                <div class="form-group hidden">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="idCalonForbis" id="idCalonForbis" />
                                        <!-- <input type="text" class="form-control" name="idPengupload" id="idPengupload"> -->
                                        <input type="text" class="form-control" name="statForbis" id="statForbis" value="1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Calon ForBis : </label>
                                    <div class="col-md-9">
                                        <label class="control-label" id="namaCalForBis"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deskripsi Calon Bisnis : </label>
                                    <div class="col-md-9">
                                        <label class="control-label" id="deskripsiBis"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info btn-lg mb-control-yes">Terima</button>
                                <button class="btn btn-default btn-lg mb-control-close">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- END MESSAGE BOX ACCEPT CALON ANGGOTA -->

        <!-- MESSAGE BOX REJECT CALON ANGGOTA -->
        <div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-tolak">

            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title">
                        <span class="fa fa-times"></span> Tolak <strong>Calon Forum Bisnis</strong>
                    </div>
                    <form action="<?= base_url('admin/ForumBisnis/tolakCalonForBis'); ?>" class="form-horizontal" method="post">
                        <div class="mb-content">
                            <div class="panel-body">
                                <p>Anda yakin akan menolak sebagai Calon Forum Bisnis dengan identitas sebagai
                                    berikut :</p>

                                <div class="form-group hidden">
                                    <input type="text" class="form-control" name="idCalonForbisTolak" id="idCalonForbisTolak" />
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Calon ForBis : </label>
                                    <div class="col-md-9">
                                        <label class="control-label" id="namaCalForBisTolak"></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Deskripsi Calon Bisnis : </label>
                                    <div class="col-md-9">
                                        <label class="control-label" id="deskripsiBisTolak"></label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mb-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Tolak</button>
                                <button class="btn btn-default btn-lg mb-control-close">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END MESSAGE BOX REJECT CALON ANGGOTA -->



<script>
    $("#tambah-forbis-validate").validate();
    $("#ubah-forbis-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });

    $(".btn-terima").click(function() {
        console.log(this.id);
        var idForbis = this.id;

        $.post("<?= base_url('admin/ForumBisnis/getForbisById/') ?>", {
                id: idForbis
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idCalonForbis').value = data_obj.forbis[0].id_forbis;
                document.getElementById('namaCalForBis').value = data_obj.forbis[0].nama_bisnis_usaha;
                document.getElementById('namaCalForBis').innerHTML = data_obj.forbis[0]
                    .nama_bisnis_usaha;
                document.getElementById('deskripsiBis').value = data_obj.forbis[0].deskripsi_bisnis;
                document.getElementById('deskripsiBis').innerHTML = data_obj.forbis[0].deskripsi_bisnis;


            });
    });


    $(".btn-tolak").click(function() {
        console.log(this.id);
        var idForbis = this.id;

        $.post("<?= base_url('admin/ForumBisnis/getForbisById/') ?>", {
                id: idForbis
            },
            function(data, success) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idCalonForbisTolak').value = data_obj.forbis[0].id_forbis;
                document.getElementById('namaCalForBisTolak').value = data_obj.forbis[0]
                    .nama_bisnis_usaha;
                document.getElementById('namaCalForBisTolak').innerHTML = data_obj.forbis[0]
                    .nama_bisnis_usaha;
                document.getElementById('deskripsiBisTolak').value = data_obj.forbis[0]
                    .deskripsi_bisnis;
                document.getElementById('deskripsiBisTolak').innerHTML = data_obj.forbis[0]
                    .deskripsi_bisnis;


            });
    });
</script>