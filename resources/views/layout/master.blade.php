<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CDP & BSC</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Admin Dashboard Templates">
    <meta name="csrf-token" content="{{ csrf_token() }}">        
    <link href="https://myhorison.com/cdn/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{url('assets/fonts/bootstrap/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/main.min.css')}}">

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{url('assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}">

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="{{url('assets/vendor/toastify/toastify.css')}}">

  </head>

  <body style="overflow-y: hidden;">
    <div class="page-wrapper">
        <div class="app-header d-flex align-items-center">
            <div class="d-flex">
                <button class="toggle-sidebar" id="toggle-sidebar">
                    <i class="bi bi-list lh-1"></i>
                </button>
                <button class="pin-sidebar" id="pin-sidebar">
                    <i class="bi bi-list lh-1"></i>
                </button>
            </div>
            <div class="app-brand py-2 ms-3">
                <a href="{{url('/dashboard')}}" class="d-sm-block d-none">
                  <img style="width:30px;height:30px;" src="{{url('assets/images/logo.jpeg')}}" class="logo" alt="Bootstrap Gallery">
                </a><strong> &nbsp;&nbsp;CDV & BSC</strong>
                <a href="index-2.html" class="d-sm-none d-block">
                  <img src="{{url('assets/images/logo.jpeg')}}" class="logo" alt="Bootstrap Gallery">
                </a>
            </div>
            <div class="header-actions col">                
                <div class="dropdown ms-2">
                    <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center text-decoration-none" href="#!"
                      role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="assets/images/user2.png" class="rounded-2 img-3x" alt="Bootstrap Gallery">
                      <span class="ms-2 text-truncate d-lg-block d-none">Admin</span>
                    </a>          
                </div>
            </div>

        </div>
        <div class="main-container">
          @include('layout.navbar')
          <div class="app-container">                              
              @yield('headerkonten')
              <div class="app-body" id="app">                             
                  @yield('konten')                     
              </div> 
                                           
          </div>   
          <div class="app-footer">
            <span>© PT MGM 2024</span>
            
          </div>
        </div>                      
  </div>

    <script src="{{ url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/js/moment.min.js')}}"></script>
    <script src="{{url('assets/js/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('footer');
  </body>
</html>
