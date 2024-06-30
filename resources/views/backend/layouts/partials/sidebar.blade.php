<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Account)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <div class="sidenav-menu-heading d-sm-none">Account</div>
            <!-- Sidenav Link (Alerts)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                Alerts
                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
            </a>
            <!-- Sidenav Link (Messages)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Messages
                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
            </a>

            <!-- Sidenav Menu Heading (Roles)-->
            <div class="sidenav-menu-heading">Roles</div>
            <!-- Sidenav Accordion (Roles)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseRoles" aria-expanded="false" aria-controls="collapseRoles">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Roles & Permission
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseRoles" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('admin.roles.index')}}">
                        All Roles
                    </a>
                    <a class="nav-link" href="{{route('admin.roles.create')}}">
                        Create Roles
                    </a>
                </nav>
            </div>

            <!-- Sidenav Menu Heading (User)-->
            <div class="sidenav-menu-heading">User</div>
            <!-- Sidenav Accordion (User)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                User Management
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseUsers" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('admin.users.index')}}">
                        All Users
                    </a>
                    <a class="nav-link" href="{{route('admin.users.create')}}">
                        Create User
                    </a>
                </nav>
            </div>

            <!-- Sidenav Menu Heading (Admin)-->
            <div class="sidenav-menu-heading">Admin</div>
            <!-- Sidenav Accordion (Admin)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseAdmins" aria-expanded="false" aria-controls="collapseAdmins">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Admin Management
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAdmins" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link" href="{{route('admin.admins.index')}}">
                        All Admins
                    </a>
                    <a class="nav-link" href="{{route('admin.admins.create')}}">
                        Create Admin
                    </a>
                </nav>
            </div>

            <!-- Sidenav Heading (Plugins)-->
            <div class="sidenav-menu-heading">Plugins</div>
            <!-- Sidenav Link (Charts)-->
            <a class="nav-link" href="charts.html">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Charts
            </a>
            <!-- Sidenav Link (Tables)-->
            <a class="nav-link" href="tables.html">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Tables
            </a>
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title">Valerie Luna</div>
        </div>
    </div>
</nav>