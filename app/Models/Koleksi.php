<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;

    protected $table = 'koleksipribadi';

    protected $primaryKey = 'koleksiID';
    protected $fillable = ['id','bukuID'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'bukuID', 'bukuID');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
