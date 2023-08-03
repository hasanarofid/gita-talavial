<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@php
    $profile = App\ProfileMarket::find(1);
@endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')  | {{ $profile->title }} </title>


    <!-- Styles -->
    <link rel="icon" href="{{ asset('logogita.jpeg') }}" type="image/x-icon"/>


     <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('paneladmin/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('paneladmin//assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('paneladmin/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('paneladmin/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

</head>
<body class="g-sidenav-show   bg-gray-100">

  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="card card-profile">
      <img src="{{ asset('logogita.jpeg') }}" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-4 col-lg-4 order-lg-2">
          <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
            <a href="javascript:;">
              <img src="{{ asset('userdefault.jpg') }}" class="rounded-circle img-fluid border border-2 border-white">
            </a>
          </div>
        </div>
      </div>
   
    </div>


    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" {{ route('admin.index') }} " target="_blank">
        <img src="{{ asset('logogita.jpeg') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">{{ Auth::user()->role }}</span>
      </a>
    </div>

    <hr class="horizontal dark mt-0">
     <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @if (Auth::user()->role == 'Marketing')
          <li class="nav-item">
            <a class="nav-link " href="{{ route('produk.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Produk</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('penjualan.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Penjualan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('pelanggan.index') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pelanggan</span>
            </a>
          </li>
          <li class="nav-item">   
            <a class="nav-link " href="./pages/rtl.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Laporan</span>
            </a>
          </li>
        @endif

        @if (Auth::user()->role == 'HRD')
          <li class="nav-item">
            <a class="nav-link " href="./pages/tables.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pengaturan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./pages/virtual-reality.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Pengguna</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./pages/billing.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Report</span>
            </a>
          </li>   
          <li class="nav-item">   
            <a class="nav-link " href="./pages/rtl.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Laporan</span>
            </a>
          </li>
        @endif

        @if (Auth::user()->role == 'User')
        <li class="nav-item">
          <a class="nav-link " href="./pages/tables.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Booking Servis</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Lihat History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Contact Us</span>
          </a>
        </li>   
      @endif

      @if (Auth::user()->role == 'Teknisi')
      <li class="nav-item">
        <a class="nav-link " href="./pages/tables.html">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Servis</span>
        </a>
      </li>
      <li class="nav-item">   
        <a class="nav-link " href="./pages/rtl.html">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-app text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Laporan</span>
        </a>
      </li>
    
    @endif

      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
                      <p class="text-xs font-weight-bold mb-0">Anda Login sebagai</p>
            <h6 class="mb-0">{{ Auth::user()->role }}</h6>

          </div>
        </div>
      </div>
      <a class="btn btn-dark btn-sm w-100 mb-3" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

    </div>
  </aside>

  {{-- end menu samping --}}
   <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            @yield('breadcrumbs')
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">@yield('subjudul') </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
           
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"> {{ Auth::user()->name }}</span>
              </a>
            </li>
            
           
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    @yield('content')
  </main>
  

  <!--   Core JS Files   -->
  <script src="{{ asset('paneladmin/assets/js/core/popper.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/core/bootstrap.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/plugins/perfect-scrollbar.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/plugins/smooth-scrollbar.min.js') }} "></script>
  <script src="{{ asset('paneladmin/assets/js/plugins/chartjs.min.js') }} "></script>
 
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('paneladmin//assets/js/argon-dashboard.min.js?v=2.0.4') }} "></script>



</body>


</html>

