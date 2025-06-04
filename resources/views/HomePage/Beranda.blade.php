@extends('Home')
@section('title', 'Produk')
@section('content')
    <style>
        .carousel-caption {
            border-radius: 10px;
            padding: 12px 20px;
        }

        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 1s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
    </style>
    <div class="mb-5 text-center pt-100" style="padding-top: 100px;">
        <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/s.png" class="d-block w-100" alt="Promo 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Promo Spesial Hari Ini</h5>
                        <p>Diskon 25% untuk semua buket bunga!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/cherry-blossom.png" class="d-block w-100" alt="Promo 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bunga Segar Setiap Hari</h5>
                        <p>Kualitas terbaik langsung dari kebun.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/cherry-blossom.png" class="d-block w-100" alt="Promo 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Gratis Ongkir!</h5>
                        <p>Untuk pembelian di atas Rp100.000</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

        @include('HomePage.Slide')
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
