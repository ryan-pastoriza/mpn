@extends('layouts.app')

@section('links')
	{{-- Waves Effect Css --}}
	<link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
	{{-- Animation Css --}}
	<link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />
    {{-- WaitMe Css --}}
    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet" />
    {{-- JQuery DataTable Css --}}
    {{-- <link href="{{asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet"> --}}
	 {{-- Morris Chart Css --}}
	<link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />
	{{-- Custom Css --}}
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('css/custom-style.css')}}" rel="stylesheet"> --}}
	{{-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes --}}
	<link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('theme'){{ config('app.theme', 'theme-blue-grey') }}@endsection

@section('content')
	<div class="row clearfix">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header">
	                <h2>
	                    Notification
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
	                {{--  --}}
	            </div>
	        </div>
	    </div>
	</div>
@endsection

@section('scripts')
	{{-- Jquery Core Js --}}
	<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
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
	{{-- Sparkline Chart Plugin Js --}}
	<script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
	{{-- Custom Js --}}
	<script src="{{asset('js/admin.js')}}"></script>
@endsection