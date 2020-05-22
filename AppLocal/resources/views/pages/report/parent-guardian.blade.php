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
	 {{-- Morris Chart Css --}}
	<link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />
	{{-- Custom Css --}}
     <link href="{{asset('css/home/home-style.css')}}" rel="stylesheet">
     <link href="{{asset('css/photo/photo-style.css')}}" rel="stylesheet">
	{{-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes --}}
	<link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('theme'){{ config('app.theme', 'theme-blue-grey') }}@endsection

@section('form-name'){{'PARENT/GUARDIAN-REPORT'}}@endsection

@section('content')
    {{-- Parent and guardian--}}
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 style="color: #337ab7;">
                        {{-- <a target="_blank" href="{{URL('parent_guardian_report_printable')}}" class="btn waves-effect">
                            <i class="material-icons">print</i>
                            <span>Print</span>
                        </a> --}}
                        <button class="btn btn-primary waves-effect" onclick="printJ('#g_table')">
                            <i class="material-icons">print</i>
                            <span>Print</span>
                        </button>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li>
                            <a href="javascript:void(0);" id="reload-content-records" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                <i class="material-icons">loop</i>
                            </a>
                        </li>
                        <li>
                            <input list="name" type="text" class="form-control" name="student_name" id="student_name" placeholder="Search...">
                            <datalist id="name">
                            </datalist>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="g_table" class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Relation</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody id="guardian_table"></tbody>
                        </table>
                        <center><span id="message" style="color: red; font-family: roboto;font-weight: bold;"></span></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- #END# Parent and guardian --}}
@endsection

@section('scripts')
	{{-- Jquery Core Js --}}
	<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    {{-- <script src="{{asset('plugins/jquery/jquery.min.stat.js')}}"></script> --}}
	{{-- Bootstrap Core Js --}}
	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	{{-- Select Plugin Js --}}
	<script src="{{asset('plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
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
    {{-- <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script> --}}
    {{-- <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script> --}}
    <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    {{-- <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script> --}}
	{{-- Sparkline Chart Plugin Js --}}
	<script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
	{{-- Custom Js --}}
	<script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/cards/colored.js')}}"></script>
    <script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('js/custom/report/parent-report-function.js')}}"></script>
    <script src="{{asset('js/custom/printmanager/printmgr.js')}}"></script>
    {{-- Demo Js --}}
	<script src="{{asset('js/demo.js')}}"></script>
@endsection