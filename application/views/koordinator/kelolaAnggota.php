<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Anggota</li>
    <li class="active"><a href="<?= base_url('koordinator/Anggota/kelolaAnggota'); ?>">Kelola Anggota</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Anggota</h2>
</div>

<?= showFlashMessage(); ?>

<!-- PAGE CONTENT WRAP -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <p>Cari Anggota</p>
                        <form action="<?= base_url('koordinator/Anggota/cariAnggota'); ?>" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="namaAnggota" placeholder="Siapa yang akan anda cari ?">
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
        <?php if ($anggota) : ?>
            <?php foreach ($anggota as $A) { ?>
                <div class="col-md-3">
                    <!-- CONTACT ITEM -->
                    <div class="panel panel-default">
                        <div class="panel-body profile">
                            <div class="profile-image">
                                <?php if ($A->nama_foto == NULL) { ?>
                                    <img src="<?php echo base_url('uploads/no-image.jpg'); ?> " alt="No Image" title="Default Image">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/avatars/' . $A->nama_foto); ?> " alt="<?= $A->nama_lengkap; ?>" title="<?= $A->nama_lengkap; ?>">
                                <?php } ?>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $A->nama_lengkap; ?></div>

                                <?php if ($A->status_bekerja != NULL || $A->status_bekerja != "") { ?>

                                    <?php if ($A->status_bekerja == 0 && $A->bisnis_usaha == 0) { ?>
                                        <div class="profile-data-title">Tidak Bekerja</div>
                                    <?php } else if ($A->status_bekerja == 0 && $A->bisnis_usaha == 1) { ?>
                                        <div class="profile-data-title">Tidak Bekerja / Punya Usaha</div>
                                    <?php } else { ?>
                                        <div class="profile-data-title"><?= $A->jabatan; ?></div>
                                    <?php } ?>

                                <?php } else { ?>
                                    <div class="profile-data-title">Profesi belum diisi</div>
                                <?php } ?>

                            </div>
                            <div class="profile-controls">
                                <a class="profile-control-left btn-ubah-foto-anggota" title="Ubah Foto" id="<?= $A->id_anggota; ?>" data-toggle="modal" data-target="#message-box-ubah-foto-anggota"><span class="fa fa-edit"></span></a>
                                <a class="profile-control-right btn-hapus-anggota" title="Hapus" id="<?= $A->id_anggota; ?>" data-toggle="modal" data-target="#message-box-delete-anggota"><span class="fa fa-trash-o"></span></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="contact-info">
                                <?php if ($A->no_telp == "") { ?>
                                    <p><small>Mobile</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Mobile</small><br><?= $A->no_telp; ?></p>
                                <?php } ?>

                                <?php if ($A->email == "") { ?>
                                    <p><small>Email</small><br>Belum di isi</p>
                                <?php } else { ?>
                                    <p><small>Email</small><br><?= $A->email; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <a class="btn btn-primary btn-rounded btn-block btn-ubah-anggota" title="Ubah" id="<?= $A->id_anggota; ?>" data-toggle="modal" data-target="#ubahAnggota"><span class="fa fa-edit"></span>Ubah</a>
                            <a class="btn btn-info btn-rounded btn-block btn-detail-anggota" id="<?= $A->id_anggota; ?>" title="Lihat">Lihat</a>
                        </div>
                    </div>
                    <!-- END CONTACT ITEM -->
                </div>
            <?php } ?>
        <?php else : ?>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center" style="margin-top: 10px;">Anggota tidak ditemukan</h2>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>
<!-- END PAGE CONTENT WRAP -->

<!-- MODAL UBAH FOTO -->
<div class="modal animated zoomIn" id="message-box-ubah-foto-anggota" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('koordinator/anggota/setUpdateFoto'); ?>" class="form-horizontal" id="ubah-foto-anggota-validate" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Ubah Foto</h4>
                </div>
                <div>
                    <div class="panel-body tab-content">
                        <div class="form-group hidden">
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="idUbahFotoAnggota" name="idUbahFotoAnggota" readonly>
                                <input type="text" class="form-control" id="namaUbahFotoAnggota" name="namaUbahFotoAnggota" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Foto</label>
                    <div class="col-md-8" style="margin-left: 10px; margin-top: 12px;">
                        <img id="namaFotoAnggota" src="<?= base_url('uploads/avatars/'); ?>" width="350" style="margin-bottom: 10px;" />
                        <input type="hidden" class="form-control" id="ubahFotoAnggota" name="ubahFotoAnggota" readonly />
                        <input type="file" class="file" id="file-simple" name="fileSaya" />
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
<!-- END MODAL UBAH FOTO -->

<!-- MODAL UBAH ANGGOTA -->
<div class="modal animated zoomIn" id="ubahAnggota" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('koordinator/Anggota/setUpdateAnggota'); ?>" class="form-horizontal" id="ubah-anggota-validate" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Ubah Anggota</h4>
                </div>
                <div>
                    <div class="panel panel-default tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab-data-diri" role="tab" data-toggle="tab">Data Diri</a></li>
                            <li><a href="#tab-domisili" role="tab" data-toggle="tab">Domisili</a></li>
                            <li><a href="#tab-profesi" role="tab" data-toggle="tab">Profesi</a></li>
                            <li><a href="#tab-info-program" role="tab" data-toggle="tab">Info Program</a></li>
                            <li><a href="#tab-keanggotaan" role="tab" data-toggle="tab">Keanggotaan</a></li>
                            <li><a href="#tab-akun" role="tab" data-toggle="tab">Akun</a></li>
                        </ul>

                        <div class="panel-body tab-content">

                            <!-- TAB 1 -->
                            <div class="tab-pane active" id="tab-data-diri">

                                <div class="panel-body" style="z-index: 2000;">
                                    <div class="form-group hidden">
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="idAnggota" name="idAnggota" required />
                                            <input type="text" name="idUser" id="idUser" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Nama Lengkap :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Panggilan / alias :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="panggilanAlias" id="panggilanAlias" placeholder="Nama Panggilan / Alias" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Jenis Kelamin :</label>
                                        <div class="col-md-3">
                                            <select name="jenisKelamin" id="jenisKelamin" class="validate[required] select form-control">
                                                <option value="">Pilih</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Tempat, Tanggal Lahir:</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir" required />
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control datepicker" id="tanggalLahir" name="tanggalLahir" placeholder="Tanggal Lahir" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Angkatan :</label>
                                        <div class="col-md-9">
                                            <input type="number" id="angkatan" name="angkatan" class="form-control" placeholder="Angkatan" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Golongan Darah :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="golonganDarah" name="golonganDarah" placeholder="Golongan Darah" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Telepon / Telp. Alternatif :</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon" required />
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="teleponAlternatif" name="teleponAlternatif" placeholder="No. Telepon Alternatif" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* NIK :</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Email :</label>
                                        <div class="col-md-9">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 2 -->
                            <div class="tab-pane" id="tab-domisili">

                                <div class="panel-body" style="z-index: 2000">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Negara :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="negara" name="negara" placeholder="Negara" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Provinsi :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Kabupaten / Kota :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="kabupatenKota" name="kabupatenKota" placeholder="Kabupaten / Kota" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Alamat Lengkap :</label>
                                        <div class="col-md-9">
                                            <textarea rows="5" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 3 -->
                            <div class="tab-pane" id="tab-profesi">

                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Pendidikan Terakhir :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="pendidikanTerakhir" name="pendidikanTerakhir" placeholder="Pendidikan Terakhir" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Status Bekerja :</label>
                                        <div class="col-md-9">
                                            <select class="validate[required] select form-control" name="statusBekerja" id="statusBekerja" onchange="statusBekerjaChange()">
                                                <option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bidang Industri :</label>
                                        <div class="col-md-9">
                                            <input type="text" id="bidangIndustri" class="form-control" name="bidangIndustri" placeholder="Bidang Industri" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Jabatan :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Perusahaan :</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="namaPerusahaan" name="namaPerusahaan" placeholder="Nama Perusahaan" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Bisnis / Usaha :</label>
                                        <div class="col-md-9">
                                            <select class="validate[required] select form-control" name="bisnisUsaha" id="bisnisUsaha">
                                                <option value="">Pilih</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TAB 4 -->
                            <div class="tab-pane" id="tab-info-program">

                                <div class="panel-body" style="z-index: 2000">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <input type="checkbox" id="infoProgram1" name="infoProgram1" class="icheckbox" /> <label class="check">Sosial Pendidikan</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="check"><input type="checkbox" id="infoProgram2" name="infoProgram2" class="icheckbox" checked="" /> Sosial
                                                Kemanusiaan</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="check"><input type="checkbox" id="infoProgram3" name="infoProgram3" class="icheckbox" /> Pengembangan Sarana
                                                Prasarana</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="check"><input type="checkbox" id="infoProgram4" name="infoProgram4" class="icheckbox" /> Silaturahim &
                                                Kebersamaan</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="check"><input type="checkbox" id="infoProgram5" name="infoProgram5" class="icheckbox" /> Penawaran Sponsorship /
                                                Donasi</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- TAB 5 -->
                            <div class="tab-pane" id="tab-keanggotaan">

                                <div class="panel-body" style="z-index: 2000">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="check control-label"><input type="checkbox" class="icheckbox" id="keanggotaan1" name="keanggotaan1" /> Support</label>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Iuran Pendaftaran sebesar Rp. 10.000 (sepuluh ribu rupiah) 1x seumur
                                                hidup.</p>
                                            <p>Iuran Wajib Tahunan sebesar Rp. 25.000 (dua puluh lima ribu rupiah).</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="check control-label"><input type="checkbox" class="icheckbox" id="keanggotaan2" name="keanggotaan2" /> Loyalist</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-5 control-label text-left">Iuran sukarela sebesar : Rp.
                                        </label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="iuranSukarela" name="iuranSukarela" placeholder="Masukkan jumlah uang iuran sukarela" />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- TAB 6 -->
                            <div class="tab-pane" id="tab-akun">
                                <div class="panel-body" style="z-index: 2000">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Username : </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">* Hak Akses :</label>
                                        <div class="col-md-9">
                                            <select name="hakAkses" id="hakAkses" class="validate[required] select form-control">
                                                <option value="">Pilih</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Koordinator</option>
                                                <option value="3">Anggota</option>
                                                <option value="4">Alumni</option>
                                                <option value="5">Umum</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- END TAB 6 -->

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
<!-- END MODAL UBAH ANGGOTA -->

<!-- MODAL DETAIL ANGGOTA -->

<!-- END MODAL Detail ANGGOTA -->

<!-- MODAL DELETE ANGGOTA -->
<div class="message-box message-box-danger animated zoomIn" data-sound="alert" id="message-box-delete-anggota">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-times"></span> Hapus <strong>Keanggotaan</strong>
            </div>
            <form action="<?= base_url('koordinator/Anggota/hapusAnggota'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Anda yakin akan menghapus sebagai keanggotaan IKASMA3BDG dengan identitas Anggota sebagai
                            berikut :</p>

                        <div class="form-group hidden">
                            <div class="col-md-12">
                                <input type="text" id="idAnggotaHapus" name="idAnggotaHapus" class="form-control">
                                <input type="text" id="idUserHapus" name="idUserHapus" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaAnggotaHapus"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Angkatan : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="angkatanAnggotaHapus"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Telepon : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="noTelpAnggotaHapus"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="emailAnggotaHapus"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-lg mb-control-yes">Hapus</button>
                        <a href="" class="btn btn-default btn-lg">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END MODAL DELETE ANGGOTA -->

<script>
    $("#ubah-anggota-validate").validate();
    $("#ubah-foto-anggota-validate").validate();

    $("#file-simple").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });

    $(".btn-ubah-foto-anggota").click(function() {
        console.log(this.id);
        var idUbahAnggota = this.id;

        $.post("<?= base_url('koordinator/anggota/anggotaJSON/') ?>", {
                id: idUbahAnggota
            },
            function(data) {
                var data_obj = JSON.parse(data);

                var idUbahFotoAnggota = data_obj.anggota[0].id_anggota;
                var namaUbahFotoAnggota = data_obj.anggota[0].nama_lengkap;
                var fotoAnggota = data_obj.anggota[0].nama_foto;

                document.getElementById('idUbahFotoAnggota').value = idUbahFotoAnggota;
                document.getElementById('namaFotoAnggota').src = '<?= base_url('uploads/avatars/') ?>' + fotoAnggota;
                document.getElementById('ubahFotoAnggota').value = fotoAnggota;
                document.getElementById('namaUbahFotoAnggota').value = namaUbahFotoAnggota;
            });
    });

    $(".btn-ubah-anggota").click(function() {
        console.log(this.id);
        var idAnggota = this.id;

        $.get('<?= base_url("koordinator/anggota/getAnggotaById/") ?>' + idAnggota, function(data, success) {
            console.log(data);
            var data_obj = JSON.parse(data);

            var program1 = data_obj.anggota[0].sosial_pendidikan;
            var program2 = data_obj.anggota[0].sosial_kemanusiaan;
            var program3 = data_obj.anggota[0].pengembangan_sarana_prasarana;
            var program4 = data_obj.anggota[0].silaturahim_kebersamaan;
            var program5 = data_obj.anggota[0].penawaran_sponsorship_donasi;
            var support = data_obj.anggota[0].support;
            var loyalist = data_obj.anggota[0].loyalist;
            console.log(program1 + ", " + program2 + ", " + program3 + ", " + program4 + ", " + program5);

            document.getElementById('idAnggota').value = data_obj.anggota[0].id_anggota;
            document.getElementById('idUser').value = data_obj.anggota[0].id_user;
            document.getElementById('namaLengkap').value = data_obj.anggota[0].nama_lengkap;
            document.getElementById('panggilanAlias').value = data_obj.anggota[0].nama_panggilan_alias;
            document.getElementById('angkatan').value = data_obj.anggota[0].angkatan;
            document.getElementById('tanggalLahir').value = data_obj.anggota[0].tanggal_lahir;
            document.getElementById('tempatLahir').value = data_obj.anggota[0].tempat_lahir;
            document.getElementById('golonganDarah').value = data_obj.anggota[0].golongan_darah;
            document.getElementById('telepon').value = data_obj.anggota[0].no_telp;
            document.getElementById('teleponAlternatif').value = data_obj.anggota[0].no_telp_alternatif;
            document.getElementById('nik').value = data_obj.anggota[0].NIK;
            document.getElementById('email').value = data_obj.anggota[0].email;
            document.getElementById('negara').value = data_obj.anggota[0].negara;
            document.getElementById('provinsi').value = data_obj.anggota[0].provinsi;
            document.getElementById('kabupatenKota').value = data_obj.anggota[0].kabupaten_kota;
            document.getElementById('alamat').value = data_obj.anggota[0].alamat;
            document.getElementById('pendidikanTerakhir').value = data_obj.anggota[0].pendidikan_terakhir;
            document.getElementById('bidangIndustri').value = data_obj.anggota[0].bidang_industri;
            document.getElementById('jabatan').value = data_obj.anggota[0].jabatan;
            document.getElementById('namaPerusahaan').value = data_obj.anggota[0].nama_perusahaan;
            document.getElementById('username').value = data_obj.anggota[0].username;

            // document.getElementById('infoProgram1').checked = true;
            $('#tab-info-program input[id=infoProgram1]').prop('checked', true);
            $('input[id=infoProgram1]').is(':checked');
            $('input[id=infoProgram1]').attr('checked', true);

            if (program1 == "1") {
                // $("#infoProgram1").prop("checked", true);
                // $('input.type_checkbox[id="infoProgram1"]').prop('checked', true);
                $('#tab-info-program input[id=infoProgram1]').prop('checked', true);

                console.log(true);
            } else {
                // $("#infoProgram1").prop("checked", false);
                console.log(false);
            }

            if (program2 == "1") {
                $("#infoProgram2").prop("checked", true);
            } else {
                $("#infoProgram2").prop("checked", false);
            }

            if (program3 == "1") {
                $("#infoProgram3").prop("checked", true);
            } else {
                $("#infoProgram3").prop("checked", false);
            }

            if (program4 == 1) {
                $("#infoProgram4").prop("checked", true);
            } else {
                $("#infoProgram4").prop("checked", false);
            }

            if (program5 == 1) {
                $("#infoProgram5").prop("checked", true);
            } else {
                $("#infoProgram5").prop("checked", false);
            }

            if (support == 1) {
                $("#keanggotaan1").prop("checked", true);
            } else {
                $("#keanggotaan1").prop("checked", false);
            }

            if (loyalist == 1) {
                $("#keanggotaan2").prop("checked", true);
            } else {
                $("#keanggotaan2").prop("checked", false);
            }

            $("#jenisKelamin").val(data_obj.anggota[0].jenis_kelamin).change();
            $("#statusBekerja").val(data_obj.anggota[0].status_bekerja).change();
            $("#bisnisUsaha").val(data_obj.anggota[0].bisnis_usaha).change();
            $("#hakAkses").val(data_obj.anggota[0].role).change();
        });

    });

    $(".btn-hapus-anggota").click(function() {
        console.log(this.id);
        var idAnggota = this.id;

        $.get('<?= base_url("koordinator/Anggota/getAnggotaById/"); ?>' + idAnggota, function(data) {
            var dataObj = JSON.parse(data);

            var angkatan = dataObj.anggota[0].angkatan;
            var noTelp = dataObj.anggota[0].no_telp;
            var email = dataObj.anggota[0].email;

            document.getElementById('idAnggotaHapus').value = dataObj.anggota[0].id_anggota;
            document.getElementById('idUserHapus').value = dataObj.anggota[0].id_user;
            document.getElementById('namaAnggotaHapus').innerHTML = dataObj.anggota[0].nama_lengkap;

            if (angkatan == null) {
                document.getElementById('angkatanAnggotaHapus').innerHTML = "Belum di isi";
            } else {
                document.getElementById('angkatanAnggotaHapus').innerHTML = angkatan;
            }

            if (noTelp == null) {
                document.getElementById('noTelpAnggotaHapus').innerHTML = "Belum di isi";
            } else {
                document.getElementById('noTelpAnggotaHapus').innerHTML = noTelp;
            }

            if (email == null) {
                document.getElementById('emailAnggotaHapus').innerHTML = "Belum di isi";
            } else {
                document.getElementById('emailAnggotaHapus').innerHTML = email;
            }
        });

    });

    $(".btn-detail-anggota").click(function() {
        console.log(this.id);
        var idAnggota = this.id;
        $(".btn-detail-anggota").attr("href", '<?= base_url("koordinator/Anggota/detailAnggota/"); ?>' + idAnggota);
    });

    function statusBekerjaChange() {

        var statusBekerjaValue = document.getElementById('statusBekerja').value;

        if (statusBekerjaValue == 0) {
            document.getElementById('bidangIndustri').setAttribute("disabled", "disabled");
            document.getElementById('jabatan').setAttribute("disabled", "disabled");
            document.getElementById('namaPerusahaan').setAttribute("disabled", "disabled");

            document.getElementById('bidangIndustri').removeAttribute("required");
            document.getElementById('jabatan').removeAttribute("required");
            document.getElementById('namaPerusahaan').removeAttribute("required");

            document.getElementById('bidangIndustri').value = null;
            document.getElementById('jabatan').value = null;
            document.getElementById('namaPerusahaan').value = null;
        } else {
            document.getElementById('bidangIndustri').removeAttribute("disabled");
            document.getElementById('jabatan').removeAttribute("disabled");
            document.getElementById('namaPerusahaan').removeAttribute("disabled");

            document.getElementById('bidangIndustri').setAttribute("required", "");
            document.getElementById('jabatan').setAttribute("required", "");
            document.getElementById('namaPerusahaan').setAttribute("required", "");
        }

    }
</script>