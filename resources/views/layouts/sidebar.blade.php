<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Akreditasi</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Program Studi -->
    <li class="nav-item {{ request()->is('program-studi') || request()->is('program-studi/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('program-studi.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Program Studi</span>
        </a>
    </li>

    <!-- Periode Akreditasi -->
    <li class="nav-item {{ request()->is('periode-akreditasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('periode-akreditasi.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Periode Akreditasi</span>
        </a>
    </li>

    <!-- Karyawan -->
    <li class="nav-item {{ request()->is('karyawan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('karyawan.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Karyawan</span>
        </a>
    </li>

    <!-- Penyelenggara Akreditasi -->
    <li class="nav-item {{ request()->is('penyelenggara-akreditasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('penyelenggara-akreditasi.index') }}">
            <i class="fas fa-fw fa-building"></i>
            <span>Penyelenggara Akreditasi</span>
        </a>
    </li>

    <!-- Instrumen Akreditasi -->
    <li class="nav-item {{ request()->is('instrumen-akreditasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('instrumen-akreditasi.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Instrumen Akreditasi</span>
        </a>
    </li>

        <!-- Kriteria -->
    <li class="nav-item {{ request()->is('kriteria*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kriteria.index') }}">
            <i class="fas fa-fw fa-list-ol"></i>
            <span>Kriteria</span>
        </a>
    </li>

    <!-- Pengisi Borang -->
    <li class="nav-item {{ request()->is('pengisi-borang*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pengisi-borang.index') }}">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Pengisi Borang</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Akun</div>

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>
