<div class="login-container">

    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <strong><?= showFlashMessage(); ?></strong>

            <form action="<?= base_url('login/Register/createBayar'); ?>" class="form-horizontal" method="post" id="form-register-anggota-validate" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="form-group">
                        <input type="hidden" name="idUser" value="<?= $id_user[0]->id_anggota ?>">
                    </div>
                    <div class="col-md-12">
                        <!-- <h5 style="color: seashell;">Rincian pendaftaran yang harus di bayar adalah sebagai berikut : -->
                        <!-- </h5> -->
                        <div class="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
                            <i style="color: seashell; float:left; font-size: large;" class="fa fa-file"></i>
                            <p style="color: seashell; margin-left: 20px;">Keterangan</p>
                            <p style="color: seashell;">Iuran pendaftaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp :
                                Rp.
                                10.000
                                1x
                                seumur
                                hidup.</p>
                            <p style="color: seashell;">Iuran Wajib Tahunan &nbsp;&nbsp; : Rp. 25.000.
                            </p>
                            <b>
                                <p style="color: seashell;">Total Pembayaran &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rp.
                                    35.000.
                                </p>
                            </b>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <i style="color: seashell; float:left; font-size: large;" class="fa fa-credit-card"></i>
                            <p style="color: seashell; margin-left: 23px;">Pembayaran</p>
                            <p style="color: seashell;">Harap Lakukan Pembayaran Pada Nomor Rekening dibawah ini!</p>
                            <p style="color: seashell;">Bank
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                BCA</p>
                            <p style="color: seashell;">No Rekening &nbsp;: 12344567890</p>
                            <p style="color: seashell;">Atas Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: IKASMA3BDG</p>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <p style="color: seashell;">Upload bukti pembayaran disini.</p>
                            <input type="file" class="file" name="fileSaya" id="file-simple" required />
                        </div>
                        <div class="form-group" style="margin-bottom: 20px; margin-right: -4px;">
                            <div class="col-md-6 pull-right">
                                <button type="submit" class="btn btn-info btn-block">Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="login-footer">
            <div class="pull-left">
                &copy; 2020 <a href="<?= base_url(); ?>" title="IKASMA3BDG">IKASMA3BDG</a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#form-register-anggota-validate").validate();

        $("#file-simple").fileinput({
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-danger",
            fileType: "any"
        });
    </script>