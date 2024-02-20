<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Koleksi;


use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksipribadi = Koleksi::all();
        $bukus = Buku::all();
        $users = User::all();


        return view('koleksi.index', compact('koleksipribadi','bukus', 'users'));
    }
  

    public function store(Request $request)
    {
        $request->validate([

            'user_id' => 'required',
            'bukuID' => 'required',
          
        ]);

        Koleksi::create([
            'id' => $request->user_id,
            'bukuID' => $request->bukuID,
        ]);
        
        

        return redirect()->route('koleksi.index')
            ->with('success', 'Koleksi Pribadi berhasil ditambahkan!');
    }

    public function edit($koleksiID)
    {
        $koleksipribadi = Koleksi::findOrFail($koleksiID);
        return view('koleksi.edit', compact('koleksipribadi'));
    }

    public function update(Request $request, $koleksiID)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'bukuID' => 'required',
        ]);
    
        $koleksipribadi = Koleksi::find($koleksiID);
        $koleksipribadi->id = $request->id;
        $koleksipribadi->bukuID = $request->bukuID;
        $koleksipribadi->save();
    
        return redirect()->route('koleksi.index')->with('success', 'Koleksi Pribadi Berhasil Diubah');
    }

    public function destroy($koleksiID)
    {
        $koleksipribadi=Koleksi::findOrFail($koleksiID);
        $koleksipribadi->delete();

        return redirect()->route('koleksi.index')->with(['success' => 'Koleksi Pribadi Berhasil Dihapus!']);
    }
}
