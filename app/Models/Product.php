<?php
namespace App\Models;

use App\Models\Category;
use App\Models\Gambar_Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'slug', 'stok', 'harga', 'category_id'];
    protected $with     = ['Category'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);

    }
    public function gambars()
    {
        return $this->hasMany(Gambar_Produk::class, 'produk_id');
    }
}
