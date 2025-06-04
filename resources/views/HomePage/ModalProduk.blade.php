<!-- Modal Produk -->
<div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailLabel">Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body row">
                <div class="col-md-5">
                    <img id="modalProductImage" src="" class="img-fluid rounded" alt="Produk">
                </div>
                <div class="col-md-7">
                    <h5 id="modalProductName">Nama Produk</h5>
                    <p id="modalProductCategory" class="text-muted">Kategori: -</p>
                    <p id="modalProductPrice" class="fw-bold">Rp0</p>
                    <p id="modalProductDescription">Deskripsi produk akan ditampilkan di sini.</p>
                    <p>Stok: <span id="modalProductStock">-</span></p>

                    <div class="input-group mb-3" style="width: 140px;">
                        <button class="btn btn-outline-secondary" type="button" id="decreaseQty">-</button>
                        <input type="text" class="form-control text-center" value="1" id="productQty">
                        <button class="btn btn-outline-secondary" type="button" id="increaseQty">+</button>
                    </div>

                    <button class="btn text-white fw-semibold" style="background-color:#ffc7bd">
                        Masukkan ke Keranjang
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
