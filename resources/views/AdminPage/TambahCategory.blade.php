@extends('Admin')

@section('title', 'Halaman Tambah Kategori')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Tambah Kategori</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('Categori.Tambah.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="gambar">Icon Kategori</label>
                            <div class="border rounded p-4 text-center" style="border-style: dashed;">
                                <label for="gambar" style="cursor: pointer;">
                                    <div class="text-muted">Klik di sini untuk mengunggah gambar</div>
                                    <input type="file" id="gambar" name="gambar" class="d-none" accept="image/*"
                                        onchange="previewGambar(event)">
                                </label>
                                <div id="preview-container" class="d-flex flex-wrap justify-content-center mt-3">
                                    <!-- Preview gambar muncul di sini -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-secondary">Simpan Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script Preview Gambar --}}
    <script>
        function previewGambar(event) {
            const container = document.getElementById('preview-container');
            container.innerHTML = ''; // Kosongkan preview sebelumnya

            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'm-2');
                    img.style.maxWidth = '150px';
                    img.style.maxHeight = '150px';
                    container.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
