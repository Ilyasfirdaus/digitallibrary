<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanBuku extends Model
{
    use HasFactory;
    protected $table = 'ulasanbuku';
    protected $primaryKey = 'ulasanID';
    protected $fillable = ['id', 'bukuID', 'ulasan', 'rating'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'bukuID', 'bukuID');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
