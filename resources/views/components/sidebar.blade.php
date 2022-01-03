
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">AHP System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Insert Data
            </div>

            <!-- Nav Item - Pages Static Menu -->
            <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('karyawan')}}">
                    <i class="fa fa-address-book"></i>
                    <span>Data Karyawan</span></a>
                </li>
            </li>

            <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('payout')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Gaji</span></a>
                </li>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>AHP Data</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Input AHP:</h6>
                        <a class="collapse-item" href="{{route('criteria')}}">Perbandingan Kriteria</a>
                        <a class="collapse-item" href="{{route('ratioCriteria')}}">Result Kriteria</a>
                        <a class="collapse-item" href={{route('ratioAlternative')}}>Perbandingan Karyawan</a>
                        <a class="collapse-item" href="{{route('resultAlternative')}}">Result Alternative</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>