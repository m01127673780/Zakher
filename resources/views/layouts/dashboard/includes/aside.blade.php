  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="https://www.domain-soft.net" class="brand-link">
          {{-- <img src="{{asset('dashboardAssets/dist/img/logo-white.png')}}" alt="Logo" class="brand-image
          elevation-3"
          style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">لوحة التحكم</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ auth()->user()->image_path }}" width="20" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <li class="nav-item">
                      <a href="{{route('dashboard.welcome')}}"
                          class="nav-link {{ Request::is('*/dashboard') ? 'active' : '' }}"><i
                              class="nav-icon fas fa-home"></i>
                          <p>@Lang('admin.dashboard')</p>
                      </a>
                  </li>

                  @php
                  $setting = \App\Models\Setting::find(1);
                  @endphp

                  @if ($setting)
                  @if (auth()->user()->hasPermission('read_settings'))
                  <li class="nav-item">
                      <a href="{{route('dashboard.settings.edit', $setting->id)}}"
                          class="nav-link {{ Request::is('*/settings*') ? 'active' : '' }}"><i
                              class="nav-icon fas fa-cog"></i>
                          <p>@Lang('admin.settings')</p>
                      </a>
                  </li>
                  @endif
                  @else
                  <li class="nav-item">
                      <a href="#" class="nav-link"><i class="nav-icon fas fa-cog"></i>
                          <p>@Lang('admin.settings')</p>
                      </a>
                  </li>
                  @endif


                  @if (auth()->user()->hasPermission('read_admins'))
                  <li class="nav-item">
                      <a href="{{route('dashboard.admins.index')}}"
                          class="nav-link {{ Request::is('*/dashboard/admins*') ? 'active' : '' }}"><i
                              class="nav-icon fas fa-user-tie"></i>
                          <p>@Lang('admin.admins')</p>
                      </a>
                  </li>
                  @endif

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>