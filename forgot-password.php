<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Atur Ulang Sandi - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f4; }
        .bg-kementan { background-color: #2d5a27; }
        .hero-pattern {
            background: linear-gradient(rgba(45, 90, 39, 0.9), rgba(45, 90, 39, 0.9)), 
            url('assets/BG-Simpenan.png');
            background-size: cover;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <header class="bg-kementan text-white py-4 px-8 border-b-4 border-yellow-400 shadow-lg">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
                <img src="assets/logo-simpenan.png" alt="Logo" class="w-10 h-auto object-contain">
                <h1 class="text-lg font-bold leading-none uppercase tracking-tighter">SIMPENAN<span class="text-yellow-400">.</span></h1>
            </div>
            <a href="login.php" class="text-xs font-bold uppercase tracking-widest hover:text-yellow-400 transition-colors">← Kembali</a>
        </div>
    </header>

    <main class="flex-grow hero-pattern flex items-center justify-center p-8">
        <div class="bg-white p-12 rounded-3xl shadow-2xl w-full max-w-md border-t-8 border-yellow-400 text-center">
            <div class="w-20 h-20 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto mb-8 border-2 border-emerald-100">
                <svg class="w-10 h-10 text-kementan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
            </div>
            
            <h2 class="text-3xl font-black italic uppercase tracking-tighter text-kementan mb-2">Lupa Sandi?</h2>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-8">Masukkan email terdaftar anda</p>

            <form action="api/prosesReset.php" method="POST" class="space-y-6 text-left">
                <div>
                    <label class="text-[10px] font-black uppercase text-kementan ml-1">Email Pemulihan</label>
                    <input type="email" name="email" required class="w-full border-2 border-gray-100 bg-gray-50 p-4 rounded-xl font-bold outline-none focus:border-kementan focus:bg-white transition-all">
                </div>
                <button type="submit" class="w-full bg-black text-white py-4 rounded-xl font-black uppercase text-xs tracking-[0.2em] shadow-lg hover:bg-kementan transition-all">
                    Kirim Link Reset
                </button>
            </form>

            <div class="mt-10">
                <a href="login.php" class="text-[10px] font-black uppercase text-gray-400 hover:text-kementan transition-colors tracking-widest italic">← Kembali ke Halaman Login</a>
            </div>
        </div>
    </main>

    <footer class="bg-[#1e3d1a] text-white py-6 px-8 border-t-[6px] border-yellow-400 mt-auto">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-[9px] font-black uppercase tracking-[0.4em] opacity-40">
                © 2026 Kementerian Pertanian
            </p>
        </div>
    </footer>

    <script src="assets/script.js"></script>
</body>
</html>