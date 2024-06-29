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
              <!-- Sidenav Menu Heading (Core)-->
              <div class="sidenav-menu-heading">Roles </div>
              <!-- Sidenav Accordion (Dashboard)-->
              <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                  <div class="nav-link-icon"><i data-feather="activity"></i></div>
                  Roles & Permission
                  <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                  <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                      <a class="nav-link" href="{{route('admin.roles.index')}}">
                          All Roles
                      </a>
                      <a class="nav-link" href="{{route('admin.roles.create')}}">
                          Create Roles
                      </a>
                      <a class="nav-link" href="dashboard-3.html">Affiliate</a>
                  </nav>
              </div>



              <!-- Sidenav Heading (Addons)-->
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