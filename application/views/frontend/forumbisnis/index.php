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
            <div class="error-code">003</div>
            <div class="error-text"><h2>Agar dapat melihat Forbis harap login sebagai user!</h2></div>
            <div class="error-subtext">Tidak semua orang dapat melihat isi komunitas</div>
            <div class="error-actions">                                
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?= base_url(''); ?>" class="btn btn-info btn-block btn-lg" title="Kembali ke Beranda">Kembali ke Beranda</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Login sebagai user</button>
                    </div>
                </div>                                
            </div>
           
        </div>                 
    </body>
</html>