<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','Manging System Promissory Note') }}</title>
     {{-- Favicon --}}
    <link rel="icon" href="{{asset('images/logo/no bg.png')}}" type="image/icon">
    
    {{-- Google Fonts --}}
    <link href="{{asset('fonts/cyrillic_ext.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('fonts/Material_Icons.css')}}" rel="stylesheet" type="text/css">

    {{-- Bootstrap Core Css --}}
    {{-- <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    {{-- Custom Styles --}}
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom-style.css')}}" rel="stylesheet">
    @yield('links')
</head>
<body class="@yield('theme')">

    {{-- Page Loader --}}
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    {{-- #END# Page Loader --}}
    {{-- Promissory Note Modals --}}
    <!-- @include('pages.promissory.promissory-application') -->
    @include('pages.promissory.camera')
    {{-- #END# Promissory Note Modals --}}
    {{-- Overlay For Sidebars --}}
    <div class="overlay"></div>
    {{-- #END# Overlay For Sidebars --}}
    {{-- Top Bar --}}
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">
                    {{ config('app.name') }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    {{-- Call Search --}}
                    
                    {{-- #END# Call Search --}}
                    {{-- Navbar right content --}}
                    @yield('schoolyear')
                </ul>
            </div>
        </div>
    </nav>
    {{-- #Top Bar --}}
    <section>
        {{-- Left Sidebar --}}
        <aside id="leftsidebar" class="sidebar">
            {{-- User Info --}}
            <div class="u_info_cover">
                <div class="user-info">
                    <div class="image">
                        <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</div>
                        <div class="email">{{ Auth::user()->role }}</div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                                <li><a href="{{URL('register')}}"><i class="material-icons">group</i>Add Account</a></li>
                                <li role="separator" class="divider"></li>
                                {{-- Logout --}}
                                <li>
                                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                    </form>
                                </li>
                                {{-- #END# Logout --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- #User Info --}}
            {{-- Menu --}}
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{URL('dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL('promissory')}}">
                            <i class="material-icons">create</i>
                            <span>Promissory</span>
                        </a>
                    </li>
                    {{-- <li type="button" data-toggle="modal" data-target="#pn_form_modal" disable>
                        <a id="create_pn">
                            <i class="material-icons">note</i>
                            <span>Promissory Note</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{URL('settings')}}" onclick="return false;">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL('inbox')}}" onclick="return false;">
                            <i class="material-icons">email</i>
                            <span>Inbox</span>
                            <p style="
                                position: relative;
                                top: -1px;
                                left: 3px;
                                color:  red;
                                font-weight: bold;">522</p>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{URL('statistics')}}">
                            <i class="material-icons">pie_chart</i>
                            <span>Statistics</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{URL('notification')}}">
                            <i class="material-icons">notifications</i>
                            <span>Notification</span>
                        </a>
                    </li> --}}
                    {{-- <div id="create_pn_docker">
                        <li type="button" data-toggle="modal" data-target="#pn_form_modal" disable>
                            <a id="create_pn">
                                <i class="material-icons">create</i>
                                <span>Promissory Note</span>
                            </a>
                        </li>
                    </div> --}}
                </ul>
            </div>
            {{-- #Menu --}}
            {{-- Footer --}}
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">EngTech Global Solutions</a>.
                </div>
            </div>
            {{-- #Footer --}}
        </aside>
        {{-- #END# Left Sidebar --}}
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>@yield('form-name')</h2>
            </div>
            @yield('content')
        </div>
    </section>
    @yield('scripts')
</body>
</html>