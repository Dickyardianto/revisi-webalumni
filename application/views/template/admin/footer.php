        </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX SIGN-OUT -->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?= base_url('logout'); ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX SIGN-OUT -->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?php echo base_url('assets/html/audio/alert.mp3') ?>" preload="auto"></audio>
        <audio id="audio-fail" src="<?php echo base_url('assets/html/audio/fail.mp3') ?>" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
        <!-- START SCRIPTS -->
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/bootstrap/bootstrap.min.js') ?>"></script>
        
        <!-- START THIS PAGE PLUGINS-->
        <script type='text/javascript' src="<?php echo base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/scrolltotop/scrolltopcontrol.js') ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/morris/raphael-min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/morris/morris.min.js') ?>"></script>       
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/rickshaw/d3.v3.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/rickshaw/rickshaw.min.js') ?>"></script>
        <script type='text/javascript' src='<?php echo base_url('assets/html/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>'></script>
        <script type='text/javascript' src='<?php echo base_url('assets/html/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>'></script>                
        <script type='text/javascript' src='<?php echo base_url('assets/html/js/plugins/bootstrap/bootstrap-datepicker.js') ?>'></script>                
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/owl/owl.carousel.min.js') ?>"></script>                 
        
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/moment.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/daterangepicker/daterangepicker.js') ?>"></script>
        <!-- END THIS PAGE PLUGINS--> 

        <!-- TAB  PLUGINS -->
        <script type='text/javascript' src='<?php echo base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>'></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/bootstrap/bootstrap-file-input.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/bootstrap/bootstrap-select.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/tagsinput/jquery.tagsinput.min.js') ?>"></script>
        <!-- TAB PLUGINS -->    

        <!--TABLE PLUGINS -->
        <script type='text/javascript' src='<?php echo base_url('assets/html/js/plugins/icheck/icheck.min.js') ?>'></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/datatables/jquery.dataTables.min.js') ?>"></script>    
        <!--TABLE PLUGINS -->  

        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/dropzone/dropzone.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/fileinput/fileinput.min.js') ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins/filetree/jqueryFileTree.js'); ?>"></script>    

        <!-- START TEMPLATE -->
        <!-- <script type="text/javascript" src="<?php echo base_url('assets/html/js/settings.js') ?>"></script> -->
        
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/plugins.js') ?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/actions.js') ?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/html/js/demo_dashboard.js') ?>"></script>
        <!-- END TEMPLATE -->

        <script type="text/javascript" src="<?php echo base_url('assets/html/js/custom-javascript.js'); ?>"></script>

    <!-- END SCRIPTS --> 

    </body>
</html>