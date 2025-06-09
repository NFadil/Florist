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
        <div class="row g-4">
            @foreach ($pesanan as $item)
                <div class="col-12">
                    <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-md-center">
                        <div class="d-flex flex-column align-items-center me-md-3 mb-3 mb-md-0">

                            <img src="/img/{{ $item->product->gambars->first()->gambar ?? 'default.png' }}"
                                alt="{{ $item->product->nama }}" class="rounded mt-2"
                                style="width: 100px; height: 100px; object-fit: cover;">
                            <br>
                            <span
                                class="order-status badge 
                                @if ($item->status === 'pending') bg-warning text-dark 
                                @elseif($item->status === 'sukses') bg-success 
                                @elseif($item->status === 'batal') bg-danger @endif">
                                {{ ucfirst($item->status) }}
                            </span>
                        </div>
                        <!-- Info Produk -->
                        <div class="flex-grow-1 ps-md-3">
                            <h6 class="fw-semibold mb-1"><strong>No Transaksi:</strong> {{ $item->id_pemesanan }}</h6>

                            <p class="order-info mb-1"><strong>Produk:</strong> {{ $item->product->nama }}</p>
                            <p class="order-info mb-1"><strong>Jumlah:</strong> {{ $item->qty }}</p>
                            <p class="order-info mb-1">
                                <strong>Total Harga:</strong> Rp.{{ number_format($item->total_harga, 0, ',', '.') }}
                            </p>
                            <p class="order-info mb-1"><strong>Tanggal Pesanan:</strong>
                                {{ $item->created_at->diffForHumans() }}
                            </p>

                        </div>

                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
