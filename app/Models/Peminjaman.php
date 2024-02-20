<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjamanID';
    protected $fillable = ['id', 'bukuID', 'tanggalpeminjaman', 'tanggalpengembalian','statuspeminjaman'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'bukuID', 'bukuID');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
