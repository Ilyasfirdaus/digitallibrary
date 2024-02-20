<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
      
    }

    public function store(Request $request)
    {

       
    }


    public function edit($id)
    {
     
    }

    public function update(Request $request, $id)
    {
     
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->route('users.index')->with(['success' => 'Buku Berhasil Dihapus!']);
    }
}
