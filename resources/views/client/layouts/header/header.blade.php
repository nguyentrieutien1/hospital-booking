<style>
    li {
        list-style: none;
        cursor: pointer;
    }

    img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 100%;
    }

    #navbar {
        box-shadow: 0 0 0 0;
    }

    a {
        text-decoration: none
    }

</style>
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
            <i class="bi bi-phone"></i> +1 5589 55488 55
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</div>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">


        <h1 class="logo me-auto"><a href="{{ url("/") }}">Medilab</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="client/assets/img/logo.png" alt="" class="img-fluid"></a>-->
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
                @if (!(Route::getFacadeRoot()->current()->uri() == 'appointment/{id}'))
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
                <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @endif
                <li><a class="nav-link" href="{{ url("appointment", ["id"=> Auth::user()->id]) }}">My
                        Appointment</a>
                </li>





                {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                    class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li> --}}
            </ul>
        </nav><!-- .navbar -->
        @if (!(Route::getFacadeRoot()->current()->uri() == 'appointment/{id}'))
        <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span>
            Appointment</a>
        <li class="avatar">
            @endif

            <x-profile></x-profile>
        </li>

    </div>
</header>
@include('admin.layouts.jsCode.jsCode')
