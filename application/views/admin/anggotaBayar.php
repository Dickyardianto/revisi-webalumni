<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Anggota</li>
    <li><a href="<?= base_url('admin/anggota'); ?>">Kelola Calon Anggota</li></a>
    <li><a href="<?= base_url(''); ?>">Tambah Calon Anggota</li></a>
    <li class="active"><a href="<?= base_url(''); ?>">Pembayaran Anggota</li></a>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Pembayaran Anggota</h2>
</div>

<?= showFlashMessage(); ?>

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-body">

                    <p>Formulir Pembayaran Sebagai Anggota Baru IKASMA3BDG.</p>

                    <div class="form-group">
                        <form action="<?= base_url('login/Register/createBayarInAdminLogin'); ?>" class="form-horizontal" id="form-tambah-berita-validate" method="post" enctype="multipart/form-data">
                            <div class="panel-body">
                                <div class="form-group">
                                    <input type="hidden" name="idUser" value="<?= $id_user[0]->id_anggota ?>">
                                </div>

                                <div class="col-md-12">
                                    <!-- <h5 style="color: black;">Rincian pendaftaran yang harus di bayar adalah sebagai berikut : -->
                                    <!-- </h5> -->
                                    <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
                                        <i style="color: black; float:left; font-size: large;" class="fa fa-file"></i>
                                        <p style="color: black; margin-left: 20px;">Keterangan</p>
                                        <p style="color: black;">Iuran pendaftaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp :
                                            Rp.
                                            10.000
                                            1x
                                            seumur
                                            hidup.</p>
                                        <p style="color: black;">Iuran Wajib Tahunan &nbsp;&nbsp; : Rp. 25.000.
                                        </p>
                                        <b>
                                            <p style="color: black;">Total Pembayaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp.
                                                35.000.
                                            </p>
                                        </b>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom: 20px;">
                                        <i style="color: black; float:left; font-size: large;" class="fa fa-credit-card"></i>
                                        <p style="color: black; margin-left: 23px;">Pembayaran</p>
                                        <p style="color: black;">Harap Lakukan Pembayaran Pada Nomor Rekening dibawah ini!</p>
                                        <p style="color: black;">Bank
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                            BCA</p>
                                        <p style="color: black;">No Rekening &nbsp;: 12344567890</p>
                                        <p style="color: black;">Atas Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: IKASMA3BDG</p>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom: 20px;">
                                        <p style="color: black;">Upload bukti pembayaran disini.</p>
                                        <input type="file" class="file" name="fileSaya" id="file-simple" required />
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px; margin-right: -4px;">
                                        <div class="col-md-6 pull-right">
                                            <button type="submit" class="btn btn-info">Bayar</button>
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