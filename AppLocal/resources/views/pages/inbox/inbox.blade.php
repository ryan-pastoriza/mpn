
@extends('layouts.app')

@section('links')
	{{-- Waves Effect Css --}}
	<link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
	{{-- Animation Css --}}
	<link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />
    {{-- WaitMe Css --}}
    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet" />
	{{-- Custom Css --}}
	<link href="{{asset('css/compose/compose-style.css')}}" rel="stylesheet">
	{{-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes --}}
	<link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('theme'){{ config('app.theme', 'theme-blue-grey') }}@endsection

@section('content')
<input id="page_id" value="inbox" hidden>
<div class="card">
	<div class="row clearfix">
		<form>
		    <div class="col-lg-6 col-md-6 col-sm-6 ">
		        <div class="new_message">
		            <div class="header">
		                <h2 style="color: #00bcd4;">
		                    Message
		                </h2>
		            </div>
		            <div class="body">
		            	<form>
			            	<div class="row">
			            		<div class="col-md-12">
			            			<label for="email">To: <span id="actt_name"></span></label>
			            			<img id="img_sending" src="images/loading.gif" width="20" height="20" hidden>
		            				<small id="span_sending" hidden>Sending...</small>
			            			<input type="email" id="email" name="email" class="form-control" placeholder="EmailAccount@gmail.com" required>
			            		</div>
			            	</div>
			            	<div class="row">
			            		<div class="col-md-12">
			            			<textarea id="message" name="message" class="form-control" required></textarea>
			            		</div>
			            	</div>
			            	<div class="row">
			            		<div class="col-md-5">
		            				<button id="btn_send_message" class="btn btn-info btn-md waves-effect">	
		            					{{-- <span class="glyphicon glyphicon-send"></span> --}} <i class="tiny material-icons " >send</i> Send
		            				</button>
			            		</div>
			            	</div>
		            	</form>
		            </div>
		        </div>
		    </div>
		    <div class="col-lg-6 col-md-6 col-sm-6 ">
	            <div class="messages">
	                <div class="header">
	                    <h2 style="color: #00bcd4;">Recipients</h2>
	                </div>
	                <div class="body">
	                     <div style="position: inherit; height: 300px; overflow-y: scroll;">
	                     	{{-- Mail --}}
	                     	<ul class="to_mail_list">

	                     	</ul>
	                     </div>
	                </div>
	            </div>
	        </div>
        </form>
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
	{{-- Sparkline Chart Plugin Js --}}
	<script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
	{{-- Custom Js --}}
	<script src="{{asset('js/admin.js')}}"></script>
	{{-- Page Cards --}}
    <script src="{{asset('js/pages/cards/colored.js')}}"></script>
    {{-- Script Using Email Validation and Sending... --}}
    <script src="{{asset('/js/custom/mail/message.js')}}"></script>
@endsection