<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    use HasFactory;
    protected $table = 'kategoribuku_relasi';

    protected $primaryKey = 'kategoribukuID';
    protected $fillable = ['bukuID','KategoriID'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'bukuID', 'bukuID');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriID', 'kategoriID');
    }
}
