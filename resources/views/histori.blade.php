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

    <div class="max-w-5xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Histori Aspirasi</h1>
                <p class="text-slate-500 text-sm">Arsip pengaduan yang telah selesai diproses</p>
            </div>
            <div class="flex gap-3 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                <a href="/admin" class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-indigo-600 transition-colors">Dashboard</a>
                <span class="text-slate-200 self-center">|</span>
                <a href="/laporan" class="px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-600 hover:text-indigo-600 transition-colors">Laporan</a>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.03)] border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">No</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Pengadu</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Kategori</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest w-1/2">Isi Aspirasi</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($data as $d)
                        <tr class="hover:bg-slate-50/30 transition-colors group">
                            <td class="px-6 py-5 text-sm text-slate-400 font-medium text-center italic">{{ $loop->iteration }}</td>
                            <td class="px-6 py-5">
                                <p class="text-sm font-bold text-slate-700">{{ $d->user->name }}</p>
                                <p class="text-[10px] text-slate-400 uppercase tracking-tighter">ID: #{{ $d->id }}</p>
                            </td>
                            <td class="px-6 py-5">
                                <span class="bg-slate-100 text-slate-600 text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wider">
                                    {{ $d->kategori->nama_kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-5 text-sm text-slate-600 leading-relaxed">
                                {{ $d->isi_pengaduan }}
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                                    {{ $d->status }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($data->isEmpty())
            <div class="text-center py-24 bg-white">
                <div class="mb-4 inline-flex items-center justify-center w-16 h-16 bg-slate-50 rounded-full">
                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-slate-400 text-sm font-medium">Belum ada riwayat aspirasi yang selesai.</p>
            </div>
            @endif
        </div>
    </div>

</body>
</html>