<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'product_number';

    protected $fillable = [
        'product_number',
        'judul',
        'cover_buku',
        'deskripsi',
        'harga',
        'berat',
        'stok',
        'penulis',
        'jml_halaman',
        'dimensi',
        'isbn',
        'e_isbn',
        'tgl_terbit'
    ];

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'tag_buku', 'product_number_buku', 'tag_id');
    }
}
