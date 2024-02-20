<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakategori' => 'required',
          
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori buku berhasil ditambahkan!');
    }

    public function edit($kategoriID)
    {
        $kategori = Kategori::findOrFail($kategoriID);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $kategoriID)
    {
        $request->validate([
            'namakategori' => 'required',
           
        ]);

        $kategori = Kategori::findOrFail($kategoriID);
        $kategori->update([
            'namakategori'     => $request->namakategori,

        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori buku berhasil diubah!');
    }

    public function destroy($kategoriID)
    {
        $kategori=kategori::findOrFail($kategoriID);
        $kategori->delete();

        return redirect()->route('kategori.index')->with(['success' => 'Kategori buku Berhasil Dihapus!']);
    }
}
