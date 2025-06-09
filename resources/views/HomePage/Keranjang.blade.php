@extends('Home')
@section('title', 'Home')

@section('content')
    <div class="container pt-5 pb-5 mt-5">
        <h3 class="mb-4 text-center text-md-start">Keranjang Saya</h3>

        <form id="cartForm" action="{{ route('Pesanan.store') }}" method="POST">
            @csrf
            <div class="row g-4">
                <!-- Card Produk -->
                @foreach ($keranjang as $item)
                    <div class="col-12">
                        <div class="card shadow-sm p-3 d-flex flex-column flex-md-row align-items-md-center"
                            data-id="{{ $item->id }}">
                            <!-- Checkbox dan Gambar -->
                            <div class="d-flex flex-column align-items-center me-md-3 mb-3 mb-md-0">
                                <span class="small">Pilih</span>
                                <label class="form-check-label d-flex flex-column align-items-center">
                                    <input type="checkbox" class="form-check-input mb-1" style="scale: 1.3;" name="produk[]"
                                        value="{{ $item->id }}">
                                </label>
                                <img src="/img/{{ $item->product->gambars->first()->gambar ?? 'default.png' }}"
                                    alt="{{ $item->product->nama }}" class="rounded mt-2"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            </div>

                            <!-- Info Produk -->
                            <div class="flex-grow-1 ps-md-3">
                                <h6 class="fw-semibold mb-1">{{ $item->product->nama }}</h6>
                                <small class="text-muted d-block">{{ $item->product->category->name }}</small>
                                <p class="fw-bold my-2 mb-2 harga-produk">Rp
                                    {{ number_format($item->product->harga, 0, ',', '.') }}</p>

                                <div class="d-flex align-items-center">
                                    <!-- Tombol minus -->
                                    <button type="button"
                                        class="btn btn-sm btn-outline-secondary me-2 btn-minus">-</button>

                                    <!-- Input qty -->
                                    <input type="text" value="{{ $item->qty }}"
                                        class="form-control text-center input-qty" style="width: 50px;" readonly>

                                    <!-- Tombol plus -->
                                    <button type="button" class="btn btn-sm btn-outline-secondary ms-2 btn-plus">+</button>
                                </div>

                            </div>

                            <!-- Total & Hapus -->
                            <div class="text-md-end text-start mt-3 mt-md-0 ms-md-3">
                                <p class="fw-bold mb-2">
                                    Rp {{ number_format($total = $item->qty * $item->product->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Total & Checkout -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                <h5 class="fw-semibold mb-3 mb-md-0">Total Terpilih: <span id="totalTerpilih">Rp.0</span></h5>
                <button type="submit" class="btn fw-semibold text-white px-4 py-2" style="background-color:#ffc7bd">
                    Checkout Produk Terpilih
                </button>
            </div>
        </form>
    </div>

    <script>
        // Fungsi untuk menghitung total harga dari produk yang dipilih (checkbox yang dicentang)
        function hitungTotalTerpilih() {
            let total = 0;

            // Ambil semua checkbox produk
            document.querySelectorAll('input[name="produk[]"]').forEach(box => {
                if (box.checked) {
                    // Temukan elemen kartu produk terkait checkbox yang dicentang
                    const card = box.closest('.card');

                    // Ambil harga produk (dari <p class="harga-produk">)
                    const harga = parseInt(
                        card.querySelector('.harga-produk').textContent.replace(/[Rp.,\s]/g, '')
                    );

                    // Ambil jumlah produk (qty)
                    const qty = parseInt(card.querySelector('.input-qty').value);

                    // Hitung total harga produk berdasarkan qty
                    total += harga * qty;
                }
            });

            // Tampilkan total yang dihitung dalam format Rupiah
            document.getElementById('totalTerpilih').textContent = 'Rp' + total.toLocaleString('id-ID');
        }

        // Fungsi untuk mengirim permintaan update qty ke server via AJAX
        function updateQty(id, qty) {
            fetch('{{ route('keranjang.update') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: id,
                        qty: qty
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        console.log('Qty updated');
                        if (qty <= 0) {
                            // Jika qty 0, hapus elemen produk dari DOM
                            const card = document.querySelector(`.card[data-id="${id}"]`);
                            if (card) card.remove();

                            // Update total terpilih
                            hitungTotalTerpilih();
                        }
                    } else {
                        alert('Gagal update qty');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan.');
                });
        }

        // Event tombol minus
        document.querySelectorAll('.btn-minus').forEach(button => {
            button.addEventListener('click', () => {
                const card = button.closest('.card');
                const input = card.querySelector('.input-qty');
                const id = card.dataset.id;

                let qty = parseInt(input.value.trim()) - 1;


                if (qty >= 0) { // bisa sampai 0, nanti dihapus otomatis
                    input.value = qty;
                    updateQty(id, qty);
                    hitungTotalTerpilih();
                }
            });
        });

        // Event tombol plus (tidak berubah)
        document.querySelectorAll('.btn-plus').forEach(button => {
            button.addEventListener('click', () => {
                const card = button.closest('.card');
                const input = card.querySelector('.input-qty');
                const id = card.dataset.id;
                let qty = parseInt(input.value.trim()) + 1;

                input.value = qty;
                updateQty(id, qty);
                hitungTotalTerpilih();
            });
        });


        // Event listener untuk setiap checkbox produk (checkbox centang)
        document.querySelectorAll('input[name="produk[]"]').forEach(cb => {
            cb.addEventListener('change', hitungTotalTerpilih); // Hitung ulang total saat centang berubah
        });
    </script>


@endsection
