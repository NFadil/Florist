@extends('Admin')

@section('title', 'Halaman Tambah Produk')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Tambah Produk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('Tambah.produk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category_id">Kategori Produk</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($cat as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok"
                                value="{{ old('stok') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ old('harga') }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-group text-center">
                                <label for="gambar">Gambar Produk</label>
                                <div class="border rounded p-4" style="border-style: dashed;">
                                    <label style="cursor: pointer;">
                                        <div class="text-muted">Klik di sini untuk menambah gambar (boleh banyak)</div>
                                        <input type="file" name="gambar[]" accept="image/*" class="d-none"
                                            id="filePicker" multiple>
                                    </label>
                                    <div id="preview-container" class="d-flex flex-wrap justify-content-center mt-3">
                                        <!-- preview gambar -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-secondary">Simpan Produk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filePicker = document.getElementById('filePicker');
            const previewContainer = document.getElementById('preview-container');

            filePicker.addEventListener('change', function() {
                previewContainer.innerHTML = ''; // Bersihkan preview sebelumnya

                const files = filePicker.files;

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (!file || !file.type.startsWith('image/')) continue;

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-thumbnail', 'm-2');
                        img.style.maxWidth = '150px';
                        img.style.maxHeight = '150px';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
