<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen p-6 md:p-12">

    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100 mb-8 gap-4">
            <div class="flex gap-4">
                <a href="/laporan" class="text-slate-600 hover:text-indigo-600 font-semibold text-sm transition-colors uppercase tracking-wider">Laporan</a>
                <span class="text-slate-200">|</span>
                <a href="/histori" class="text-slate-600 hover:text-indigo-600 font-semibold text-sm transition-colors uppercase tracking-wider">Histori</a>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-6 py-2 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">
                    Logout
                </button>
            </form>
        </div>

        <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-2">
            <span class="w-2 h-8 bg-indigo-600 rounded-full"></span>
            Daftar Tugas Pengaduan
        </h2>

        <div class="space-y-6">
            @foreach($data as $d)
            <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-slate-100 p-8">
                
                <div class="flex justify-between items-start mb-4">
                    <div class="flex-1">
                        <p class="text-slate-700 leading-relaxed text-lg font-medium">
                            {{ $d->isi_pengaduan }}
                        </p>
                    </div>
                    <span class="ml-4 px-3 py-1 rounded-lg text-[10px] font-bold uppercase tracking-tighter 
                        {{ $d->status == 'selesai' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600' }}">
                        {{ $d->status }}
                    </span>
                </div>

                <div class="flex flex-col md:flex-row md:items-end gap-6 mt-8 pt-6 border-t border-slate-50">
                    
                    <div class="flex-1 text-left">
                        <label class="block text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-3">Beri Tanggapan (Feedback)</label>
                        <form method="POST" action="/feedback/{{ $d->id }}" class="flex gap-2">
                            @csrf
                            <input name="isi_feedback" placeholder="Tulis instruksi atau balasan..." required
                                class="flex-1 bg-slate-50 border border-slate-200 text-sm px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                            <button class="bg-slate-800 hover:bg-slate-900 text-white px-5 py-3 rounded-xl text-sm font-semibold transition-all">
                                Kirim
                            </button>
                        </form>
                    </div>

                    <div class="flex gap-2">
                        @if($d->status != 'selesai')
                        <a href="/selesai/{{ $d->id }}" 
                           class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl text-sm font-bold shadow-lg shadow-indigo-100 transition-all active:scale-95">
                            Selesaikan Tugas
                        </a>
                        @endif
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        @if($data->isEmpty())
        <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200">
            <p class="text-slate-400 text-sm">Tidak ada pengaduan yang perlu diproses.</p>
        </div>
        @endif

    </div>
</body>
</html>