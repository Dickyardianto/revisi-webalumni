<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title><?= $title; ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?= base_url('assets/html/favicon.ico'); ?>" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/html/css/theme-default.css') ?>"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        <div class="error-container">
            <div class="error-code">404</div>
            <div class="error-text">page not found</div>
            <div class="error-subtext">Unfortunately we're having trouble loading the page you are looking for. Please wait a moment and try again or use action below.</div>
            <div class="error-actions">                                
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?= base_url('admin'); ?>" class="btn btn-info btn-block btn-lg" title="Kembali ke Beranda">Kembali ke Beranda</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Halaman sebelumnya</button>
                    </div>
                </div>                                
            </div>
            <div class="error-subtext">Or you can use search to find anything you need.</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" placeholder="Cari..." class="form-control"/>
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>                 
    </body>
</html>