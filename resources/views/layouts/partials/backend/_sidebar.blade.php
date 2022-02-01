<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Ringkasan</div>
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Menu utama</div>
                    <div class="sb-sidenav-menu-heading">Menu sistem</div>
                    <a class="nav-link" href="{{ route('profile.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Profile
                    </a>
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Pengguna
                    </a>
                    <a class="nav-link" href="{{ route('setting.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        Pengaturan
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->name }}
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
