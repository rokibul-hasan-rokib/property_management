  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if(auth()->user()->role == \App\Models\User::ROLE_ADMIN)


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('propertys.index')}}">
          <i class="bi bi-person"></i>
          <span>Property</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('abouts.index')}}">
          <i class="bi bi-envelope"></i>
          <span>About</span>
        </a>
      </li><!-- End Contact Page Nav --> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('owners.index')}}">
          <i class="bi bi-card-list"></i>
          <span>Owner</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('agents.index')}}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Agent</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('customers.index')}}">
          <i class="bi bi-dash-circle"></i>
          <span>Customer</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('services.index')}}">
          <i class="bi bi-file-earmark"></i>
          <span>Service</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('bills.index') }}">
          <i class="bi bi-question-circle"></i>
          <span>Monthly Bill</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('payments.index')}}">
          <i class="bi bi-file-earmark"></i>
          <span>Payment Details</span>
        </a>
      </li><!-- End Blank Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('booked.index')}}">
          <i class="bi bi-question-circle"></i>
          <span>Booked List</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('contacts.index')}}">
          <i class="bi bi-question-circle"></i>
          <span>Contact</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      @elseif(auth()->user()->role == \App\Models\User::ROLE_USER)

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('billinghistory') }}">
          <i class="bi bi-question-circle"></i>
          <span>Bill History</span>
        </a>
      </li>
      @else
      <p>You do not have access to this section.</p>
      @endif

    </ul>

  </aside><!-- End Sidebar-->
