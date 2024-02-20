<?php
// app/Http/Controllers/BukuController.php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        return view('bukus.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'judul'     => 'required',
            'penulis'     => 'required',
            'penerbit'     => 'required',
            'tahun_terbit'     => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       
           
        ]);

        $buku = Buku::create([
            'judul'=>$request->judul,
            'penulis'=>$request->penulis,
            'penerbit'=>$request->penerbit,
            'tahun_terbit'=>$request->tahun_terbit,
            'foto' => $request->file('foto')->store('public/images'),
    
        ]);

        


        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }


    public function edit($bukuID)
    {
        $bukus = Buku::findOrFail($bukuID);
        return view('bukus.edit', compact('bukus'));
    }

    public function update(Request $request, $bukuID)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         
        ]);
    

        $buku = Buku::findOrFail($bukuID);
        $buku->update([
            'judul'     => $request->judul,
            'penulis'     => $request->penulis,
            'penerbit'     => $request->penerbit,
            'tahun_terbit'     => $request->tahun_terbit,
            'foto' => $request->file('foto')->store('public/images'),
           
        ]);

        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil diubah!');
    }

    public function destroy($bukuID)
    {
        $buku = Buku::findOrFail($bukuID);
        $buku->delete();

        return redirect()->route('bukus.index')->with(['success' => 'Buku Berhasil Dihapus!']);
    }

  
 

    
}
