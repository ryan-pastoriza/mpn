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
    <link href="{{asset('css/cdn/toastr.min.css')}}" rel="stylesheet">
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
    {{-- @include('pages.promissory.promissory-application') --}}
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
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span id="notif_count" class="label-count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 254px;"><ul id="notif_menu" class="menu" style="overflow: hidden; width: auto; height: 254px;">
                                    {{-- <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class=" waves-effect waves-block">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li> --}}
                                </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 0px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </li>
                            <li class="footer">
                                <a href="{{URL('notification')}}" class=" waves-effect waves-block">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                    {{-- @yield('schoolyear') --}}
                    {{-- #END# Navbar right content --}}
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
                    <li {{-- class="active" --}}>
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
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">
                            <i class="material-icons">email</i>
                            <span>Mail</span>
                            <p id="email_count1" style="
                                position: relative;
                                top: -1px;
                                left: 3px;
                                color:  red;
                                font-weight: bold;"></p>
                        </a>
                        <ul class="ml-menu" style="display: block;">
                            <li>
                                <a href="{{URL('inbox')}}" class=" waves-effect waves-block" title="History of parent/guardian who made promissory">
                                <i class="material-icons">mail</i>
                                <span>Send Mail</span>
                                <p id="email_count2" style="
                                    position: relative;
                                    top: -1px;
                                    left: 3px;
                                    color:  red;
                                    font-weight: bold;"></p>        
                                </a>
                            </li>
                            <li>
                                <a href="{{URL('view_email_history')}}" class=" waves-effect waves-block" title="Reports of students who made promissory notes">
                                <i class="material-icons">history</i>
                                <span>Email History</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">
                            <i class="material-icons">assignment</i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu" style="display: block;">
                            <li>
                                <a href="{{URL('parent_guardian_report')}}" class=" waves-effect waves-block" title="History of parent/guardian who made promissory">
                                <i class="material-icons">people</i>
                                <span>Parent/Guardian</span>        
                                </a>
                            </li>
                            <li>
                                <a href="{{URL('promissory_report')}}" class=" waves-effect waves-block" title="Reports of students who made promissory notes">
                                <i class="material-icons">rate_review</i>
                                <span>Promissory</span>
                                </a>
                            </li>
                        </ul>
                    </li>
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
        {{-- Left Sidebar --}}
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="settings">
                    <div class="slimScrollDiv">
                        <div class="demo-settings">
                            <p title="Select months for active system status">Security Settings</p>
                            <ul class="setting-list">
                                <li>
                                    <span>January</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>February</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>March</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>April</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>May</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>June</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>July</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>August</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>September</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>October</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>November</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                                <li>
                                    <span>December</span>
                                    <div class="switch">
                                        <label><input type="checkbox"><span class="lever"></span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="slimScrollBar"></div>
                        <div class="slimScrollRail"></div>
                    </div>
                </div>
            </div>
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
    <script src="{{asset('js/custom/global/init_elements.js')}}"></script>
    @yield('scripts')
    <script src="{{asset('js/custom/global/init.js')}}"></script>
    <script src="{{asset('js/cdn/js/toastr.min.js')}}"></script>
</body>
</html>