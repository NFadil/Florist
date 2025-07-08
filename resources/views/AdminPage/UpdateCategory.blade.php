@extends('Admin')

@section('title', 'Halaman Update Kategori')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Update Produk</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('Categori.update', $cat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $cat->name }}">
                        </div>
                        <!-- Gambar baru -->
                        <div class="col-md-12 mb-3">
                            <label>Gambar</label>
                            <img src="{{ asset('storage/' . $cat->gambar) }}" style="max-height: 100px;"
                                class="img-thumbnail">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-secondary mt-3" type="submit">Update Kategori</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
