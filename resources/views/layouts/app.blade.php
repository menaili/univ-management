@extends('master.master3')

@section('title', 'home')

@section('title-page', 'home')


@section('content')



    <!-- Hero Slides -->
    <div class="owl-carousel-one owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/32.jpg')">
            <div class="slide-content h-100 d-flex align-items-center text-center">
                <div class="container">
                    <h3 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">University Of Souk Ahras</h3>
                    <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Faculties and Certificates Management <br> </p>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-overlay" style="background-image: url('img/bg-img/31.jpg')">
            <div class="slide-content h-100 d-flex align-items-center text-center">
                <div class="container">
                    <h3 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms">University Of Souk Ahras</h3>
                    <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="500ms">Faculties and Certificates Management</p>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide -->

        <!-- Single Hero Slide -->

    </div>
    <div class="pt-3"></div>



    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('img/core-img/1.png')">
            <div class="card-body direction-rtl p-5">
                <h2 class="text-white">Certificates management</h2>
                <p class="mb-4 text-white">You can manage certifivates with add, updates and delete requests, also change status of request and print it.</p><a class="btn btn-warning" href="http://localhost/univ-certaficate-management/public/Send-request-licence">Get it</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('img/core-img/1.png')">
            <div class="card-body direction-rtl p-5">
                <h2 class="text-white">Faculties management</h2>
                <p class="mb-4 text-white">You can manage faculties with add, updates and delete (faculties, domain, devision, speciality).</p><a class="btn btn-warning" href="http://localhost/univ-certaficate-management/public/Add-faculty">Get it</a>
            </div>
        </div>
    </div>




    <!-- All JavaScript Files -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/internet-status.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }} "></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src=".{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/dark-mode-switch.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/active.js') }}"></script>
    <!-- PWA -->
    <script src="{{ asset('assets/js/pwa.js') }} "></script>

@endsection
