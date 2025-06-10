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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $item)
                                    @if ($item->status == 'pending')
                                        <tr>
                                            <td>{{ $item->id_pemesanan }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->product->nama }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->alamat_pengiriman }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>
                                                <span class="badge badge-warning text-white status-badge"
                                                    data-toggle="modal" data-target="#statusModal"
                                                    data-id="{{ $item->id }}">
                                                    Pending
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

    <!-- Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="" id="statusForm">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Status Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Pilih aksi untuk pesanan ini: </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="action" value="batal" class="btn btn-danger">Batalkan</button>
                        <button type="submit" name="action" value="sukses" class="btn btn-success">Konfirmasi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#statusModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var pesananId = button.data('id');
                var actionUrl = '/admin/pesanan/' + pesananId + '/ubah-status';
                $('#statusForm').attr('action', actionUrl);
            });
        });
    </script>
@endsection
