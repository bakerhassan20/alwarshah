

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>ElWarSha</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home') }}" class="nav-item nav-link ">Home</a>
                @auth
                 <a href="{{ route('getOrders') }}" class="nav-item nav-link">Orders</a>
                @endauth
                <a href="#" class="nav-item nav-link">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <a href="#" class="dropdown-item">Booking</a>
                        <a href="#" class="dropdown-item">Technicians</a>
                        <a href="#" class="dropdown-item">Testimonial</a>
                        <a href="#" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link">Contact</a>

            </div>
            @guest
            <a href="{{ route('login') }}" class="btn btn-primary py-4 d-none d-lg-block">Sign IN</a>
                  @else
                    <div class="nav-item dropdown"style="margin-right:120px;">
                        <a class="nav-link " data-bs-toggle="dropdown">
                        <img alt=""style="width: 40px; height: 40px;" src="{{Auth::user()->avatar }}">
                        </a>
                        <div class="dropdown-menu fade-up m-0"style="min-width:125px !important;" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('profile') }}">profile</a>
                        <a class="dropdown-item" href="#">settings</a>
                        <a class="dropdown-item" href="#"onclick="event.preventDefault();document.getElementById('logout-form').submit();">log out<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                    </form></a>

                    </div>
                </div>
            @endguest

        </div>
    </nav>
    <!-- Navbar End -->
