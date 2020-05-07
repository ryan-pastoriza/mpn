{{-- pn_form_modal --}}
<div id="pn_form_modal" class="modal fade" style="overflow: scroll;">
    <div id="mod1_lg" class="modal-dialog lg">
         {{-- Modal content --}}
        <div id="mod1_content" class="modal-content">
            <div id="mod1_header" class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center>
                    <img src="{{asset('images/ama_logo.png')}}" width="200" height="80">
                </center>
            </div>
                <div id="mod1_body" class="modal-body"> 
                    <div class="card">
                        <div class="row">
                           <form id="upload_form" enctype="multipart/form-data">
                                {{-- Parent Guardian Information | With Floating Label --}}
                                <div class="col-lg-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="header">
                                        <h2>
                                            Representative
                                        </h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li>
                                                <a href="javascript:void(0);" id="reload-content-guardian" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                    <i class="material-icons">loop</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <div class="form-group form-float">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group form-float">
                                                        <div class="image-frame">
                                                            <img id="image-file" name="image-file" src="images/camera.png" alt="Guardian Picture"/>
                                                            <a type="button" data-toggle="modal" data-target="#pn_camera_modal" id="popup-camera-button" class="popup-camera-button" value="Take Photo"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="form-line"> 
                                                                <input type="text" id="sub_g_fullname" class="form-control">
                                                                <label class="form-label">Full Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-line">
                                                                <input type="text" id="sub_g_relation" class="form-control">
                                                                <label class="form-label">Relation</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-line">
                                                                <input type="text" id="sub_g_address" class="form-control">
                                                                <label class="form-label">Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-line">
                                                                <input type="text" id="sub_g_email" class="form-control">
                                                                <label class="form-label">Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-line">
                                                                <input type="text" id="sub_g_contact" class="form-control">
                                                                <label class="form-label">Contact Number</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="footer">
                                            <button type="submit" id="sumbit_promissory" class="btn btn-primary ">Submit</button>
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- #END# Parent Guardian Information | With Floating Label --}}
                                {{-- Promissory Record | With Floating Label --}}
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="header">
                                        <h2>
                                            Promissory Record <span class="label label-circle bg-green">Status</span>
                                        </h2>
                                        <ul class="header-dropdown m-r--5">
                                            <li>
                                                <a href="javascript:void(0);" id="reload-content-guardian" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                    <i class="material-icons">loop</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <div class="form-group form-float">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="sub_g_trans_num" id="sub_g_trans_num">
                                                        <label id="l_student_trans_num" class="form-label Floating">*Transaction Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">₱</i>
                                                        </span> 
                                                        <div class="form-line">
                                                            <input style="background-color: transparent;" type="number" id="sub_g_amount_digits" class="form-control" required="">
                                                            <label class="form-label Floating">*Amount in Digits</label>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <div class="form-line focused">
                                                        <input type="date" id="sub_g_date_promised" class="form-control">
                                                        <label class="form-label Floating">*Cut off date</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-line">
                                                        <input type="text" id="sub_g_amount_words" class="form-control" readonly="">
                                                        <label class="form-label Floating">Amount Promised In Words</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-line">
                                                        <input type="text" id="sub_g_remarks" class="form-control">
                                                        <label class="form-label">Remarks</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="footer">
                                        <div style="right: 0px;">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <button id="sumbit_promissory" class="btn btn-primary ">Submit</button>
                                                </div>
                                            </div> 
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- #END# Promissory Record | With Floating Label --}}
                            </form>
                        </div>
                    </div>
                    <div id="mod1_footer" class="modal-footer">
                        <button type="submit" id="sumbit_promissory" class="btn btn-primary ">Submit</button>
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