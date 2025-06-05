@extends('Admin')

@section('title', 'Halaman Utama')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Preview Halaman Portofolio</h6>
                <div class="card-body">
                    <div class="box">
                        <div
                            style="border:1px solid #ddd; border-radius:10px; overflow:hidden; width:90%; margin:0 auto; height:calc(100vh - 150px);">
                            <iframe src="#" width="100%" height="100%" style="border:none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
