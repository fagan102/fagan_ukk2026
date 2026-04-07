<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen p-6 md:p-10">

    <div class="max-w-6xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Laporan Pengaduan</h1>
                <p class="text-slate-500 text-sm">Rekapitulasi data pengaduan masyarakat</p>
            </div>
            <div class="flex gap-3 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                <a href="/admin" class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-indigo-600 transition-colors">Dashboard</a>
                <span class="text-slate-200 self-center">|</span>
                <a href="/histori" class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-indigo-600 transition-colors">Histori</a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-slate-100 mb-8">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Tanggal</label>
                    <input type="date" name="tanggal" 
                        class="w-full bg-slate-50 border border-slate-200 text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Bulan</label>
                    <select name="bulan" class="w-full bg-slate-50 border border-slate-200 text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all">
                        <option value="">Semua Bulan</option>
                        @php
                            $bulanArr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        @endphp
                        @foreach($bulanArr as $key => $namaBulan)
                            <option value="{{ $key + 1 }}">{{ $namaBulan }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Siswa</label>
                    <select name="user_id" class="w-full bg-slate-50 border border-slate-200 text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all">
                        <option value="">Semua Siswa</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Kategori</label>
                    <select name="kategori_id" class="w-full bg-slate-50 border border-slate-200 text-sm px-4 py-2.5 rounded-xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all">
                        <option value="">Semua Kategori</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-indigo-100 transition-all transform active:scale-95 text-sm">
                    Terapkan Filter
                </button>
            </form>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">No</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Nama Pelapor</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Kategori</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest w-1/3">Isi Pengaduan</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($data as $d)
                        <tr class="hover:bg-slate-50/30 transition-colors">
                            <td class="px-6 py-5 text-sm text-slate-400 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-5 text-sm font-bold text-slate-700">{{ $d->user->name }}</td>
                            <td class="px-6 py-5">
                                <span class="bg-indigo-50 text-indigo-600 text-[10px] font-bold px-2.5 py-1 rounded-lg uppercase">
                                    {{ $d->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-sm text-slate-600 leading-relaxed">{{ $d->isi_pengaduan }}</td>
                            <td class="px-6 py-5 text-sm">
                                <span class="font-bold uppercase text-[10px] {{ $d->status == 'selesai' ? 'text-emerald-500' : 'text-amber-500' }}">
                                    {{ $d->status == 'selesai' ? '● Selesai' : '○ ' . $d->status }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-sm text-slate-500 text-right font-medium">
                                {{ $d->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($data->isEmpty())
            <div class="text-center py-20">
                <p class="text-slate-400 text-sm">Tidak ada data yang ditemukan.</p>
            </div>
            @endif
        </div>
    </div>

</body>
</html>