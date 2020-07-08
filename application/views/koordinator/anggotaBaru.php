<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Anggota</li>
    <li class="active"><a href="<?= base_url('koordinator/Anggota'); ?>">Kelola Calon Anggota</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Kelola Calon Anggota</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Permohonan Calon Anggota</a>
                    </li>
                    <li><a href="#tab-midle" role="tab" data-toggle="tab">Permohonan Calon Alumni</a>
                    </li>
                    <li><a href="#tab-second" role="tab" data-toggle="tab">Tambah Calon Anggota</a></li>
                    <li><a href="#tab-end-second" role="tab" data-toggle="tab">Tambah Calon Alumni</a></li>
                    <!-- <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Permohonan Calon Anggota</a>
                    </li>
                    <li><a href="#tab-second" role="tab" data-toggle="tab">Tambah Calon Anggota</a></li> -->
                </ul>

                <div class="panel-body tab-content">

                    <div class="tab-pane active" id="tab-first">
                        <p>Daftar Permohonan Calon Anggota IKASMA3BDG.</p>

                        <div class="form-group">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                                <th width="50">No</th>
                                                <th width="100">Foto</th>
                                                <th width="100">Bukti Pembayaran</th>
                                                <th width="100">Nama</th>
                                                <th width="100">Angkatan</th>
                                                <th width="100">No. Telepon</th>
                                                <th width="100">Email</th>
                                                <th width="100">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($calonAnggota as $CA) { ?>
                                                <tr id="trow_1">
                                                    <td class="text-center"><?= $no; ?></td>
                                                    <?php if ($CA->nama_foto == null) { ?>
                                                        <td><img src="<?= base_url('uploads/no-image.jpg'); ?>" alt="<?= $CA->nama_lengkap; ?>" title="<?= $CA->nama_lengkap; ?>" width="80" /></td>
                                                    <?php } else { ?>
                                                        <td><img src="<?= base_url('uploads/avatars/' . $CA->nama_foto); ?>" alt="<?= $CA->nama_lengkap; ?>" title="<?= $CA->nama_lengkap; ?>" width="80" height="80" /></td>
                                                    <?php } ?>

                                                    <td>
                                                        <a class="btn-lihat-foto" href="" data-toggle="modal" data-target="#message-box-lihat-foto-bayar" id="<?= $CA->id_anggota; ?>"><img src="<?= base_url('uploads/avatars/' . $CA->gambar_bukti_bayar); ?>" alt="" width="80" height="100" title="Lihat Bukti Bayar"></a>
                                                    </td>

                                                    <td><strong><?= $CA->nama_lengkap; ?></strong></td>

                                                    <?php if ($CA->angkatan == null) { ?>
                                                        <td>Belum di isi</td>
                                                    <?php } else { ?>
                                                        <td><?= $CA->angkatan; ?></td>
                                                    <?php } ?>

                                                    <!-- <td><span class="label label-success">New</span></td> -->
                                                    <?php if ($CA->no_telp == null) { ?>
                                                        <td>Belum di isi</td>
                                                    <?php } else { ?>
                                                        <td><?= $CA->no_telp; ?></td>
                                                    <?php } ?>

                                                    <?php if ($CA->email == null) { ?>
                                                        <td>Belum di isi</td>
                                                    <?php } else { ?>
                                                        <td><?= $CA->email; ?></td>
                                                    <?php } ?>

                                                    <td>
                                                        <button type="button" class="btn btn-primary mb-control btn-terima" data-box="#message-box-terima" id="<?= $CA->id_anggota; ?>">Terima</button>
                                                        <button type="button" class="btn btn-danger mb-control btn-tolak" data-box="#message-box-tolak" id="<?= $CA->id_anggota; ?>">Tolak</button>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-midle">
                        <p>Daftar Permohonan Calon Alumni IKASMA3BDG.</p>

                        <div class="form-group">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                                <th width="50">No</th>
                                                <th width="100">Foto</th>
                                                <th width="100">Nama</th>
                                                <th width="100">Angkatan</th>
                                                <th width="100">No. Telepon</th>
                                                <th width="100">Email</th>
                                                <th width="100">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($calonAlumni as $CA) { ?>
                                                <tr id="trow_1">
                                                    <td class="text-center"><?= $no; ?></td>
                                                    <?php if ($CA->nama_foto == null) { ?>
                                                        <td><img src="<?= base_url('uploads/no-image.jpg'); ?>" alt="<?= $CA->nama_lengkap; ?>" title="<?= $CA->nama_lengkap; ?>" width="80" /></td>
                                                    <?php } else { ?>
                                                        <td><img src="<?= base_url('uploads/avatars/' . $CA->nama_foto); ?>" alt="<?= $CA->nama_lengkap; ?>" title="<?= $CA->nama_lengkap; ?>" width="80" height="100" />
                                                        </td>
                                                    <?php } ?>

                                                    <td><strong><?= $CA->nama_lengkap; ?></strong></td>

                                                    <?php if ($CA->angkatan == null) { ?>
                                                        <td>Belum di isi</td>
                                                    <?php } else { ?>
                                                        <td><?= $CA->angkatan; ?></td>
                                                    <?php } ?>

                                                    <!-- <td><span class="label label-success">New</span></td> -->
                                                    <?php if ($CA->no_telp == null) { ?>
                                                        <td>Belum di isi</td>
                                                    <?php } else { ?>
                                                        <td><?= $CA->no_telp; ?></td>
                                                    <?php } ?>

                                                    <?php if ($CA->email == null) { ?>
                                                        <td>Belum di isi</td>
                                                    <?php } else { ?>
                                                        <td><?= $CA->email; ?></td>
                                                    <?php } ?>

                                                    <td>
                                                        <button type="button" class="btn btn-primary mb-control btn-terima" data-box="#message-box-terima" id="<?= $CA->id_anggota; ?>">Terima</button>
                                                        <button type="button" class="btn btn-danger mb-control btn-tolak" data-box="#message-box-tolak" id="<?= $CA->id_anggota; ?>">Tolak</button>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-second">
                        <h5>Tambah Calon Anggota Baru IKASMA3BDG</h5>

                        <div class="form-group">
                            <form action="<?= base_url('koordinator/Anggota/tambahCalonAnggota'); ?>" class="form-horizontal" id="form-tambah-anggota-validate" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Lengkap</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Panggilan / Alias</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaPanggilanAlias" placeholder="Nama Panggilan / Alias" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Lahir</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" id="dp-3" class="form-control datepicker" data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="tglLahir" placeholder="Tanggal Lahir" required />
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Angkatan / Tahun Lulus</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="angkatan" placeholder="Angkatan / Tahun Lulus" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">No Telepon</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="noTelepon" id="noTelepon" placeholder="No. Telepon" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control form-email " name="email" id="email" placeholder="Email" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto</label>
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
                                        <li>Calon Anggota Baru harus diverifikasi terlebih dahulu agar terdaftar sebagai
                                            anggota.</li>
                                        <li>Setelah di verifikasi, maka akun anggota baru dapat digunakan.</li>
                                        <li>Akun secara default menggunakan nomor telepon untuk masuk.</li>
                                    </ol>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-end-second">
                        <h5>Tambah Calon Alumni Baru IKASMA3BDG</h5>

                        <div class="form-group">
                            <form action="<?= base_url('koordinator/Anggota/tambahCalonAlumni'); ?>" class="form-horizontal" id="form-tambah-anggota-validate" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Lengkap</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nama Panggilan / Alias</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="namaPanggilanAlias" placeholder="Nama Panggilan / Alias" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tanggal Lahir</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" id="dp-3" class="form-control datepicker" data-date="06-06-2014" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="tglLahir" placeholder="Tanggal Lahir" required />
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Angkatan / Tahun Lulus</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="angkatan" placeholder="Angkatan / Tahun Lulus" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">No Telepon</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="noTelepon" id="noTelepon" placeholder="No. Telepon" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control form-email " name="email" id="email" placeholder="Email" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Foto</label>
                                        <div class="col-md-8">
                                            <input type="file" class="file" id="file-simples" name="fileSaya" required />
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
                                        <li>Calon Anggota Baru harus diverifikasi terlebih dahulu agar terdaftar sebagai
                                            anggota.</li>
                                        <li>Setelah di verifikasi, maka akun anggota baru dapat digunakan.</li>
                                        <li>Akun secara default menggunakan nomor telepon untuk masuk.</li>
                                    </ol>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- MESSAGE BOX ACCEPT CALON ANGGOTA -->
<div class="message-box animated zoomIn" data-sound="alert" id="message-box-terima" style="margin-top: -100px;">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-check"></span> Terima <strong> Sebagai Keanggotaan</strong>
            </div>
            <form action="<?= base_url('koordinator/Anggota/aktivasiCalonAnggota'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Apakah benar bahwa Calon Anggota di bawah ini akan di aktifkan sebagai Keanggotaan IKASMA3BDG
                            dan merupakan Alumni SMA 3 Bandung dengan identitas sebagai berikut: </p><br>

                        <div class="form-group hidden">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="idAnggota" id="idAnggota" />
                                <input type="text" class="form-control" name="username" id="userName">
                                <input type="password" class="form-control" name="password" id="passWord">
                                <input type="email" class="form-control" name="emailAnggotaBaru" id="emailAnggotaBaru">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Anggota : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaAnggota"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Angkatan : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="angkatanAnggota"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="emailAnggota"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Username : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="usernameAnggota"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Password : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="passwordAnggota">12345678 (default)</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keanggotaan : </label>
                            <div class="col-md-3">
                                <select name="role" id="role" class="select form-control validate[required]">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($daftarHakAkses as $hakAkses) : ?>
                                        <option value="<?= $hakAkses->id; ?>"><?= $hakAkses->role; ?></option>
                                    <?php endforeach; ?>
                                </select>
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
                <span class="fa fa-times"></span> Tolak <strong>Keanggotaan</strong>
            </div>
            <form action="<?= base_url('koordinator/Anggota/tolakCalonAnggota'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Anda yakin akan menolak sebagai keanggotaan IKASMA3BDG dengan identitas Calon Anggota sebagai
                            berikut :</p>

                        <div class="form-group hidden">
                            <input type="text" id="idCalonAnggota" name="idCalonAnggota" class="form-control">
                            <input type="email" class="form-control" name="tolakEmailAnggotaBaru" id="tolakEmailAnggotaBaru">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaCalonAnggota"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Angkatan : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="angkatanCalonAnggota"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Telepon : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="noTelpCalonAnggota"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="emailCalonAnggota"></label>
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
<!-- END MESSAGE BOX REJECT CALON ANGGOTA -->

<!-- MODAL LIHAT FOTO -->
<div class="modal animated zoomIn" id="message-box-lihat-foto-bayar" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/anggota/setUpdateFoto'); ?>" class="form-horizontal" id="ubah-foto-anggota-validate" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="defModalHead">Lihat Bukti Bayar</h4>
                </div>

                <div class="form-group">
                    <div class="col-md-8" style="margin-left: 120px; margin-top: 20px;">
                        <img id="namaFotoAnggota" src="<?= base_url('uploads/avatars/'); ?>" width="350" style="margin-bottom: 10px;" />

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL LIHAT FOTO -->

<script type="text/javascript">
    $("#form-tambah-anggota-validate").validate();

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

    $(".btn-terima").click(function() {
        console.log(this.id);
        var idAnggota = this.id;

        $.post("<?= base_url('koordinator/Anggota/anggotaJSON/'); ?>", {
                id: idAnggota
            },
            function(data) {
                var data_obj = JSON.parse(data);

                var email = data_obj.anggota[0].email;
                var angkatan = data_obj.anggota[0].angkatan;
                var noTelp = data_obj.anggota[0].no_telp;
                var namaPanggilan = data_obj.anggota[0].nama_panggilan_alias;
                var nik = data_obj.anggota[0].NIK;
                var namaLengkap = data_obj.anggota[0].nama_lengkap;

                document.getElementById('idAnggota').value = data_obj.anggota[0].id_anggota;
                document.getElementById('namaAnggota').innerHTML = namaLengkap;

                document.getElementById('angkatanAnggota').innerHTML = data_obj.anggota[0].angkatan;

                document.getElementById('emailAnggota').innerHTML = email.toLowerCase();
                document.getElementById('emailAnggotaBaru').value = email;

                if (noTelp != null) {
                    document.getElementById('usernameAnggota').innerHTML = noTelp +
                        " (Default Username & Password sesuai yang tertera)";
                    document.getElementById('userName').value = noTelp;
                    document.getElementById('passWord').value = 12345678;
                } else if (email != null) {
                    document.getElementById('usernameAnggota').innerHTML = email.toLowerCase() +
                        " (Default Username & Password sesuai yang tertera)";
                    document.getElementById('userName').value = email.toLowerCase();
                    document.getElementById('passWord').value = 12345678;
                } else if (nik != null) {
                    document.getElementById('usernameAnggota').innerHTML = nik +
                        " (Default Username & Password sesuai yang tertera)";
                    document.getElementById('userName').value = nik;
                    document.getElementById('passWord').value = 12345678;
                } else if (namaPanggilan != null) {
                    document.getElementById('usernameAnggota').innerHTML = namaPanggilan.toLowerCase() +
                        " (Default Username & Password sesuai yang tertera)";
                    document.getElementById('userName').value = namaPanggilan.toLowerCase();
                    document.getElementById('passWord').value = 12345678;
                } else if (namaLengkap != null) {
                    document.getElementById('usernameAnggota').innerHTML = namaLengkap.split(' ').join('')
                        .toLowerCase() +
                        " (Default Username & Password sesuai yang tertera)";
                    document.getElementById('userName').value = namaLengkap.split(' ').join('')
                        .toLowerCase();
                    document.getElementById('passWord').value = 12345678;
                }

            });
    });

    $(".btn-tolak").click(function() {
        console.log(this.id);
        var idCalonAnggota = this.id;

        $.post("<?= base_url('koordinator/Anggota/anggotaJSON/') ?>", {
                id: idCalonAnggota
            },
            function(data) {
                var data_obj = JSON.parse(data);
                console.log(data_obj);

                var email = data_obj.anggota[0].email;
                var angkatan = data_obj.anggota[0].angkatan;
                var noTelp = data_obj.anggota[0].no_telp;

                document.getElementById('idCalonAnggota').value = data_obj.anggota[0].id_anggota;
                document.getElementById('namaCalonAnggota').innerHTML = data_obj.anggota[0].nama_lengkap;
                document.getElementById('tolakEmailAnggotaBaru').value = data_obj.anggota[0].email;

                if (angkatan == null) {
                    document.getElementById('angkatanCalonAnggota').innerHTML = "Belum di isi";
                } else {
                    document.getElementById('angkatanCalonAnggota').innerHTML = angkatan;
                }

                if (noTelp == null) {
                    document.getElementById('noTelpCalonAnggota').innerHTML = "Belum di isi";
                } else {
                    document.getElementById('noTelpCalonAnggota').innerHTML = noTelp;
                }

                if (email == null) {
                    document.getElementById('emailCalonAnggota').innerHTML = "Belum di isi";
                } else {
                    document.getElementById('emailCalonAnggota').innerHTML = email;
                }
            });
    });

    $(".btn-lihat-foto").click(function() {
        var lihatFoto = this.id;

        $.post("<?= base_url('koordinator/anggota/anggotaJSONFoto/') ?>", {
                id: lihatFoto
            },
            function(data) {
                var data_obj = JSON.parse(data);
                var fotoAnggota = data_obj.anggota[0].gambar_bukti_bayar;
                document.getElementById('namaFotoAnggota').src = '<?= base_url('uploads/avatars/') ?>' + fotoAnggota;
            });
    });
</script>