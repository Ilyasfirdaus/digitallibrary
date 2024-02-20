<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\UlasanBuku;
use Illuminate\Http\Request;

class UlasanBukuController extends Controller
{
    public function index()
    {
        $ulasanbuku = UlasanBuku::all();
        $bukus = Buku::all();
        $users = User::all();


        return view('ulasanbuku.index', compact('ulasanbuku','bukus', 'users'));
    }
    public function create()
    {
        return view('ulasanbuku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'bukuID' => 'required',
            'ulasan' => 'required',
            'rating' => 'required',
        ]);
        
        UlasanBuku::create([
            'id' => $request->user_id,
            'bukuID' => $request->bukuID,
            'ulasan' => $request->ulasan,
            'rating' => $request->rating,
        ]);
        

        return redirect()->route('ulasanbuku.index')
            ->with('success', 'Ulasan buku berhasil ditambahkan!');
    }

    public function edit($ulasanID)
    {
        $ulasanID = UlasanBuku::findOrFail($ulasanID);
        return view('ulasanbuku.edit', compact('ulasanbuku'));
    }

    public function update(Request $request, $ulasanID)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'bukuID' => 'required',
            'ulasan' => 'required',
            'rating' => 'required',
        ]);
    
        $ulasanbuku = UlasanBuku::find($ulasanID);
        $ulasanbuku->id = $request->id;
        $ulasanbuku->bukuID = $request->bukuID;
        $ulasanbuku->ulasan = $request->ulasan;
        $ulasanbuku->rating = $request->rating;
        $ulasanbuku->save();
    
        return redirect()->route('ulasanbuku.index')->with('success', 'Ulasan Buku Berhasil Diubah');
    }

    public function destroy($ulasanID)
    {
        $ulasanbuku= UlasanBuku::findOrFail($ulasanID);
        $ulasanbuku->delete();

        return redirect()->route('ulasanbuku.index')->with(['success' => 'Ulasan buku Berhasil Dihapus!']);
    }
}
