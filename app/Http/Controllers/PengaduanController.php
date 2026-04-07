<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
   public function index()
{
    $data = Pengaduan::with('kategori','feedback')
            ->where('user_id', auth()->id())
            ->get();

    $kategori = Kategori::all();

    return view('dashboard', compact('data','kategori'));
}
    public function store(Request $request)
    {
        Pengaduan::create([
            'user_id' => auth()->id(),
            'kategori_id' => $request->kategori_id,
            'isi_pengaduan' => $request->isi,
            'status' => 'menunggu'
        ]);

        return back()->with('success', 'Berhasil kirim!');
    }
}