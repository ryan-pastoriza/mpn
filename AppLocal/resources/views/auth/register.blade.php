@extends('layouts.app')

@section('links')
    {{-- Waves Effect Css --}}
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
    {{-- Animation Css --}}
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />
    {{-- WaitMe Css --}}
    <link href="{{asset('plugins/waitme/waitMe.css')}}" rel="stylesheet" />
    {{-- Custom Css --}}
     <link href="{{asset('css/home/home-style.css')}}" rel="stylesheet">
    {{-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes --}}
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('theme'){{ config('app.theme', 'theme-blue-grey') }}@endsection

@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-cyan">
                <h2>
                    {{ __('Register') }}
                </h2>
            </div>
            <div class="body">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    @if (session('Status'))
                        <span class="valid-feedback" role="alert" style="color: green;">
                            <strong>{{ session('Status')}}</strong>
                        </span>
                    @endif
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <label id="l_role" class="form-label">{{ __('User Role') }}</label>
                            <input id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" value="{{ old('role') }}" name="role" required autofocus>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <label id="l_name" class="form-label">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" name="username" required>                            
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <label id="l_name" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                             <label id="l_name" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert"  style="color: red;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
    {{-- Sparkline Chart Plugin Js --}}
    <script src="{{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    {{-- Custom Js --}}
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pages/cards/colored.js')}}"></script>
    {{-- Demo Js --}}
    <script src="{{asset('js/demo.js')}}"></script>
@endsection