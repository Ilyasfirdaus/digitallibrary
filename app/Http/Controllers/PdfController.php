<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF ;

class PdfController extends Controller
{
    public function index(Request $request)
    {
        $bukus = Buku::get();
        $peminjaman = Peminjaman::get();
        $users = User::get();
        $data = [
            'title' => 'Data Buku, Data Peminjaman dan Data Pengguna',
            'date' => date('d/m/Y'),
            'bukus' => $bukus,
            'peminjaman' => $peminjaman,
            'users' => $users,
        ];

        if($request->has('download'))
        {
            $pdf = PDF::loadView('pdf.index', $data)->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('laporan_list.pdf');
        }
        return view('pdf.index', $data);
    }
}
