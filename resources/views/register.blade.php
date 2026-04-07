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
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-100 p-10">
            
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-800 tracking-tight">Buat Akun</h2>
            </div>

            <form action="/register" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
                    <input type="text" name="name" placeholder="Masukkan nama Anda" required
                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 px-4 py-3.5 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all duration-200 placeholder:text-slate-400">
                </div>

                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-widest mb-2 ml-1">Alamat Email</label>
                    <input type="email" name="email" placeholder="nama@email.com" required
                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 px-4 py-3.5 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all duration-200 placeholder:text-slate-400">
                </div>

                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-widest mb-2 ml-1">Kata Sandi</label>
                    <input type="password" name="password" placeholder="••••••••" required
                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 px-4 py-3.5 rounded-2xl focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all duration-200 placeholder:text-slate-400">
                </div>

                <button type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-4 rounded-2xl shadow-lg shadow-indigo-200 transition-all duration-300 transform active:scale-[0.98] mt-4">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-10 text-center border-t border-slate-50 pt-8">
                <p class="text-slate-500 text-sm">
                    Sudah punya akun? 
                    <a href="/login" class="text-indigo-600 hover:text-indigo-700 font-semibold transition-colors">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>