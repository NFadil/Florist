@extends('Admin')

@section('title', 'Halaman Galery')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Data Produk</h6>
            </div>
            @if (session('success'))
                <div aria-live="polite" aria-atomic="true"
                    style="position: fixed; top: 1rem; right: 1rem; min-height: 200px; z-index: 1080;">
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1500">
                        <div class="toast-header bg-success text-white">
                            <strong class="mr-auto">Success</strong>
                            <small>Now</small>
                            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="card-body">
                <div class="box">
                    <div class="box-header d-flex justify-content-between">
                        <a href=" {{ route('TambahProduk.admin') }}" class="btn btn-secondary mb-3">Tambah Produk</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>Rp.{{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if (!empty($item->gambars->first()->gambar))
                                                <img src="{{ asset('storage/' . $item->gambars->first()->gambar) }}"
                                                    alt="{{ $item->title }}" width="150">
                                            @else
                                                <span>Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('UpdateProduk.admin', $item->slug) }}"
                                                class='btn btn-sm btn-secondary'><i class='fas fa-edit'></i></a>
                                            <!-- Tombol Hapus -->
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#hapusModal{{ $item->id }}">
                                                <i class='fas fa-trash'></i>
                                            </button>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="hapusModalLabel{{ $item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('delete.produk', $item->id) }} " method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="hapusModalLabel{{ $item->id }}">Konfirmasi
                                                                    Hapus</h5>
                                                                <button class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah kamu yakin ingin menghapus
                                                                <strong>{{ $item->nama }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
