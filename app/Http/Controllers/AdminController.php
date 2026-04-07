<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function index()
    {
        $data = Pengaduan::with('user','kategori')->get();
        return view('admin', compact('data'));
    }

   public function proses($id)
{
    $pengaduan = Pengaduan::findOrFail($id);
    $pengaduan->status = 'proses';
    $pengaduan->save();

    return redirect('/admin')->with('success', 'Pengaduan sedang diproses!');
}
    public function laporan(Request $request)
    {
        $query = Pengaduan::with('user','kategori');

        
        if ($request->tanggal) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->bulan) {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        
        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        $data = $query->get();

        $users = User::all();
        $kategori = Kategori::all();

        return view('laporan', compact('data','users','kategori'));

        
    }

     public function selesai($id)
    {
        $data = Pengaduan::findOrFail($id);
        $data->status = 'selesai';
        $data->save();

        return back()->with('success', 'Status diubah!');
    }

    public function feedback(Request $request, $id)
    {
        Feedback::create([
            'pengaduan_id' => $id,
            'isi_feedback' => $request->isi_feedback
        ]);

        return back()->with('success', 'Feedback dikirim!');
    }

    public function histori()
{
    $data = Pengaduan::with('user','kategori')
            ->where('status', 'selesai')
            ->get();

    return view('histori', compact('data'));
}

}