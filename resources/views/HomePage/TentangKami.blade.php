@extends('Home')
@section('title', 'Home')
@section('content')
    <style>
        .section-title {
            font-weight: 700;
            color: #c75b5b;
            margin-bottom: 30px;
        }

        .card-custom {
            background-color: #ffe9e5;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            opacity: 0;
            transform: translateX(-100%);
            transition: all 0.8s ease-in-out;
        }

        .card-custom.show {
            opacity: 1;
            transform: translateX(0);
        }

        .card-custom h5 {
            color: #c75b5b;
            font-weight: 600;
        }

        .card-custom p,
        .card-custom li {
            color: #5f5f5f;
        }

        .card-custom:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease-in-out;
        }

        .promo-banner {
            width: 100%;
            /* Lebar memenuhi parent container */
            height: 224px;
            /* Tinggi tetap 224px */
            object-fit: cover;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .promo-banner:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .promo-content {
            position: absolute;
            bottom: 15px;
            left: 20px;
            color: white;
            text-shadow: 0 0 8px rgba(0, 0, 0, 0.7);
        }
    </style>

    <div class="container py-5 mt-5">
        <div class="col-12 mb-4">
            <div class="promo-banner position-relative" style="">
                <img src="img/s.png" alt="Promo Spesial 1" class="img-fluid w-100" style="border-radius: 10px;">
                <div class="promo-content position-absolute top-50 start-50 translate-middle text-center text-white"
                    style="text-shadow: 1px 1px 3px rgba(0,0,0,0.7);">
                    <h4>Promo Spesial!</h4>
                    <p>Dapatkan diskon hingga 20% untuk pembelian buket bunga hari ini.</p>
                </div>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- VISI -->
            <div class="col-md-6">
                <div class="card card-custom p-4 h-100">
                    <h5 class="mb-3"><i data-lucide="eye" class="me-2"></i>Visi</h5>
                    <p>Menjadi toko bunga terpercaya dan inspiratif yang menghadirkan kebahagiaan melalui rangkaian buket
                        penuh makna.</p>
                </div>
            </div>

            <!-- MISI -->
            <div class="col-md-6">
                <div class="card card-custom p-4 h-100">
                    <h5 class="mb-3"><i data-lucide="target" class="me-2"></i>Misi</h5>
                    <ul class="mb-0">
                        <li>Menyediakan buket bunga berkualitas tinggi & kreatif.</li>
                        <li>Melayani pelanggan dengan sepenuh hati.</li>
                        <li>Mendukung momen istimewa pelanggan dengan produk bermakna.</li>
                    </ul>
                </div>
            </div>

            <!-- PROFIL SINGKAT -->
            <div class="col-md-10">
                <div class="card card-custom p-4">
                    <h5 class="mb-3"><i data-lucide="users" class="me-2"></i>Profil Singkat</h5>
                    <p>Kami adalah tim kreatif yang berdedikasi menghadirkan buket bunga yang tak hanya indah secara visual,
                        tetapi juga mengandung cerita. Dengan semangat dan cinta pada seni merangkai, kami hadir untuk
                        membuat setiap pemberian bunga jadi lebih bermakna.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("load", function() {
            const cards = document.querySelectorAll(".card-custom");
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add("show");
                }, 200 * index);
            });
            lucide.createIcons();
        });
    </script>
@endsection
