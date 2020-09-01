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

@section('form-name'){{'DASHBOARD'}}@endsection

@section('content')
    <input id="page_id" value="dashboard" hidden>
    @include('pages.dashboard.statistics')
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
    <!-- Morris Plugin Js -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morrisjs/morris.js')}}"></script>
	{{-- Custom Js --}}
	<script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/charts/morris.js')}}"></script>
    <script src="{{asset('js/pages/cards/colored.js')}}"></script>
    <script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('js/custom/printmanager/printmgr.js')}}"></script>
    {{-- Demo Js --}}
	<script src="{{asset('js/demo.js')}}"></script>
@endsection