<?php
namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar_Produk extends Model
{
    /** @use HasFactory<\Database\Factories\GambarProdukFactory> */
    use HasFactory;
    protected $fillable = ['produk_id', 'gambar'];
    public function produk()
    {
        return $this->belongsTo(Product::class, );
    }
}
