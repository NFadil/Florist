<?php
namespace App\Models;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    protected $table    = 'categories'; // atau nama tabel kamu
    protected $fillable = ['nama', 'slug', 'gambar'];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');

    }
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'category_id');
    }
}
