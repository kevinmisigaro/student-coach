<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text mx-3">
            Student Coach
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (\Illuminate\Support\Facades\Auth::user()->role == 1)
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/universities">
            <i class="far fa-fw fa-address-card"></i>
            <span>Universities</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/dashboard/coaches">
            <i class="far fa-fw fa-address-card"></i>
            <span>Coaches</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/dashboard/jobs">
            <i class="far fa-fw fa-address-card"></i>
            <span>Jobs</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/dashboard/students">
            <i class="far fa-fw fa-address-card"></i>
            <span>Students</span>
        </a>
    </li>
    @endif

    @if (\Illuminate\Support\Facades\Auth::user()->role == 2)
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/coaches">
            <i class="far fa-fw fa-address-card"></i>
            <span>Consultations</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/dashboard/jobs">
            <i class="far fa-fw fa-address-card"></i>
            <span>Jobs</span>
        </a>
    </li>
    @endif

    @if (\Illuminate\Support\Facades\Auth::user()->role == 3)
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/students">
            <i class="far fa-fw fa-address-card"></i>
            <span>Students</span>
        </a>
    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
