<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBuku extends Model
{
    use HasFactory;
    protected $table = 'tag_buku';
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_number_buku',
        'tag_id'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'product_number_buku', 'product_number');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }
}
