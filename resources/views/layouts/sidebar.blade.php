<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/dashboard" class="logo-wrapper text-center" title="Home">
                <span class="sr-only">Home</span>
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="icon-logo" />

            </a>
            {{-- <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button> --}}
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a href="{{ url('dashboard') }}"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('data-user') }}"><span class="icon fa-solid fa-users fa-xl"
                            aria-hidden="true"></span>Data User</a>
                </li>
                <li>
                    <a href="{{ url('data-guru') }}"><span class="icon fa-solid fa-chalkboard-user fa-xl"
                            aria-hidden="true"></span>Data Guru</a>
                </li>
                <li>
                    <a href="{{ url('data-periode') }}"><span class="icon fa-solid fa-calendar-days fa-xl"
                            aria-hidden="true"></span>Periode</a>
                </li>
                <li>
                    <a href="{{ url('data-kriteria') }}"><span class="icon fa-solid fa-sitemap fa-xl"
                            aria-hidden="true"></span>Kriteria</a>
                </li>
                <li>
                    <a href="{{ url('penilaian') }}"><span class="icon fa-solid fa-file-pen fa-xl"
                            aria-hidden="true"></span>Penilaian</a>
                </li>
                <li>
                    <a href="{{ url('perhitungan') }}"><span class="icon fa-solid fa-diagram-project fa-xl"
                            aria-hidden="true"></span>Perhitungan</a>
                </li>
                <li>
                    <a href="{{ url('perangkingan') }}"><span class="icon fa-solid fa-ranking-star fa-xl"
                            aria-hidden="true"></span>Perangkingan</a>
                </li>
            </ul>
            {{-- <span class="system-menu__title">system</span> --}}
        </div>
    </div>
</aside>
