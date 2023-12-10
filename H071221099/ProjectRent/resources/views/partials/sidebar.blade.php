<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #4F6F52">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="color: #ECE3CE">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route ('admin.dashboard.index') }}" style="color: #ECE3CE">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route ('cars.index') }}" style="color: #ECE3CE">
            <i class="fas fa-fw fa-car"></i>
            <span>Daftar Mobil</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ECE3CE">
            <i class="fas fa-envelope fa-text"></i>
            <span>Daftar Pemesanan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.messages.index') }}">Daftar Pemesanan</a>
            <a class="dropdown-item" href="#">Opsi Lain</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Opsi Lain Lagi</a>
        </div>
    </li>
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ route ('drivers.index') }}" style="color: #ECE3CE">
            <i class="fas fa-fw fa-car"></i>
            <span>Daftar Driver</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route ('admin.payments.index') }}" style="color: #ECE3CE">
            <i class="fas fa-fw fa-car"></i>
            <span>Payment</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" onclick="document.getElementById('logout-form').submit()" href="#" style="color: #ECE3CE">
            <i class="fas fa-logout fa-text"></i>
            <span>LogOut</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
            </form>
    </li>

    {{-- <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Utilities Collapse Menu -->
    

</ul>