<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li class="active">Semua Frobis</li>
</ul>
<!-- END BREADCRUMB -->                       
<div class="page-title">                    
    <h2> Semua Forbis</h2>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-heading ui-draggable-handle">
                        <h3 class="panel-title">Daftar Forum</h3>
                    </div>

                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-actions">
                                <thead>
                                    <tr>
                                        <th width="50">ID</th>
                                        <th width="100">Nama Forum</th>
                                        <th width="100">status</th>
                                        <th width="100">Jumlah Komentar</th>
                                        <th width="100">Tanggal Rilis</th>
                                        <th width="100">actions</th>
                                    </tr>
                                </thead>
                                <tbody>                                            
                                    <tr id="trow_1">
                                        <td class="text-center">1</td>
                                        <td><strong>John Doe</strong></td>
                                        <td><span class="label label-success">Baru</span></td>
                                        <td>430</td>
                                        <td>24/09/2014</td>
                                        <td>
                                            <a href="<?php echo base_url('index.php/welcome/detailForbis') ?>" type="button" class="btn btn-primary">Detail</a>
                                            <button type="button" class="btn btn-danger mb-control" data-box="#message-box-danger">Tutup Forum</button>
                                        </td>
                                    </tr>
                                    <tr id="trow_2">
                                        <td class="text-center">2</td>
                                        <td><strong>Dmitry Ivaniuk</strong></td>
                                        <td><span class="label label-warning">Berjalan</span></td>
                                        <td>351</td>
                                        <td>23/09/2014</td>
                                        <td>
                                            <a href="<?php echo base_url('index.php/welcome/detailForbis') ?>" type="button" class="btn btn-primary">Detail</a>
                                            <button type="button" class="btn btn-danger mb-control" data-box="#message-box-danger">Tutup Forum</button>
                                        </td>
                                    </tr>
                                    <tr id="trow_3">
                                        <td class="text-center">3</td>
                                        <td><strong>Nadia Ali</strong></td>
                                        <td><span class="label label-info">Selesai</span></td>
                                        <td>621</td>
                                        <td>22/09/2014</td>
                                        <td>
                                            <a href="<?php echo base_url('index.php/welcome/detailForbis') ?>" type="button" class="btn btn-primary">Detail</a>
                                            <button type="button" class="btn btn-danger mb-control" data-box="#message-box-danger">Tutup Forum</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                                

                    </div>
                </div>                                                

            </div>
        </div>
    </div>

</div>

<div class="message-box message-box-danger animated fadeIn" id="message-box-danger">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Danger</div>
                    <div class="mb-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at tellus sed mauris mollis pellentesque nec a ligula. Quisque ultricies eleifend lacinia. Nunc luctus quam pretium massa semper tincidunt. Praesent vel mollis eros. Fusce erat arcu, feugiat ac dignissim ac, aliquam sed urna. Maecenas scelerisque molestie justo, ut tempor nunc.</p>
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close">Close</button>
                    </div>
                </div>
            </div>
        </div>