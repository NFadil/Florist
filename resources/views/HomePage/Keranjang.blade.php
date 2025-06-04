@extends('Home')
@section('title', 'Home')
@section('content')
    <div class="container pt-5 pb-5 mt-5">
        <h3 class="mb-4 text-center text-md-start">Keranjang Saya</h3>

        <form id="cartForm">
            <div class="row g-4">
                <!-- Card Produk -->
                <div class="col-12">
                    <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-md-center">
                        <!-- Checkbox dan Gambar -->
                        <div class="d-flex flex-column align-items-center me-md-3 mb-3 mb-md-0">
                            <span class="small">Pilih</span>
                            <label class="form-check-label d-flex flex-column align-items-center">
                                <input type="checkbox" class="form-check-input mb-1" style="scale: 1.3;" name="produk[]"
                                    value="1">
                            </label>
                            <img src="img/cherry-blossom.png" alt="Produk" class="rounded mt-2"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </div>

                        <!-- Info Produk -->
                        <div class="flex-grow-1 ps-md-3">
                            <h6 class="fw-semibold mb-1">Buket Tulip Pink</h6>
                            <small class="text-muted d-block">Kategori: Tulip</small>
                            <p class="fw-bold my-2 mb-2">Rp200.000</p>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm btn-outline-secondary me-2">-</button>
                                <input type="text" value="2" class="form-control text-center" style="width: 50px;"
                                    readonly>
                                <button class="btn btn-sm btn-outline-secondary ms-2">+</button>
                            </div>
                        </div>

                        <!-- Total & Hapus -->
                        <div class="text-md-end text-start mt-3 mt-md-0 ms-md-3">
                            <p class="fw-bold mb-2">Rp400.000</p>
                            <button class="btn btn-sm btn-danger">
                                <i data-lucide="trash-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Produk Kedua -->
                <div class="col-12">
                    <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-md-center">
                        <div class="d-flex flex-column align-items-center me-md-3 mb-3 mb-md-0">
                            <span class="small">Pilih</span>
                            <label class="form-check-label d-flex flex-column align-items-center">
                                <input type="checkbox" class="form-check-input mb-1" style="scale: 1.3;" name="produk[]"
                                    value="2">
                            </label>
                            <img src="img/teddy-bear.png" alt="Produk" class="rounded mt-2"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </div>

                        <div class="flex-grow-1 ps-md-3">
                            <h6 class="fw-semibold mb-1">Buket Boneka Coklat</h6>
                            <small class="text-muted d-block">Kategori: Boneka</small>
                            <p class="fw-bold my-2 mb-2">Rp150.000</p>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-sm btn-outline-secondary me-2">-</button>
                                <input type="text" value="1" class="form-control text-center" style="width: 50px;"
                                    readonly>
                                <button class="btn btn-sm btn-outline-secondary ms-2">+</button>
                            </div>
                        </div>

                        <div class="text-md-end text-start mt-3 mt-md-0 ms-md-3">
                            <p class="fw-bold mb-2">Rp150.000</p>
                            <button class="btn btn-sm btn-danger">
                                <i data-lucide="trash-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total & Checkout -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                <h5 class="fw-semibold mb-3 mb-md-0">Total Terpilih: <span id="totalTerpilih">Rp0</span></h5>
                <button type="submit" class="btn fw-semibold text-white px-4 py-2" style="background-color:#ffc7bd">
                    Checkout Produk Terpilih
                </button>
            </div>
        </form>
    </div>


@endsection
