<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pemilihan Guru Terbaik</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon" />
    <!-- Custom styles -->
    @include('layouts.style')

    <style>
        svg {
            width: 1em !important;
            height: auto !important;
        }

        .icon-logo {
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            height: auto;
        }

        .dataTables_wrapper {
            width: 100%;
        }
    </style>

</head>

<body class="w-100">
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        @include('layouts.sidebar')

        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                        <h5>Sistem Pemilihan Guru Terbaik SMKN 1 Jetis</h5>
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>

                        {{-- <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button> --}}

                        <div class="nav-user-wrapper">
                            <button href="#" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                                <span class="sr-only">My profile</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <source srcset="{{ asset('img/avatar/avatar-illustrated-02.webp') }}"
                                            type="image/webp" />
                                        <img src="./img/avatar/avatar-illustrated-02.png" alt="User name" />
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li>
                                    <form action="{{ url('logout') }}" class="d-inline" method="POST">
                                        @csrf
                                        <button class="btn btn-link text-decoration-none text-default" type="submit">
                                            <i data-feather="log-out" aria-hidden="true"></i>
                                            <span>Log out</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users p-3" id="skip-target">
                @yield('content')
            </main>
            <!-- ! Footer -->
            {{-- @include('layouts.footer') --}}
        </div>
    </div>

    @include('layouts.script')
    @yield('script')

</body>

</html>
