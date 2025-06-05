<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="/img/cherry-blossom.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-2px);
            }

            50% {
                transform: translateX(2px);
            }

            75% {
                transform: translateX(-1px);
            }
        }

        .shake-on-hover:hover {
            animation: shake 0.3s ease-in-out;
        }

        .scrolling-wrapper {
            animation: scroll-x 30s linear infinite;
            will-change: transform;
        }

        @keyframes scroll-x {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* Jika ingin scroll lebih smooth dan fleksibel untuk berbagai screen */
        .scrolling-wrapper {
            display: flex;
            width: max-content;
        }


        nav.navbar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background-color: transparent;
            z-index: 10;
            padding: 1rem 1rem;
        }

        /* Navbar putih untuk mobile */
        @media (max-width: 767.98px) {
            nav.navbar {
                background-color: #ffffff !important;
            }

            .navbar-collapse {
                background-color: #ffffff;
                /* warna latar dropdown menu */
                padding: 1rem;
                border-radius: 0.5rem;
            }
        }

        /* Supaya konten hero tidak tertutup navbar */
        .section-hero {
            position: relative;
            padding-top: 80px;
            /* Sesuaikan dengan tinggi navbar */
            background-color: #f5f0ed;
            overflow: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        /* SVG background tetap di belakang */
        .hero-svg-bg {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 50vw;
            /* sesuai lebar yang kamu inginkan */
            z-index: 0;
            overflow: hidden;
        }

        /* Navbar putih untuk mobile */
        @media (max-width: 767.98px) {
            .hero-svg-bg {
                width: 90vw;
            }


        }

        /* Konten hero di atas SVG */
        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-img {
            max-width: 100%;
            height: auto;
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body id="home">

    @include('HomePage.Navbar')

    @yield('content')
    @include('HomePage.Footer')
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
