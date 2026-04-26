<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun - SIMPENAN</title>
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
            <a href="index.php" class="text-xs font-bold uppercase tracking-widest hover:text-yellow-400 transition-colors">← Beranda</a>
        </div>
    </header>

    <main class="flex-grow hero-pattern flex items-center justify-center p-8">
        <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-lg border-t-8 border-yellow-400">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black italic uppercase tracking-tighter text-kementan">Buat Akun</h2>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Daftar untuk akses sistem informasi</p>
            </div>

            <form action="prosesRegister.php" method="POST" class="space-y-4">
                <div>
                    <label class="text-[10px] font-black uppercase text-kementan ml-1">Username</label>
                    <input type="text" name="username" required class="w-full border-2 border-gray-100 bg-gray-50 p-3 rounded-xl font-bold outline-none focus:border-kementan focus:bg-white transition-all italic uppercase">
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase text-kementan ml-1">Email</label>
                    <input type="email" name="email" required class="w-full border-2 border-gray-100 bg-gray-50 p-3 rounded-xl font-bold outline-none focus:border-kementan focus:bg-white transition-all">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-black uppercase text-kementan ml-1">Sandi</label>
                        <input type="password" name="password" required class="w-full border-2 border-gray-100 bg-gray-50 p-3 rounded-xl font-bold outline-none focus:border-kementan focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase text-kementan ml-1">Konfirmasi</label>
                        <input type="password" name="confirm_password" required class="w-full border-2 border-gray-100 bg-gray-50 p-3 rounded-xl font-bold outline-none focus:border-kementan focus:bg-white transition-all">
                    </div>
                </div>
                <button type="submit" name="register" class="w-full bg-yellow-400 text-kementan py-4 rounded-xl font-black uppercase text-xs tracking-[0.2em] shadow-lg hover:bg-kementan hover:text-white transition-all mt-4">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-8 text-center border-t-2 border-gray-50 pt-6">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                    Sudah punya akun? <a href="login.php" class="text-kementan hover:underline">Masuk di sini</a>
                </p>
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