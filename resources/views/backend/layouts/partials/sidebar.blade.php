@php
$usr = Auth::guard('admin')->user();
@endphp
<nav class=" sidenav shadow-right sidenav-dark">
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
            @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete'))
            <div class="sidenav-menu-heading">Roles</div>
            <!-- Sidenav Accordion (Roles)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseRoles" aria-expanded="false" aria-controls="collapseRoles">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Roles & Permission
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseRoles" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    @if ($usr->can('role.view'))
                    <a class="nav-link {{ Route::is('admin.roles.index') || Route::is('admin.roles.edit') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                        All Roles
                    </a>
                    @endif
                    @if ($usr->can('role.create'))
                    <a class="nav-link {{ Route::is('admin.roles.create') ? 'active' : '' }}" href="{{ route('admin.roles.create') }}">
                        Create Roles
                    </a>
                    @endif
                </nav>
            </div>
            @endif

            <!-- Sidenav Menu Heading (User)-->
            @if ($usr->can('user.create') || $usr->can('user.view') || $usr->can('user.edit') || $usr->can('user.delete'))
            <div class="sidenav-menu-heading">User</div>
            <!-- Sidenav Accordion (User)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                User Management
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseUsers" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    @if ($usr->can('user.view'))
                    <a class="nav-link {{ Route::is('admin.users.index') || Route::is('admin.users.edit') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        All Users
                    </a>
                    @endif
                    @if ($usr->can('user.create'))
                    <a class="nav-link {{ Route::is('admin.users.create') ? 'active' : '' }}" href="{{ route('admin.users.create') }}">
                        Create User
                    </a>
                    @endif
                </nav>
            </div>
            @endif

            <!-- Sidenav Menu Heading (Admin)-->
            @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
            <div class="sidenav-menu-heading">Admin</div>
            <!-- Sidenav Accordion (Admin)-->
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseAdmins" aria-expanded="false" aria-controls="collapseAdmins">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Admin Management
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAdmins" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    @if ($usr->can('admin.view'))
                    <a class="nav-link {{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : '' }}" href="{{ route('admin.admins.index') }}">
                        All Admins
                    </a>
                    @endif
                    @if ($usr->can('admin.create'))
                    <a class="nav-link {{ Route::is('admin.admins.create') ? 'active' : '' }}" href="{{ route('admin.admins.create') }}">
                        Create Admin
                    </a>
                    @endif
                </nav>
            </div>
            @endif

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

</nav>