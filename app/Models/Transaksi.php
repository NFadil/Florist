<?php
namespace App\Models;

use App\Models\Category;
use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class Transaksi extends Model
{
    /** @use HasFactory<\Database\Factories\TransaksiFactory> */
    use HasFactory;
    protected $table    = 'transaksis'; // atau nama tabel kamu
    protected $fillable = [
        'id_pemesanan', 'user_id', 'product_id', 'category_id', 'keranjang_id',
        'qty', 'total_harga', 'status', 'alamat_pengiriman', 'catatan',
    ];
    protected $with = ['category', 'keranjang', 'product'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);

    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);

    }
    public function keranjang(): BelongsTo
    {
        return $this->belongsTo(Keranjang::class);

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
