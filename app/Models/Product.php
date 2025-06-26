<?php
namespace App\Models;

use App\Models\Category;
use App\Models\Gambar_Produk;
use App\Models\Keranjang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'slug', 'stok', 'harga', 'category_id'];
    protected $with     = ['category', 'gambars', 'keranjang'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);

    }
    public function gambars()
    {
        return $this->hasMany(Gambar_Produk::class, 'produk_id');
    }
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'product_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
