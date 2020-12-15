


<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png') }}">
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/dashlite.css?ver=2.0.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin-assets/css/theme.css?ver=2.0.0')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HolidayAir Admin Dashboard</title>

    @yield('css')
</head>

<body class="nk-body npc-default has-apps-sidebar has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-apps-sidebar is-dark">
            <div class="nk-apps-brand">
                <a href="{{ route('home') }}" class="logo-link">
                    <img class="logo-light logo-img" src="{{ asset('/images/logo-small.png') }}" alt="logoq">
                    <img class="logo-dark logo-img" src="{{ asset('/images/logo-dark-small.png') }}"  alt="logo-dark">
                </a>
            </div>
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body">
                    <div class="nk-sidebar-content" data-simplebar>
                        <div class="nk-sidebar-menu">
                            <!-- Menu -->
                            <ul class="nk-menu apps-menu">
                                @if (auth()->user()->isAdmin())
                                    <li class="nk-menu-item">
                                        <a href="{{ route('users.index') }}" class="nk-menu-link" title="System Users">
                                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        </a>
                                    </li>
                                @endif
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="About Us">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cc-alt"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Contact Us">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cc-alt2"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Home Covers">
                                        <span class="nk-menu-icon"><em class="icon ni ni-cc"></em></span>
                                    </a>
                                </li><!--
                                <li class="nk-menu-hr"></li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Tours Recycle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-trash"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Flights Recycle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-trash"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Hotels Recycle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-trash"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Blogs Recycle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-trash"></em></span>
                                    </a>
                                </li> -->
                                @if (auth()->user()->isAdmin())
                                    <li class="nk-menu-hr"></li>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link" title="Users Recycle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-trash"></em></span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="nk-sidebar-footer">
                            <ul class="nk-menu nk-menu-md">
                                <li class="nk-menu-item">
                                    <a href="#" class="nk-menu-link" title="Help! Prologics IT">
                                        <span class="nk-menu-icon"><em class="icon ni ni-help"></em></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                        <a href="#" data-toggle="dropdown" data-offset="50,-60">
                            <div class="user-avatar">
                                <img src="{{ Gravatar::src(auth()->user()->email) }}" >
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md ml-4">
                            <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <img src="{{ Gravatar::src(auth()->user()->email) }}" >
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ auth()->user()->name }}</span>
                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="#"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <em class="icon ni ni-signout"></em><span>{{ __('Logout') }}
                                        </span></a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-app-name">
                                <div class="nk-header-app-logo">
                                    <img class="" src="{{ asset('/images/logo-small.png') }}" style="width:20px" alt="logoq">
                                </div>
                                <div class="nk-header-app-info">
                                    <span class="sub-text">HolidayAir {{ auth()->user()->role }}</span>
                                    <span class="lead-text">Dashboard</span>
                                </div>
                            </div>
                            <div class="nk-header-menu is-light">
                                <div class="nk-header-menu-inner">
                                    <!-- Menu -->
                                    <ul class="nk-menu nk-menu-main">
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link">
                                                <span class="nk-menu-text">Tours</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link">
                                                <span class="nk-menu-text">Flight</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link">
                                                <span class="nk-menu-text">Hotel</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Menu -->
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown chats-dropdown hide-mb-xs">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-calender-date"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Recent Chats</span>
                                                <a href="#">Setting</a>
                                            </div>
                                            <div class="dropdown-body">
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="html/chats.html">View All</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown list-apps-dropdown d-lg-none">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                                            <div class="icon-status icon-status-na"><em class="icon ni ni-menu-circled"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                            <div class="dropdown-body">
                                                <ul class="list-apps">
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-light bg-purple-dim"></em></span>
                                                            <span class="list-apps-title">Tours</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-send bg-info-dim"></em></span>
                                                            <span class="list-apps-title">Flights</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-building bg-warning-dim"></em></span>
                                                            <span class="list-apps-title">Hotels</span>
                                                        </a>
                                                    </li>
                                                    @if (auth()->user()->isAdmin())
                                                        <li>
                                                            <a href="{{ route('users.index') }}">
                                                                <span class="list-apps-media"><em class="icon ni ni-users "></em></span>
                                                                <span class="list-apps-title">System Users</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-cc-alt"></em></span>
                                                            <span class="list-apps-title">Abouts Us</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-cc-alt2"></em></span>
                                                            <span class="list-apps-title">Contact Us</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="list-apps">
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-trash bg-warning-dim"></em></span>
                                                            <span class="list-apps-title">Tours Recycle</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-trash bg-success-dim"></em></span>
                                                            <span class="list-apps-title">Flights Recycle</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-trash bg-danger-dim"></em></span>
                                                            <span class="list-apps-title">Hotels Recycle</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="list-apps-media"><em class="icon ni ni-trash bg-purple-dim"></em></span>
                                                            <span class="list-apps-title">Blogs Recycle</span>
                                                        </a>
                                                    </li>
                                                    @if (auth()->user()->isAdmin())
                                                        <li>
                                                            <a href="#">
                                                                <span class="list-apps-media"><em class="icon ni ni-trash bg-danger-dim"></em></span>
                                                                <span class="list-apps-title">Users Recycle</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div><!-- .nk-dropdown-body -->
                                        </div>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <img src="{{ Gravatar::src(auth()->user()->email) }}" >
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <img src="{{ Gravatar::src(auth()->user()->email) }}" >
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ auth()->user()->name }}</span>
                                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">                                                
                                                <ul class="link-list">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        <em class="icon ni ni-signout"></em><span>{{ __('Logout') }}
                                                        </span></a>
                
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main header @e -->
                <div class="nk-sidebar" data-content="sidebarMenu">
                    <div class="nk-sidebar-inner" data-simplebar>
                        <ul class="nk-menu nk-menu-md">
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Tours Department</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="{{ route('tours.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-light"></em></span>
                                    <span class="nk-menu-text">Tours Manage</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('categories.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-menu-alt"></em></span>
                                    <span class="nk-menu-text">Tour Categories</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('countries.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                    <span class="nk-menu-text">Tour Countries</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('areas.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-map-pin"></em></span>
                                    <span class="nk-menu-text">Tour Areas</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Blog Department</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item has-sub">
                                <a href="{{ route('blogs.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-template"></em></span>
                                    <span class="nk-menu-text">Blogs Manage</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="{{ route('blogcategories.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-menu-alt"></em></span>
                                    <span class="nk-menu-text">Blog Categories</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="html/index-invest.html" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-panel"></em></span>
                                    <span class="nk-menu-text">Blog Tags</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Flight Department</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item has-sub">
                                <a href="{{ route('deals.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-send"></em></span>
                                    <span class="nk-menu-text">Deals Manage</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="{{ route('tickets.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-send"></em></span>
                                    <span class="nk-menu-text">Ticket Manage</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="{{ route('flightticketcategories.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-menu-alt"></em></span>
                                    <span class="nk-menu-text">Flight Ticket Categories</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item has-sub">
                                <a href="{{ route('airlines.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                    <span class="nk-menu-text">Airline Manage</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Hotel Department</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="{{ route('hotels.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                                    <span class="nk-menu-text">Hotel Manage</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('hotelcategories.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-menu-alt"></em></span>
                                    <span class="nk-menu-text">Hotel Categories</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="{{ route('amenities.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></em></span>
                                    <span class="nk-menu-text">Hotel Amenities</span>
                                </a>
                            </li>
                        </ul><!-- .nk-menu -->
                    </div>
                </div>
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin-assets/js/bundle.js?ver=2.0.0')}}"></script>
    <script src="{{ asset('admin-assets/js/scripts.js?ver=2.0.0')}}"></script>
    @yield('script')
</body>

</html>