@extends('Home')
@section('title', 'Produk')
@section('content')
    <style>
        .category-card:hover {
            background-color: #ffc7bd;
            transition: 0.2s;
            transform: scale(1.02);
        }

        .promo-banner {
            width: 100%;
            height: 224px;
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
        <!-- Search -->
        <div class="row mb-4 align-items-center">
            <div class="col-md-10 mb-3 mb-md-0 position-relative">
                <input type="text" class="form-control ps-5 py-3 rounded-pill" placeholder="Cari produk...">
                <span class="position-absolute top-50 translate-middle-y" style="left: 15px; color: #6c757d;">
                    <i data-lucide="search"></i>
                </span>
            </div>
            <div class="col-md-2">
                <button type="submit" style="background-color:#ffc7bd"
                    class="btn w-100 py-3 rounded-pill fw-semibold">Cari</button>
            </div>
        </div>

        <!-- Kategori Card -->
        <div class="mb-5 text-center">
            <h5 class="mb-3">Kategori</h5>
            <div class="row g-3 justify-content-center">
                <!-- contoh kategori statis -->
                @foreach ($categories as $cat)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="card text-center border-primary category-card" style="cursor: pointer;">
                            <div class="card-body py-3">
                                <img src="/img/{{ $cat->gambar }}" alt="{{ $cat->name }}"
                                    style="width:40px; height:40px;" class="mb-2">
                                <p class="mb-0 fw-semibold text-primary">{{ $cat->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Produk Grid -->
        <h5 class="mb-3">Semua Produk</h5>
        <div class="row g-4">
            @foreach ($products as $index => $item)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="card h-100 shadow-sm">
                        <img src="/img/{{ $item->gambars->first()->gambar ?? 'default.png' }}"
                            class="card-img-top img-fluid" alt="Produk" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title mb-1">{{ $item->nama }}</h6>
                            <small class="text-muted mb-1">{{ $item->category->name }}</small>
                            <p class="card-text fw-bold mb-2">Rp.{{ number_format($item->harga, 0, ',', '.') }}</p>
                            <button type="button" class="btn text-dark px-4 py-2 rounded-pill"
                                style="background-color:#ffc7bd" data-bs-toggle="modal" data-bs-target="#productDetailModal"
                                onclick='showProductDetail(@json($item))'>
                                Lihat Detail
                            </button>

                        </div>
                    </div>
                </div>

                @if ($index + 1 == 6)
                    <!-- Promo Banner -->
                    <div class="col-12 mb-4">
                        <div class="promo-banner position-relative">
                            <img src="img/s.png" alt="Promo Spesial 1" class="img-fluid w-100" style="border-radius: 10px;">
                            <div
                                class="promo-content position-absolute top-50 start-50 translate-middle text-center text-white">
                                <h4>Promo Spesial!</h4>
                                <p>Dapatkan diskon hingga 20% untuk pembelian buket bunga hari ini.</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Modal Produk -->
        <div class="modal fade" id="productDetailModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-5">
                            <div id="modalCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" id="modalCarouselInner"></div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#modalCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#modalCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5 id="modalProductName"></h5>
                            <p id="modalProductCategory" class="text-muted"></p>
                            <p id="modalProductPrice" class="fw-bold"></p>
                            <p id="modalProductDescription"></p>
                            <p>Stok: <span id="modalProductStock"></span></p>
                            <div class="input-group mb-3" style="width: 140px;">
                                <button class="btn btn-outline-secondary" type="button" id="decreaseQty">-</button>
                                <input type="text" class="form-control text-center" value="1" id="productQty">
                                <button class="btn btn-outline-secondary" type="button" id="increaseQty">+</button>
                            </div>
                            <button class="btn text-white fw-semibold" style="background-color:#ffc7bd">Masukkan ke
                                Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showProductDetail(product) {
            document.getElementById('modalProductName').textContent = product.nama;
            document.getElementById('modalProductCategory').textContent = "Kategori: " + product.category.name;
            document.getElementById('modalProductPrice').textContent = "Rp. " + new Intl.NumberFormat('id-ID').format(
                product.harga);
            document.getElementById('modalProductDescription').textContent = product.deskripsi;
            document.getElementById('modalProductStock').textContent = product.stok;
            document.getElementById('productQty').value = 1;

            const carouselInner = document.getElementById('modalCarouselInner');
            carouselInner.innerHTML = '';

            if (product.gambars && product.gambars.length > 0) {
                product.gambars.forEach((img, index) => {
                    const div = document.createElement('div');
                    div.className = 'carousel-item' + (index === 0 ? ' active' : '');
                    div.innerHTML =
                        `<img src="/img/${img.gambar}" class="d-block w-100 rounded" style="object-fit:cover; height:300px;">`;
                    carouselInner.appendChild(div);
                });
            } else {
                carouselInner.innerHTML =
                    '<div class="carousel-item active"><img src="/img/default.png" class="d-block w-100"></div>';
            }

        }
    </script>

@endsection
