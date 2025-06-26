@extends('Admin')

@section('title', 'Halaman Update Produk')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Update Produk</h6>
            </div>
            <div class="card-body">
                <!-- Gambar lama -->
                <div class="col-md-12 mb-3">
                    <label>Gambar Saat Ini</label>
                    <div class="d-flex flex-wrap">
                        @foreach ($produk->gambars ?? [] as $gbr)
                            <div class="m-2 text-center">
                                <img src="{{ asset('storage/' . $gbr->gambar) }}" style="max-height: 100px;"
                                    class="img-thumbnail">
                                <form action="{{ route('produk.gambar.destroy', $gbr->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus gambar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm mt-1">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <form action="{{ route('update.produk', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $produk->nama }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category_id">Kategori Produk</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($cat as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('category_id', $produk->category_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ $produk->stok }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ $produk->harga }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $produk->deskripsi }}</textarea>
                        </div>


                        <!-- Gambar baru -->
                        <div class="col-md-12 mb-3">
                            <label>Tambah Gambar Baru</label>
                            <input type="file" name="gambar[]" multiple class="form-control">
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-secondary mt-3" type="submit">Update Produk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
