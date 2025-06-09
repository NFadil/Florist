@extends('Admin')

@section('title', 'Halaman Utama')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Data Produk</h6>
            </div>
            <div class="card-body">
                <div class="box">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Produk</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0003</td>
                                    <td>sadas</td>
                                    <td>sadas</td>
                                    <td>sadas</td>
                                    <td>sadas</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
