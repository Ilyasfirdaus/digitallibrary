<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
        $bukus = Buku::all();
        $users = User::all();

        return view('peminjaman.index' ,compact('peminjaman','bukus', 'users'));
    }
    public function create()
    {
        return view('peminjaman.create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'bukuID' => 'required|integer',
            'id' => 'required|integer',
            'tanggalpeminjaman' => 'required|date',
            'tanggalpengembalian' => 'date|after_or_equal:tanggalpeminjaman',
            'statuspeminjaman' => 'required|integer|min:0|max:1',
        ]);

    $peminjaman = Peminjaman::create([
        'bukuID' => $request->bukuID,
        'id' => $request->id,
        'tanggalpeminjaman' => $request->tanggalpeminjaman,
        'tanggalpengembalian' => $request->tanggalpengembalian,
        'statuspeminjaman' => $request->statuspeminjaman,
    ]);

    $buku = Buku::find($request->bukuID);

    return redirect()->route('peminjaman.index')
        ->with('success', 'Buku berhasil Dipinjam!');

    }

    public function edit($peminjamanID, $bukuID)
    {
        $peminjaman= Peminjaman::findOrFail($peminjamanID);
        return view('peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $peminjamanID)
    {
        $request->validate([
            'statuspeminjaman' => 'required|integer|min:0|max:1',
        ]);
    
        $peminjaman = Peminjaman::findOrFail($peminjamanID);
        $peminjaman->update([
            'statuspeminjaman' => $request->statuspeminjaman,
        ]);
       

        return redirect()->route('peminjaman.index')
            ->with('success', 'Buku Telah Dikembalikan!');
    }

  

  
}
