<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategoribuku = KategoriBuku::all();
        $bukus = Buku::all();
        $kategori = Kategori::all();


        return view('kategoribuku.index', compact('kategoribuku','bukus', 'kategori'));
    }
    public function create()
    {
        return view('kategoribuku.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'bukuID' => 'required',
            'kategoriID' => 'required',
          
        ]);

        KategoriBuku::create([
            'bukuID'=>$request->bukuID,
            'KategoriID'=>$request->kategoriID,
        ]);
        
        

        return redirect()->route('kategoribuku.index')
            ->with('success', 'Kategori buku berhasil ditambahkan!');
    }

    public function edit($kategoribukuID)
    {
        $kategoribuku = KategoriBuku::findOrFail($kategoribukuID);
        return view('kategoribuku.edit', compact('kategoribuku_relasi'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bukuID' => 'required',
            'kategoriID' => 'required',
        ]);
    
        $kategoribuku = KategoriBuku::find($id);
        $kategoribuku->bukuID = $request->bukuID;
        $kategoribuku->kategoriID = $request->kategoriID;
        $kategoribuku->save();
    
        return redirect()->route('kategoribuku.index')->with('success', 'Kategori Buku Berhasil Diubah');
    }

    public function destroy($kategoribukuID)
    {
        $kategoribuku=KategoriBuku::findOrFail($kategoribukuID);
        $kategoribuku->delete();

        return redirect()->route('kategoribuku.index')->with(['success' => 'Kategori buku Berhasil Dihapus!']);
    }
}
