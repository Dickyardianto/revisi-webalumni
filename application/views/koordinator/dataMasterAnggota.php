<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li>Anggota</li>
    <li class="active"><a href="<?= base_url('koordinator/Anggota/dataMaster'); ?>">Data Anggota Master</a></li>
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">                    
    <h2> Data Master Anggota IKASMA3BDG</h2>
</div>

<div class="page-content-wrap">

    <div class="row">

        <!-- <div class="col-md-12"> -->

            <!-- START PANEL WITH STATIC CONTROLS -->
            <!-- <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Calon Anggota IKASMA3BDG</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-cog"></span></a>                                            
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                            </ul>                                        
                        </li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                        
                <form class="form-horizontal" role="form">
                    <div class="panel-body panel-body-table">
                        <div class="panel-body">
                            <div class="block">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Lengkap</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Panggilan / Alias</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="namaPanggilanAlias" placeholder="Nama Panggilan / Alias" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Angkatan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Alamat</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">No Telepon</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>                                      
                                                                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Foto</label>
                                    <div class="col-md-8">
                                        <input type="file" multiple class="file" data-preview-file-type="any"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel-footer">
                        <button class="btn btn-primary pull-right">Simpan</button>
                    </div>
                </form>
            </div> -->
            <!-- END PANEL WITH STATIC CONTROLS -->

        <!-- </div> -->

        <div class="col-md-12">

            <!-- START PANEL WITH STATIC CONTROLS -->
            <div class="panel panel-default">
                <div class="panel-heading ui-draggable-handle">
                    <h3 class="panel-title">Data Master</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="fa fa-cog"></span></a>                                            
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                        
                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-actions datatable">
                                <thead>
                                    <tr>
                                        <th width="50">No</th>
                                        <th width="100">Foto</th>
                                        <th width="100">Nama Lengkap</th>
                                        <th width="100">Panggilan / Alias</th>
                                        <th width="100">NIK</th>
                                        <th width="100">Angkatan</th>
                                        <th width="100">Jenis Kelamin</th>
                                        <th width="100">Tempat Lahir</th>
                                        <th width="100">Tanggal Lahir</th>
                                        <th width="100">Golongan Darah</th>
                                        <th width="100">No. Telepon</th>
                                        <th width="100">No. Telepon Alternatif</th>
                                        <th width="100">Email</th>
                                        <th width="100">Negara</th>
                                        <th width="100">Provinsi</th>
                                        <th width="100">Kab / Kota</th>
                                        <th width="100">Alamat</th>
                                        <th width="100">Pendidikan Terakhir</th>
                                        <th width="100">Status Bekerja</th>
                                        <th width="100">Bidang Industri</th>
                                        <th width="100">Jabatan</th>
                                        <th width="100">Nama Perusahaan</th>
                                        <th width="100">Bisnis / Usaha</th>
                                        <th width="100">Sosial Pendidikan</th>
                                        <th width="100">Sosial Kemanusiaan</th>
                                        <th width="100">Pengembangan Sarana & Prasarana</th>
                                        <th width="100">Silaturahim & Kebersamaan</th>
                                        <th width="100">Penawaran Sponsorship / Donasi</th>
                                        <th width="100">Support</th>
                                        <th width="100">Loyalist</th>
                                        <th width="100">Iuran Sukarela</th>
                                        <!-- <th width="100">actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($dataMaster as $data) { 
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        
                                        <?php if ($data->nama_foto === NULL) { ?>
                                        <td><img src="<?php echo base_url('uploads/no-image.jpg'); ?>" width="70" alt="Default Image" title="Default Image"></td>
                                        <?php } else { ?>
                                        <td><img src="<?php echo base_url('uploads/'.$data->nama_foto); ?>" width="70" alt="<?= $data->nama_lengkap; ?>" title="<?= $data->nama_lengkap; ?>"></td>
                                        <?php } ?>
                                        
                                        <td><strong><?= $data->nama_lengkap; ?></strong></td>
                                        <td><?= $data->nama_panggilan_alias; ?></td>
                                        <td><?= $data->NIK; ?></td>
                                        <td><?= $data->angkatan; ?></td>
                                        <td><?= $data->jenis_kelamin; ?></td>
                                        <td><?= $data->tempat_lahir; ?></td>
                                        <td><?= $data->tanggal_lahir; ?></td>
                                        <td><?= $data->golongan_darah; ?></td>
                                        <td><?= $data->no_telp; ?></td>
                                        <td><?= $data->no_telp_alternatif; ?></td>
                                        <td><?= $data->email; ?></td>
                                        <td><?= $data->negara; ?></td>
                                        <td><?= $data->provinsi; ?></td>
                                        <td><?= $data->kabupaten_kota; ?></td>
                                        <td><?= $data->alamat; ?></td>
                                        <td><?= $data->pendidikan_terakhir; ?></td>
                                        <td><?= $data->status_bekerja; ?></td>
                                        <td><?= $data->bidang_industri; ?></td>
                                        <td><?= $data->jabatan; ?></td>
                                        <td><?= $data->nama_perusahaan; ?></td>
                                        <td><?= $data->bisnis_usaha; ?></td>
                                        <td><?= $data->sosial_pendidikan; ?></td>
                                        <td><?= $data->sosial_kemanusiaan; ?></td>
                                        <td><?= $data->pengembangan_sarana_prasarana; ?></td>
                                        <td><?= $data->silaturahim_kebersamaan; ?></td>
                                        <td><?= $data->penawaran_sponsorship_donasi; ?></td>
                                        <td><?= $data->support; ?></td>
                                        <td><?= $data->loyalist; ?></td>
                                        <td><?= $data->iuran_sukarela; ?></td>
                                        <!-- <td>
                                            <button class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"></span></button>
                                            <button class="btn btn-danger btn-rounded btn-sm" onclick="delete_row('trow_1');"><span class="fa fa-times"></span></button>
                                        </td> -->
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>                                
                </div>      
                
                <div class="panel-footer">
                
                </div>
            </div>
            <!-- END PANEL WITH STATIC CONTROLS -->

        </div>
        
    </div>
    <!-- END ROW -->

</div>
<!-- END PAGE CONTENT WRAP -->