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
<body class="bg-slate-50 min-h-screen p-4 md:p-10">

    <div class="max-w-5xl mx-auto space-y-10">
        
        <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Layanan Pengaduan</h1>
                <p class="text-slate-500 text-sm">Sampaikan keluhan Anda dengan mudah</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-5 py-2.5 rounded-xl font-semibold text-sm transition-all duration-200 flex items-center gap-2">
                    Keluar
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-slate-100 p-8 sticky top-10">
                    <h2 class="text-xl font-bold text-slate-800 mb-6">Kirim Pengaduan</h2>
                    
                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 text-sm p-4 rounded-xl mb-6 font-medium">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="/kirim" method="POST" class="space-y-5">
                        @csrf
                        <div>
                            <label class="block text-slate-700 text-xs font-bold uppercase tracking-widest mb-2 ml-1">Kategori</label>
                            <select name="kategori_id" id="kategori_id" required
                                class="w-full bg-slate-50 border border-slate-200 text-slate-900 px-4 py-3 rounded-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all">
                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-slate-700 text-xs font-bold uppercase tracking-widest mb-2 ml-1">Isi Pengaduan</label>
                            <textarea name="isi" id="isi" rows="5" placeholder="Jelaskan detail pengaduan..." required
                                class="w-full bg-slate-50 border border-slate-200 text-slate-900 px-4 py-3 rounded-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all placeholder:text-slate-400"></textarea>
                        </div>

                        <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-4 rounded-xl shadow-lg shadow-indigo-100 transition-all duration-300 transform active:scale-[0.98]">
                            Kirim Sekarang
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-slate-100 overflow-hidden">
                    <div class="p-8 border-b border-slate-50">
                        <h2 class="text-xl font-bold text-slate-800">Riwayat Pengaduan Saya</h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50">
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">No</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Kategori</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest w-1/3">Isi</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest text-center">Status</th>
                                    <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Feedback</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach($data as $d)
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="px-6 py-5 text-sm text-slate-500 font-medium">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-5">
                                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-semibold uppercase tracking-wider">
                                            {{ $d->kategori->nama_kategori }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-sm text-slate-700 leading-relaxed">
                                        {{ $d->isi_pengaduan }}
                                        <div class="mt-1 text-[11px] text-slate-400 italic">
                                            Progres: 
                                            @if($d->status == 'menunggu') Belum diproses @elseif($d->status == 'proses') Sedang diperbaiki @else Sudah selesai @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        @if($d->status == 'menunggu')
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 text-amber-600 border border-amber-100">🟡 Menunggu</span>
                                        @elseif($d->status == 'proses')
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-blue-50 text-blue-600 border border-blue-100">🔵 Proses</span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 text-emerald-600 border border-emerald-100">🟢 Selesai</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 text-sm text-slate-500 italic">
                                        {{ $d->feedback->isi_feedback ?? 'Menunggu tanggapan...' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>