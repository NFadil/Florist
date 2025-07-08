@extends('Admin')

@section('title', 'Halaman Galery')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Data Pesanan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>Customer</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Alamat</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $item)
                                <tr>
                                    <td>{{ $item->id_pemesanan }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->product->nama }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->alamat_pengiriman }}</td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        <span
                                            class="badge 
                                            @if ($item->status == 'pending') badge-warning 
                                            @elseif($item->status == 'sukses') badge-success 
                                            @else badge-danger @endif">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item->status == 'pending')
                                            <form method="POST" action="{{ route('pesanan.ubah', $item->id) }}">
                                                @csrf
                                                <div class="d-flex flex-column gap-1">
                                                    <button type="submit" name="action" value="sukses"
                                                        class="btn btn-success btn-sm mb-1">
                                                        Terima
                                                    </button>
                                                    <button type="submit" name="action" value="batal"
                                                        class="btn btn-danger btn-sm">
                                                        Batalkan
                                                    </button>
                                                </div>
                                            </form>
                                        @else
                                            <small class="text-muted">-</small>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
