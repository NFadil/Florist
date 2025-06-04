@extends('Home')
@section('title', 'Produk')
@section('content')
    <style>
        .category-card:hover {
            background-color: #ffc7bd;
            transition: 0.2s;
            transform: scale(1.02);
        }

        /* Banner hover efek */
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

    <div class="container pt-5 pb-5 mt-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-10 mb-3 mb-md-0 position-relative">
                <input type="text" class="form-control ps-5 py-3 rounded-pill" placeholder="Cari produk...">
                <span class="position-absolute top-50 translate-middle-y" style="left: 15px; color: #6c757d;">
                    <i data-lucide="search"></i>
                </span>
            </div>
            <div class="col-md-2">
                <button type="submit" style="background-color:#ffc7bd" class="btn w-100 py-3 rounded-pill fw-semibold">
                    Cari
                </button>
            </div>
        </div>


        <!-- Kategori Card -->
        <div class="mb-5 text-center"> {{-- Ubah mb-4 jadi mb-5 --}}
            <h5 class="mb-3">Kategori</h5>
            <div class="row g-3 justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="card text-center border-primary category-card" style="cursor: pointer;">
                        <div class="card-body py-3">
                            <img src="img/bouquet.png" alt="Buket" style="width:40px; height:40px;" class="mb-2">
                            <p class="mb-0 fw-semibold text-primary">Buket</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="card text-center border-success category-card" style="cursor: pointer;">
                        <div class="card-body py-3">
                            <img src="img/teddy-bear.png" alt="Buket Boneka" style="width:40px; height:40px;"
                                class="mb-2">
                            <p class="mb-0 fw-semibold text-success">Buket Boneka</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="card text-center border-danger category-card" style="cursor: pointer;">
                        <div class="card-body py-3">
                            <img src="img/party.png" alt="Papan Bunga" style="width:40px; height:40px;" class="mb-2">
                            <p class="mb-0 fw-semibold text-danger">Papan Bunga</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk Grid -->
        <h5 class="mb-3">Semua Produk</h5>
        <div class="row g-4">
            @for ($i = 0; $i < 12; $i++)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="card h-100 shadow-sm">
                        <img src="img/cherry-blossom.png" class="card-img-top img-fluid" alt="Produk"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">Buket Tulip Pink</h6>
                            <small class="text-muted mb-1">Kategori: Tulip</small>
                            <p class="card-text fw-bold mb-2">Rp200.000</p>
                            <a href="#" class="btn text-dark px-4 py-2 rounded-pill"
                                style="background-color:#ffc7bd">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                @if ($i + 1 == 6)
                    <!-- Banner Iklan Pertama -->
                    <div class="col-12 mb-4">
                        <div class="promo-banner position-relative">
                            <img src="img/s.png" alt="Promo Spesial 1" class="img-fluid w-100" style="border-radius: 10px;">
                            <div class="promo-content position-absolute top-50 start-50 translate-middle text-center text-white"
                                style="text-shadow: 1px 1px 3px rgba(0,0,0,0.7);">
                                <h4>Promo Spesial!</h4>
                                <p>Dapatkan diskon hingga 20% untuk pembelian buket bunga hari ini.</p>
                            </div>
                        </div>
                    </div>
                @elseif ($i + 1 == 12)
                    <!-- Banner Iklan Kedua -->
                    <div class="col-12 mb-4">
                        <div class="promo-banner position-relative">
                            <img src="img/orang.png" alt="Promo Spesial 2" class="img-fluid w-100"
                                style="border-radius: 10px;">
                            <div class="promo-content position-absolute top-50 start-50 translate-middle text-center text-white"
                                style="text-shadow: 1px 1px 3px rgba(0,0,0,0.7);">
                                <h4>Penawaran Terbatas!</h4>
                                <p>Gratis ongkir untuk semua buket bunga di akhir pekan ini.</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
        <!-- Tombol Back to Top -->
        <button id="backToTopBtn" title="Ke atas"
            style="display:none; position: fixed; bottom: 40px; right: 40px; 
           z-index: 1000; background-color: #ffc7bd; border:none; 
           padding: 10px 15px; border-radius: 50px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
           cursor: pointer; font-weight: 600;"><i
                data-lucide="arrow-up-from-line"></i>
        </button>

    </div>
    <script>
        // Ambil tombol
        const backToTopBtn = document.getElementById("backToTopBtn");

        // Tampilkan tombol saat scroll > 300px
        window.onscroll = function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        };

        // Scroll ke atas dengan smooth saat tombol diklik
        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
@endsection
