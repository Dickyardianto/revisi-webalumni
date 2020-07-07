<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Anggota</li>
    <li class="active"><a href="<?= base_url('koordinator/Anggota/kelolaPemulihanAnggota'); ?>">Kelola Pemulihan Anggota
    </li></a>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2>Kelola Pemulihan Anggota</h2>
</div>

<?= showFlashMessage(); ?>


<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Kelola Pemulihan Anggota</a>
                    </li>
                </ul>

                <div class="panel-body tab-content">

                    <div class="tab-pane active" id="tab-first">
                        <p>Daftar Permohonan Pemulihan Akun Anggota IKASMA3BDG.</p>

                        <div class="form-group">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-actions datatable">
                                        <thead>
                                            <tr>
                                                <th width="50">No</th>
                                                <th width="200">Username</th>
                                                <th width="200">Tanggal Permohonan</th>
                                                <th width="100">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;

                                            foreach ($pemulihan as $CA) { ?>
                                                <?php if ($CA->status_pemulihan == 0) : ?>
                                                    <tr id="trow_1">
                                                        <td class="text-center"><?= $no; ?></td>
                                                        <td><strong><?= $CA->username; ?></strong></td>
                                                        <td><strong><?= $CA->date_created; ?></strong></td>

                                                        <td>
                                                            <button type="button" class="btn btn-primary mb-control btn-terima" data-box="#message-box-terima" id="<?= $CA->id_pemulihan; ?>">Terima</button>
                                                            <button type="button" class="btn btn-danger mb-control btn-tolak" data-box="#message-box-tolak" id="<?= $CA->id_pemulihan;
                                                                                                                                                                ?>">Tolak</button>
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php
                                                $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

</div>

<!-- MESSAGE BOX ACCEPT CALON ANGGOTA -->
<div class="message-box animated zoomIn" data-sound="alert" id="message-box-terima">

    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title">
                <span class="fa fa-check"></span> Terima <strong> Pemulihan Akun Anggota baru di IKASMA3BDG </strong>
            </div>
            <form action="<?= base_url('koordinator/Anggota/aktivasiPemulihanAnggota'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Apakah benar bahwa Akun Anggota di bawah ini akan diaktifkan Pemulihan Akun Anggota di
                            IKASMA3BDG
                            dan merupakan Alumni SMA 3 Bandung dengan identitas Pemulihan berikut: </p><br>

                        <div class="form-group hidden">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="idPemulihan" id="idPemulihan" />
                                <input type="text" class="form-control" name="userId" id="userId" />
                                <input type="text" class="form-control" name="emailName" id="emailName" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama User : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaUser"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal permohonan : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="dateCreated"></label>
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
                <span class="fa fa-times"></span> Tolak <strong>Pemulihan</strong>
            </div>
            <form action="<?= base_url('koordinator/Anggota/tolakPemulihanAnggota'); ?>" class="form-horizontal" method="post">
                <div class="mb-content">
                    <div class="panel-body">
                        <p>Anda yakin akan menolak sebagai keanggotaan IKASMA3BDG dengan identitas Calon Anggota sebagai
                            berikut :</p>

                        <div class="form-group hidden">
                            <input type="text" id="idCalonPemulihan" name="idCalonPemulihan" class="form-control" value="<?= $pemulihan[0]->id_pemulihan ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Pemulihan : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="namaCalonUser"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Permohonan : </label>
                            <div class="col-md-9">
                                <label class="control-label" id="TanggalPermohonan"></label>
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

<script type="text/javascript">
    $(".btn-terima").click(function() {
        console.log(this.id);
        var idPemulihan = this.id;

        $.post("<?= base_url('koordinator/Anggota/pemulihanJSON/'); ?>", {
                id: idPemulihan
            },
            function(data) {
                console.log(data);
                var data_obj = JSON.parse(data);

                document.getElementById('idPemulihan').value = data_obj.pemulihan[0].id_pemulihan;
                document.getElementById('userId').value = data_obj.pemulihan[0].id_user;
                document.getElementById('namaUser').value = data_obj.pemulihan[0].username;
                document.getElementById('dateCreated').value = data_obj.pemulihan[0].date_created;
                document.getElementById('emailName').value = data_obj.pemulihan[0].alamat_email;

                document.getElementById('namaUser').innerHTML = data_obj.pemulihan[0].username;
                document.getElementById('dateCreated').innerHTML = data_obj.pemulihan[0].date_created;

            });
    });

    $(".btn-tolak").click(function() {
        console.log(this.id);
        var idCalonPemulihan = this.id;

        $.post("<?= base_url('koordinator/Anggota/PemulihanJSON/') ?>", {
                id: idCalonPemulihan
            },
            function(data) {
                var data_obj = JSON.parse(data);
                var namaUser = data_obj.pemulihan[0].username;
                var dateCreated = data_obj.pemulihan[0].date_created;

                document.getElementById('idCalonPemulihan').value = data_obj.pemulihan[0].id_pemulihan;
                document.getElementById('namaCalonUser').innerHTML = data_obj.pemulihan[0].username;
                document.getElementById('TanggalPermohonan').innerHTML = data_obj.pemulihan[0].date_created;

            });
    });
</script>