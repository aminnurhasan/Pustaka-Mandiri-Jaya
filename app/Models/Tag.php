<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama'
    ];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'tag_buku', 'tag_id', 'product_number_buku');
    }
}
