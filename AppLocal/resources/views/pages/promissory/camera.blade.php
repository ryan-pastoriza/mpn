{{-- pn_camera_modal --}}
<div id="mod_camera" class="modal fade">
    <div class="modal-dialog lg">
         {{-- Modal content --}}
        <div class="modal-content">
            <div class="modal-header">
                <button id="mod-close" type="button" class="close" data-dismiss="modal" style="color: red;">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12"> 
                        <br><br>
                        <center>
                            <div id="dv1">    
                                <div id="video"></div>
                                <a href="#" type="button" id="capture" class="booth-capture-button" value="Take Photo">Take Photo</a>
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <br><br>
                        <center>
                            <div id="dv2">
                                <img id="tmp_img" src="images/admin-logo-grey.png"/>
                                <a href="#" type="button" id="save" class="booth-capture-button" value="Save Image">Save Image</a>
                            </div>
                        </center>
                    </div>
                </div>
                <div id="mod1_footer" class="modal-footer">
                    {{-- Footer --}}
                    <center>
                        <br><br><br><br>
                        <div class="legal">
                            <div class="copyright">
                                &copy; 2018 - 2019 <a href="javascript:void(0);">EngTech Global Solutions</a>.
                            </div>
                        </div>
                    </center>
                    {{-- #Footer --}}
                </div>
            </div>
        </div>
    </div>
</div>