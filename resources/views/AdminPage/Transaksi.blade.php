@extends('Admin')

@section('title', 'Halaman Galery')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Data Pesanan</h6>
            </div>
            <div class="card-body">
                <div class="box">
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
                                    <th>Tanggal<br>Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $item)
                                    @if ($item->status !== 'pending')
                                        <tr>
                                            <td>{{ $item->id_pemesanan }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->product->nama }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->alamat_pengiriman }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>
                                                <span class="badge badge-warning text-white status-badge">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
