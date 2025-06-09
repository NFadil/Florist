@extends('Admin')

@section('title', 'Halaman Galery')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text">Data Galery</h6>
            </div>
            <div class="card-body">
                <div class="box">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Title </th>
                                    <th>Gambar</th>
                                    <th>Dibuat</th>
                                    <th>Diupdate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galery as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            @if (!empty($item->gambar))
                                                <img src="/img/{{ $item->gambar }}" alt="{{ $item->title }}"
                                                    width="150">
                                            @else
                                                <span>Tidak ada gambar</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <a href=" " class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a>
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
                                                    <form action=" " method="POST">
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
                                                                <strong>{{ $item->title }}</strong>?
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
