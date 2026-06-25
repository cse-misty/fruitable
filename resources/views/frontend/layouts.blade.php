<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{ $setting->site_title ?? '' }}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <!-- Google Fonts -->

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

            <!-- Icon Font Stylesheet -->
            <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

            <!-- Libraries Stylesheet -->
            <link href="{{ asset('frontend/assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
            <link href="{{ asset('frontend/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">



            <!-- Bootstrap CSS -->
            <link href="{{ asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="{{ asset('frontend/assets/css/style.css')}}" rel="stylesheet">


        </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
       @include('frontend.includes.navber')
        <!-- Navbar End -->

        @yield('content')

        @include('sweetalert::alert')

        <!-- Footer Start -->
            @include('frontend.includes.footer')
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, {{ $settings?->site_name ?? 'My Website' }}
</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>


    <script>
        let categorySearchInput = document.getElementById('categorySearch');
        if (categorySearchInput) {
            categorySearchInput.addEventListener('keyup', function () {
                let filter = this.value.toLowerCase();
                let items = document.querySelectorAll('.category-item');

                items.forEach(function (item) {
                    let title = item.querySelector('.category-title').innerText.toLowerCase();
                    if (title.includes(filter)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }
 <!-- Fact Start Counter -->


        // document.addEventListener("DOMContentLoaded", () => {
        //     const counters = document.querySelectorAll('.count-number');
        //     const speed = 40;

        //     const startCounting = (counter) => {
        //         const target = +counter.getAttribute('data-target');
        //         const suffix = counter.getAttribute('data-suffix') || '';
        //         const count = +counter.innerText.replace(suffix, '');


        //         const inc = Math.ceil(target / speed);

        //         if (count < target) {

        //             counter.innerText = (count + inc > target ? target : count + inc) + suffix;
        //             setTimeout(() => startCounting(counter), 30);
        //         } else {
        //             counter.innerText = target + suffix;
        //         }
        //     };


        //     const observer = new IntersectionObserver((entries) => {
        //         entries.forEach(entry => {
        //             if (entry.isIntersecting) {
        //                 startCounting(entry.target);
        //                 observer.unobserve(entry.target);
        //             }
        //         });
        //     }, { threshold: 0.5 });

        //     counters.forEach(counter => observer.observe(counter));
        // });


    </script>


    <script>
        function scrollTabs(value) {
            let tabs = document.getElementById('categoryTabs');
            if (tabs) {
                tabs.scrollBy({
                    left: value,
                    behavior: 'smooth'
                });
            }
        }
    </script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.count-item');
        const duration = 2000; // অ্যানিমেশনটি মোট কত মিলি-সেকেন্ড ধরে চলবে (২ সেকেন্ড)

        const animateCounter = (counter) => {
            const target = +counter.getAttribute('data-target');
            const suffix = counter.getAttribute('data-suffix') || '';
            const startTime = performance.now();

            const updateNumber = (currentTime) => {
                const elapsedTime = currentTime - startTime;

                // অ্যানিমেশন কতদূর সম্পন্ন হয়েছে তার অনুপাত (Progress ratio)
                const progress = Math.min(elapsedTime / duration, 1);

                // বর্তমান ফ্রেমের সংখ্যা গণনা
                const currentValue = Math.floor(progress * target);

                counter.innerText = currentValue + suffix;

                if (progress < 1) {
                    requestAnimationFrame(updateNumber);
                } else {
                    counter.innerText = target + suffix;
                }
            };

            requestAnimationFrame(updateNumber);
        };

        // স্ক্রিনে যখন এই সেকশনটি আসবে তখনই কাউন্ট অ্যানিমেশন শুরু হবে
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target); // একবার অ্যানিমেশন হয়ে গেলে ট্র্যাকিং বন্ধ করবে
                }
            });
        }, { threshold: 0.2 }); // সেকশনটি ২০% স্ক্রিনে আসলেই কাউন্ট শুরু হবে

        counters.forEach(counter => observer.observe(counter));
    });
</script>

</body>
</html>
