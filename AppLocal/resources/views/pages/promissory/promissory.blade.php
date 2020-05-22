@extends('layouts.app')

@section('links')
    {{-- Waves Effect Css --}}
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
    {{-- Animation Css --}}
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />
    {{-- WaitMe Css --}}
    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet" />
    {{-- JQuery DataTable Css --}}
    <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    {{-- Custom Css --}}
    <link href="{{asset('css/home/home-style.css')}}" rel="stylesheet">
    <link href="{{asset('css/video/video-style.css')}}" rel="stylesheet">
    {{-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes --}}
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('theme'){{ config('app.theme', 'theme-blue-grey') }}@endsection
@section('form-name'){{'PROMISSORY'}}@endsection

@section('content')
    {{-- Student Search --}}
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-cyan">
                    <h2>
                        Search
                    </h2>
                </div>
                <div class="body">
                    <form class="custom-search">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <input list="name" type="text" class="form-control" name="student_name" id="student_name" placeholder="Search...">
                                <datalist id="name">
                                </datalist>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <input list="schoolyear" type="text" class="form-control" name="sub_g_sy" id="sub_g_sy" placeholder="Select....">
                                <datalist id="schoolyear">
                                    <?php
                                        $endingYear = date('Y');
                                        $startingYear = 2000;
                                        $sc = '';
                                        for ($endingYear;$endingYear >=$startingYear; $endingYear--) {
                                            $sc = strval($endingYear."-".($endingYear+1));
                                            echo '<option data-id="'.$sc.'" value="'.$sc.'" class="form-control"></option>';
                                        }
                                    ?>
                                </datalist>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                {{-- <label id="l_student_semester" class="form-label">Semester</label> --}}
                                <input list="semester" type="text" class="form-control" name="sub_g_semester" id="sub_g_semester" placeholder="Semester">
                                <datalist id="semester">
                                    <option data-id="1" value="1st semester" class="form-control"></option>
                                    <option data-id="2" value="2nd semester" class="form-control"></option>
                                </datalist>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                {{-- <label id="l_student_term" class="form-label">Term</label> --}}
                                <input list="term" type="text" class="form-control" name="sub_g_term" id="sub_g_term" placeholder="Term">
                                <datalist id="term">
                                    <option data-id="1" value="Prelim" class="form-control"></option>
                                    <option data-id="2" value="Midterm" class="form-control"></option>
                                    <option data-id="3" value="Pre Final" class="form-control"></option>
                                    <option data-id="4" value="Final" class="form-control"></option>
                                </datalist>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <button id="btn_search_student" name="btn_search_student" type="button" class="btn bg-cyan waves-effect form-control">
                                    <i class="material-icons">search</i>
                                    <span>SEARCH</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- #END# Student Search --}}

    {{-- Promissory Notes and Records | With Floating Label --}}
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="color: #337ab7;">
                        Student Records
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li>
                            <a href="javascript:void(0);" id="reload-content-records" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                <i class="material-icons">loop</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body" style="padding: 0px; margin: 0px;">
                    <div class="card">
                        <div class="row">
                            {{-- Student Information | With Floating Label --}}
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="header">
                                    <h2>
                                        Student Information
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li>
                                            <a href="javascript:void(0);" id="reload-content-student" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                <i class="material-icons">loop</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="form-group form-float">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" id="stud_fullname" class="form-control" value=" " readonly>
                                                    <label class="form-label Floating">Full Name</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-line">
                                                    <input type="text" id="stud_gender" class="form-control" value=" " readonly>
                                                    <label class="form-label">Gender</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-line">
                                                    <input type="text" id="stud_birthdate" class="form-control" value=" " readonly>
                                                    <label class="form-label Floating">Birth Date</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-line">
                                                    <input type="text" id="stud_civ_status" class="form-control" value=" " readonly>
                                                    <label class="form-label">Civil Status</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Assessment | With Floating Label --}}
                            <div class="col-lg-6 col-md-6 col-sm-6  ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="header">
                                            <h2>
                                                Assessment
                                            </h2>
                                            <ul class="header-dropdown m-r--5">
                                                <li>
                                                    <a href="javascript:void(0);" id="reload-content-payment" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                        <i class="material-icons">loop</i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-line">
                                                            <input type="text" id="assess_prelim" class="form-control" value=" " readonly>
                                                            <label class="form-label Floating">Prelim</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-line">
                                                            <input type="text" id="assess_midterm" class="form-control" value=" " readonly>
                                                            <label class="form-label">Midterm</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-line">
                                                            <input type="text" id="assess_prefi" class="form-control" value=" " readonly>
                                                            <label class="form-label">Pre Final</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-line">
                                                            <input type="text" id="assess_final" class="form-control" value=" " readonly>
                                                            <label class="form-label">Final</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-line">
                                                            <input type="text" id="assess_total_bill" class="form-control" value=" " readonly>   
                                                            <label class="form-label Floating">Total Assessment</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- #END# Assessment | With Floating Label --}}
                        </div>
                        <div class="row">
                            {{-- Old Accounts| With Floating Label --}}
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="header">
                                    <h2>
                                        Old Accounts
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li>
                                            <a href="javascript:void(0);" id="reload-content-payment" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                <i class="material-icons">loop</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="form-group form-float">
                                        <div id="old_accounts"></div>
                                    </div>
                                </div>
                            </div>
                            {{-- #END# Old Accounts | With Floating Label --}}
                        </div>
                        {{-- Application Form | With Floating Label --}}
                        <div class="card">
                            <div class="header">
                                <h2 style="color: #337ab7;">
                                    Promissory Note Application
                                </h2>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
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
                                                                        <a type="button" data-toggle="modal" data-target="#mod_camera" id="popup-camera-button" class="popup-camera-button" value="Take Photo"></a>
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
                                                        Promissory Record <!-- <span class="label label-circle bg-green">Status</span> -->
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
                                                                    <input type="date" id="sub_g_date_promised" class="bootstrapMaterialDatePicker form-control">
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
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <button id="sumbit_promissory" class="btn btn-primary form-control">Submit</button>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- #END# Promissory Record | With Floating Label --}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- #END# Application Form | With Floating Label --}}

                    </div>
                </div>
                {{-- #END# Student Information | With Floating Label --}}
                <div class="card">
                    <div class="row">
                        {{-- Promissory Record --}}
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2 style="color: #337ab7;">
                                        Promissory List
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li class="dropdown">
                                            <!-- <a href="#" data-toggle="modal" data-target="#pn_form_modal" role="button" tooltip="Add New Promissory Note">
                                                <button type="button" class="btn bg-blue waves-effect" title="Add Promissory Note">
                                                    <i class="material-icons">create</i>
                                                    <span>Add</span>
                                                </button>
                                            </a> -->
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        {{-- Uncomment for exportable data --}}
                                        {{-- <table id="promissory_table" class="table table-bordered table-striped table-hover dataTable js-exportable" width="100%"> --}}
                                        <table id="promissory_table" class="table table-bordered table-striped table-hover" width="100%">
                                            <thead>
                                                <tr style="color: #607D8B !important;">
                                                    <th>T-Number</th>
                                                    <th>Amount</th>
                                                    <th>Remarks</th>
                                                    <th>Date Filed</th>
                                                    <th>Accomplishment Date</th>
                                                    <th>Representative</th>
                                                    <th>Relation</th>
                                                    <th>Semester</th>
                                                    <th>Term</th>
                                                    <th>Shool Year</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody id="promissory_list"></tbody>
                                            {{-- <tfoot style="color: #607D8B !important;">
                                                <tr>
                                                    <th>T-Number</th>
                                                    <th>Amount</th>
                                                    <th>Remarks</th>
                                                    <th>Date Filed</th>
                                                    <th>Accomplishment Date</th>
                                                    <th>Representative</th>
                                                    <th>Relation</th>
                                                    <th>Semester</th>
                                                    <th>Term</th>
                                                    <th>Shool Year</th>
                                                </tr>
                                            </tfoot> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- #END# Promissory Record --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- #END# Promissory Notes and Records | With Floating Label  --}}
@endsection

@section('scripts')
    {{-- Jquery Core Js --}}
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    {{-- Bootstrap Core Js --}}
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
    {{-- Select Plugin Js --}}
    <script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    {{-- Bootstrap Material datetime picker --}}
    {{-- <script src="{{asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script> --}}
    {{-- Slimscroll Plugin Js --}}
    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    {{-- Waves Effect Plugin Js --}}
    <script src="{{asset('plugins/node-waves/waves.js')}}"></script>
    {{-- Wait Me Plugin Js --}}
    <script src="{{asset('plugins/waitme/waitMe.js')}}"></script>
    {{-- Sweet Alert Plugin Js --}}
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
    {{-- Jquery CountTo Plugin Js --}}
    <script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>    
    {{-- Jquery DataTable Plugin Js --}}
    <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    {{-- Sparkline Chart Plugin Js --}}
    <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    {{-- Jquery Webcam Js and Photo Validation --}}
    <script src="{{asset('js/custom/home/validate_id.js')}}"></script>
    {{-- <script src="{{asset('js/custom/video/capture.js')}}"></script> --}}
    {{-- Custom Js --}}
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('js/custom/home/home-function.js')}}"></script>
    <script src="{{asset('js/pages/cards/colored.js')}}"></script>
    {{-- Demo Js --}}
    <script src="{{asset('js/demo.js')}}"></script> s
@endsection