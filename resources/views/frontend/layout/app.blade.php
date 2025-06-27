<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css?_cacheOverride=1741593405619">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

        <script defer src="script.js"></script>
        <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

    <title>Prowebshop</title>

</head>

<body>




    @include('frontend.layout.partials.header')


    <div class="main">
        @yield('content')
    </div>


    @include('frontend.layout.partials.footer')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        document.querySelectorAll('.dropdown > a').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                let submenu = this.nextElementSibling;
                submenu.classList.toggle('active');
                this.querySelector('.icon').textContent = submenu.classList.contains('active') ? '-' : '+';
            });
        });
    </script>

    <script>
        function startCountdown(durationInSeconds) {
            let timer = durationInSeconds;
            const daysElem = document.getElementById('days');
            const hoursElem = document.getElementById('hours');
            const minutesElem = document.getElementById('minutes');
            const secondsElem = document.getElementById('seconds');

            function updateCountdown() {
                const days = Math.floor(timer / (24 * 60 * 60));
                const hours = Math.floor((timer % (24 * 60 * 60)) / 3600);
                const minutes = Math.floor((timer % 3600) / 60);
                const seconds = timer % 60;

                daysElem.textContent = String(days).padStart(2, '0');
                hoursElem.textContent = String(hours).padStart(2, '0');
                minutesElem.textContent = String(minutes).padStart(2, '0');
                secondsElem.textContent = String(seconds).padStart(2, '0');

                if (timer > 0) {
                    timer--;
                    setTimeout(updateCountdown, 1000);
                }
            }
            updateCountdown();
        }

        function closeHeader() {
            document.querySelector('.top_header').style.display = 'none';
        }

        startCountdown(5 * 24 * 60 * 60); // Example: 5 days countdown
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let navLinks = document.querySelectorAll(".nav-links li a");
            let currentLocation = window.location.href;

            navLinks.forEach(link => {
                if (link.href === currentLocation) {
                    link.classList.add("active");
                }
            });
        });
    </script>

    <script>
        $('.logo_slides').trigger('destroy.owl.carousel'); // Destroy
        $('.logo_slides').owlCarousel({ // Reinitialize
            loop: true,
            margin: 20,
            nav: false,
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".hero_banners").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                nav: false,
                dots: true,
                navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"]
            });
        });
    </script>
</body>

</html>
