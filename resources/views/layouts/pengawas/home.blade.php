<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengawas Home | Delman Super</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Pengawas" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('theme/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('theme/assets/vendor/css/pages/page-profile.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('theme/assets/vendor/js/helpers.js') }}" ></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('theme/assets/js/config.js') }}" ></script>

    @yield('css')
  </head>

  <body>
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
     
        <div class="layout-container">
          <!-- Menu -->
         
          <aside  id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          
            <div class="app-brand demo" style="margin-top: 10px">
              

              <a href="{{ route('pengawas.index') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                      fill="#7367F0" />
                    <path
                      opacity="0.06"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                      fill="#161616" />
                    <path
                      opacity="0.06"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                      fill="#161616" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                      fill="#7367F0" />
                  </svg>
                </span>
                <span class="app-brand-text demo menu-text fw-bold">Delman Super</span>
              </a>
  
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>

  
            <ul class="menu-inner py-1" style="margin-top: 10px">
              <li class="menu-item active">
                <a href="{{ route('pengawas.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-user"></i>
                  <div data-i18n="Profile">Profile</div>
                </a>
              </li>
              <!-- Dashboards -->
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-smart-home"></i>
                  <div data-i18n="Dashboards">Dashboards</div>
                  <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="index.html" class="menu-link">
                      <div data-i18n="Rencana Kerja">Rencana Kerja</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="dashboards-crm.html" class="menu-link">
                      <div data-i18n="Activitas">Activitas</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="dashboards-ecommerce.html" class="menu-link">
                      <div data-i18n="Umpan Balik">Umpan Balik</div>
                    </a>
                  </li>
                </ul>
              </li>
  
              <!-- Layouts -->
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                  <div data-i18n="Master Data">Master Data</div>
                </a>
  
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="layouts-collapsed-menu.html" class="menu-link">
                      <div data-i18n="Data Sekolah Binaan">Data Sekolah Binaan</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="layouts-content-navbar.html" class="menu-link">
                      <div data-i18n="Data Pengawas">Data Pengawas</div>
                    </a>
                  </li>
                </ul>
              </li>
  
              <!-- Apps & Pages -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Delman Super</span>
              </li>
              <li class="menu-item">
                <a href="app-email.html" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                  <div data-i18n="Perencanaan">Perencanaan</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-chat.html" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-messages"></i>
                  <div data-i18n="Pelaporan">Pelaporan</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-calendar.html" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-calendar"></i>
                  <div data-i18n="Umpan Balik">Umpan Balik</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="app-kanban.html" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                  <div data-i18n="Kanban">Kanban</div>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="{{ route('pengawas.logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                <i class="menu-icon fa fa-sign-out"></i>
                  <div data-i18n="Logout">Logout</div>
             </a>  
             <form id="logout-form2" action="{{ route('pengawas.logout') }}" method="POST" style="display: none;">
              @csrf
           </form>
               
              </li>

  
            </ul>
          </aside>
          <!-- / Menu -->
         
          <!-- Layout container -->
          <div class="layout-page">
            <!-- Navbar -->
            <nav
              class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar">
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                  <i class="ti ti-menu-2 ti-sm"></i>
                </a>
              </div>
  
              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                
  
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                 
                  @php
                      if(Auth::user()->foto_profile == 'userdefault.jpg'){
                            $foto = asset('userdefault.jpg');
                        }else{
                            $foto =  route('pengawas',$row->foto_profile );
                        }
                  @endphp
  
  
                  <!-- User -->
                  <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                        <img src="{{ $foto }}" alt class="h-auto rounded-circle" />
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="pages-account-settings-account.html">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img src="{{ $foto }}" alt class="h-auto rounded-circle" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                              <small class="text-muted">{{ Auth::user()->role }}</small>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>

                      <li>
                        <a class="dropdown-item" href="{{ route('pengawas.logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="ti ti-logout me-2 ti-sm"></i> Log Out
                       </a>  
                       <form id="logout-form" action="{{ route('pengawas.logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>

                      </li>

                      
                     
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </div>
  
              <!-- Search Small Screens -->
              <div class="navbar-search-wrapper search-input-wrapper d-none">
                <input
                  type="text"
                  class="form-control search-input container-xxl border-0"
                  placeholder="Search..."
                  aria-label="Search..." />
                <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
              </div>
            </nav>
  
            <!-- / Navbar -->
  
            <!-- Content wrapper -->
            @yield('content')
           <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl">
        <div
          class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
          <div>
            ©
            <script>
              document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
          </div>
          <div>
            <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
              >License</a
            >
            <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
              >More Themes</a
            >

            <a
              href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
              target="_blank"
              class="footer-link me-4"
              >Documentation</a
            >

            <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
              >Support</a
            >
          </div>
        </div>
      </div>
    </footer>
    <!-- / Footer -->
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>
  
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
  
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
      </div>
      <!-- / Layout wrapper -->

    
  
  


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('theme/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('theme/assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('theme/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

    <script src="{{ asset('theme/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('theme/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('theme/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('theme/assets/js/pages-profile.js') }}"></script>

    @yield('script')

  </body>
</html>
