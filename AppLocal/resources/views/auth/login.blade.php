@extends('layouts.login')

@section('links')
    <!-- My Custom CSS -->
    <link href="{{asset('css/custom-style.css')}}" rel="stylesheet">
    <!-- My Custom CSS -->
    <link href="{{asset('css/login/login-style.css')}}" rel="stylesheet">
@endsection

@section('theme'){{ config('app.theme', 'login-page') }}@endsection

@section('content')
{{-- Login Form --}}
<div class="wrap">
{{-- Login Form --}}
<center>
<div class="login-box">
    <div class="card">
        <div class="panel-group">
            <div class="panel">
                <div class="panel-header">
                    <div class="logo">
                        <img src="{{asset('images/logo/white bg.png')}}" class="avatar"><br>
                        <a href="javascript:void(0);">ACLC-<b>MPN</b></a>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="sign_in" method="POST" action="{{route('login')}}">
                        @csrf
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="l_input_uname" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autofocus>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="l_input_pass" name="password" placeholder="{{ __('Password') }}" required>
                            </div>
                        </div>
                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <small><strong style="color: red;">{{ $errors->first('username') }}</strong></small>
                        </span>
                        @endif

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <small><strong style="color: red;">{{ $errors->first('password') }}</strong></small>
                        </span>
                        @endif
                        <br><br>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-blue">
                                <label for="rememberme">Remember Me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-grey waves-effect" type="submit" name="login">{{ __('Login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<div class="legal">
    <div class="copyright">
        &copy; 2018 - 2019 <a >EngTech Global Solutions Inc</a>.
    </div>
</div>
<!-- #Footer -->
{{-- # End of Login Form --}}
</center>
</div>
@endsection

@section('scripts')
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection
