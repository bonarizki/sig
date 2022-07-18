<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIG - @yield('title')</title>
    @include('master.user.include.header')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">

        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>Jl. Bend. Jatiluhur No.62</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
                <img src="{{ asset('user/user_template/img/logo-advent-2.png') }}" alt="" width="50px" height="35px">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('about_us') }}" class="nav-item nav-link">About Us</a>
                    <a href="{{ url('activity') }}" class="nav-item nav-link">Activity</a>
                </div>
                @auth
                    <div class="d-none d-lg-flex ms-2">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true"><b>Welcome back, {{ ucwords(Auth::user()->name) }} </b></a>
                            <div class="dropdown-menu m-0 show" data-bs-popper="none">
                                <a href="blog.html" class="dropdown-item">
                                    <i class="bi bi-person-circle"></i>
                                    Profil
                                </a>
                                <a href="{{ url('logout') }}" class="dropdown-item">
                                    <i class="bi bi-box-arrow-in-right"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                @endauth
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


   @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">SIG</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">FRANCO FRESO DIXO</a>
                        {{-- <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    @include('master.user.include.footer')
</body>

</html>