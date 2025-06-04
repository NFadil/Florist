@extends('Home')
@section('title', 'Home')
@section('content')
    <style>
        .order-card {
            background-color: #fff;
            /* putih bersih */
            border: 1px solid #ddd;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
            padding: 20px;
        }

        .order-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }

        .order-status {
            font-weight: 700;
            color: #3a9d23;
            /* hijau konfirmasi */
            background-color: #d9f0d8;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-block;
            min-width: 110px;
            text-align: center;
        }

        .order-title {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .order-info {
            color: #555;
            font-size: 0.95rem;
        }
    </style>

    <div class="container pt-5 pb-5 mt-5">
        <h3 class="mb-4 text-center text-md-start">Pesanan Saya</h3>

        <!-- Contoh Order Card -->
        <div class="order-card">
            <h5 class="order-title">Pesanan #12345</h5>
            <p class="order-info mb-1"><strong>Produk:</strong> Buket Tulip Pink</p>
            <p class="order-info mb-1"><strong>Jumlah:</strong> 2</p>
            <p class="order-info mb-1"><strong>Total Harga:</strong> Rp400.000</p>
            <p class="order-info mb-1"><strong>Tanggal Pesanan:</strong> 3 Juni 2025</p>
            <span class="order-status">Dikonfirmasi</span>
        </div>

        <div class="order-card">
            <h5 class="order-title">Pesanan #12346</h5>
            <p class="order-info mb-1"><strong>Produk:</strong> Buket Boneka</p>
            <p class="order-info mb-1"><strong>Jumlah:</strong> 1</p>
            <p class="order-info mb-1"><strong>Total Harga:</strong> Rp250.000</p>
            <p class="order-info mb-1"><strong>Tanggal Pesanan:</strong> 5 Juni 2025</p>
            <span class="order-status">Dikonfirmasi</span>
        </div>

    </div>
@endsection
