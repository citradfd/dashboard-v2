<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              <i class="fa-regular fa-house"></i> Dashboard
            </a>
          </li>
          @if (Auth::user()->role == 'sales')
            
          @endif

          @if (Auth::user()->role == 'admin')
            
          @endif

          @if (Auth::user()->role == 'superadmin')
            
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ url('updatepassword') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Update Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('company') }}">
              <span data-feather="users" class="align-text-bottom"></span>Company</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('contactperson') }}">
              <span data-feather="users" class="align-text-bottom"></span>Contact Person</a>
          </li>
          
            <li class="nav-item">
              <a class="nav-link" href="{{ url('activity') }}">
                <span data-feather="users" class="align-text-bottom"></span>Activity</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="{{ url('salestarget') }}">
                <span data-feather="users" class="align-text-bottom"></span>SalesTarget</a>
            </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('city') }}">
              <span data-feather="users" class="align-text-bottom"></span>City</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('segment') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Segment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('industry') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Industry</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('brand') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('hotel') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Hotel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('jabatan') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Jabatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('sales') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Sales Person</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('meetingroom') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Meeting Room</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('roomtype') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Room Type</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('roomrental') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Room Rental</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('weddingstallmaster') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Weddingstall</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('package') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Package</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('additional') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Additional</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('telemarketing') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Telemarketing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('salescall') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Salescall</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('lapsalescall') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Laporan SalesCall</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('entertaiment') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Entertaiment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('laporanentertaiment') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Laporan Entertaiment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('complimentary') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Complimentary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('laporancomplimentary') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Laporan Complimentary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('otheractivity') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Other Activity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('laporanotheractivity') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Laporan Other Activity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('quotation') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Quotation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('confirmation ') }}">
              <span data-feather="setting" class="align-text-bottom"></span>Confirmation </a>
          </li>
        </ul>

        
      </div>
</nav>