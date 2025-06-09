@extends('Admin')

@section('title', 'Halaman Profile')
@section('content')
    <style>
        .foto-profil-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 1rem;
        }

        .foto-profil-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #007bff;
        }

        .foto-profil-container input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .foto-profil-container::after {
            content: 'Ganti Foto';
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 2px 6px;
            border-radius: 8px;
            opacity: 0;
            transition: 0.3s;
        }

        .foto-profil-container:hover::after {
            opacity: 1;
        }
    </style>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Profil</h6>
            </div>
            @if (session('success'))
                <div aria-live="polite" aria-atomic="true"
                    style="position: fixed; top: 1rem; right: 1rem; min-height: 200px; z-index: 1080;">
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
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
                <form action=" " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Foto Profil -->
                    <div class="foto-profil-container">
                        <img src="/img/{{ $copm->logo }}" alt="Foto Profil" width="150">
                        <input type="file" value="{{ $copm->logo }}" name="gambar" id="foto">
                    </div>

                    <!-- Form Profil -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $copm->nama }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pekerjaan">Telpon</label>
                                <input type="text" class="form-control" id="pekerjaan" name="job"
                                    value="{{ $copm->telpon }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Slogan</label>
                                <textarea class="form-control" id="deskripsi" name="job" value="{{ $copm->slogan }}" rows="5">
                                    {{ $copm->slogan }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="job" value="{{ $copm->deskripsi }}" rows="5">
                                    {{ $copm->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Misi</label>
                                <textarea class="form-control" id="deskripsi" name="job" value="{{ $copm->misi }}" rows="5">
                                    {{ $copm->misi }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Visi</label>
                                <textarea class="form-control" id="deskripsi" name="job" value="{{ $copm->visi }}" rows="5">
                                    {{ $copm->visi }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Tentang Kita</label>
                                <textarea class="form-control" id="deskripsi" name="job" value="{{ $copm->about }}" rows="5">
                                    {{ $copm->about }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Alamat</label>
                                <textarea class="form-control" id="deskripsi" name="job" value="{{ $copm->alamat }}" rows="5">
                                    {{ $copm->alamat }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $copm->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="insta"
                                    value="{{ $copm->insta }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="github">Youtube</label>
                                <input type="text" class="form-control" id="github" name="git"
                                    value="{{ $copm->ytb }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin">Facebook</label>
                                <input type="text" class="form-control" id="linkedin" name="linkin"
                                    value="{{ $copm->fb }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary mt-3">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
