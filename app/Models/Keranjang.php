<?php
namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    /** @use HasFactory<\Database\Factories\KeranjangFactory> */
    use HasFactory;
    protected $fillable = ['authauthor_id', 'product_id', 'category_id', 'qty'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
