<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Sumernote Editor -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/summernote/summernote-bs4.css') }}">

    <!-- Fonts -->
    <link href="{{ asset('backend/assets/plugins/fontawesome-icon-picker/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/fontawesome-icon-picker/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/izitoast/css/iziToast.min.css') }}">


    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">




    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">


    @stack('style')

    @livewireStyles

</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="menu"></i></a></li>
                </ul>
            </div>

            <a class="btn btn-outline-dark mr-5" target="_blank" href="{{ route('home') }}">Visit Site</a>

            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        @if(Auth::user()->profile_photo_path != null)
                            <img alt="image" src="{{ asset('uploads/'.Auth::user()->profile_photo_path) }}" class="user-img-radious-style">
                        @else
                            <img alt="image" src="{{ asset('backend/assets/img/user.png') }}" class="">
                        @endif
                        <span class="d-sm-none d-lg-inline-block"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile</a>
                        <a href="{{ route('profile.change_password_edit') }}" class="dropdown-item has-icon"> <i class="fas fa-unlock-alt"></i>Change Password</a>
                        <div class="dropdown-divider"></div>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"> <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('backend/assets/img/dashboard-logo.png') }}" class="header-logo"></a>
                </div>
                <ul class="sidebar-menu">
                    <li class="dropdown {{ request()->is('admin') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="1nav-link"><i data-feather="grid"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown {{ request()->is('admin/category/create') ? 'active' : '' }}">
                        <a href="{{ route('category.create') }}" class="1nav-link"><i data-feather="list"></i><span>Categories</span></a>
                    </li>
                    <li class="dropdown {{ request()->is('admin/post') ? 'active' : '' }}">
                        <a href="{{ route('post.index') }}" class="1nav-link"><i data-feather="file-text"></i><span>Posts</span></a>
                    </li>
                    <li class="dropdown {{ request()->is('admin/page') ? 'active' : '' }}">
                        <a href="{{ route('page.index') }}" class="1nav-link"><i data-feather="copy"></i><span>Pages</span></a>
                    </li>
                    <li class="dropdown {{ request()->is('admin/menu') ? 'active' : '' }}">
                        <a href="{{ route('menu') }}" class="1nav-link"><i data-feather="menu"></i><span>Menu</span></a>
                    </li>
                    <li class="dropdown {{ request()->is('admin/settings') ? 'active' : '' }}">
                        <a href="{{ route('settings') }}" class="1nav-link"><i data-feather="settings"></i><span>Settings</span></a>
                    </li>

                    <br>
                    <li class="dropdown {{ request()->is('admin/clear-cache') ? 'active' : '' }}">
                        <a href="{{ url('admin/clear-cache') }}" class="1nav-link"><i data-feather="refresh-cw"></i><span>Clear Cache</span></a>
                    </li>

                </ul>
            </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</div>
<!-- General JS Scripts -->

<script src="{{ asset('backend/assets/js/app.min.js') }}"></script>



<!-- Datatable JS -->
<script src="{{ asset('backend/assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Summernote Editor JS -->
<script src="{{ asset('backend/assets/plugins/summernote/summernote-bs4.js') }}"></script>


<script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>

<script src="{{ asset('backend/assets/plugins/izitoast/js/iziToast.min.js') }}"></script>


<!-- Icon Picker JS -->
<script src="{{ asset('backend/assets/plugins/fontawesome-icon-picker/js/fontawesome-iconpicker.min.js') }}"> </script>
<!-- Template JS File -->

<script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>
<script>
    $(document).ready(function() {

    });
</script>

@stack('script')

@livewireScripts

</body>

</html>
