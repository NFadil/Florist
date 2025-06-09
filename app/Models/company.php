<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = [
        'nama',
        'slogan',
        'deskripsi',
        'visi',
        'misi',
        'about',
        'alamat',
        'email',
        'insta',
        'ytb',
        'fb',
        'telpon',
        'logo',
    ];
}
