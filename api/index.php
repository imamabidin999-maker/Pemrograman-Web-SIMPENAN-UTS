<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Penyakit Tanaman - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .bg-kementan { background-color: #2d5a27; }
        .text-kementan { color: #2d5a27; }
        .btn-taktil {
            border: 3px solid #1e3d1a;
            box-shadow: 4px 4px 0px 0px rgba(30, 61, 26, 1);
            transition: all 0.15s ease-in-out;
        }
        .btn-taktil:hover {
            box-shadow: 0px 0px 0px 0px rgba(30, 61, 26, 1);
            transform: translate(4px, 4px);
        }
        .hero-section {
            background: linear-gradient(rgba(45, 90, 39, 0.85), rgba(45, 90, 39, 0.85)), 
                        url('assets/BG-Simpenan.png');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>

<!-- Header: hanya Beranda & Masuk yang berfungsi, sisanya dihapus -->
<header class="bg-kementan text-white py-4 px-8 sticky top-0 z-50 shadow-lg border-b-4 border-yellow-400">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="assets/logo-simpenan.png" alt="Logo" class="w-12 h-auto object-contain">
            <div>
                <h1 class="text-lg font-bold leading-none uppercase">SIMPENAN</h1>
                <p class="text-[10px] font-medium tracking-tighter opacity-80 uppercase italic">Sistem Informasi Penyakit Tanaman</p>
            </div>
        </div>
        <nav class="flex gap-6 text-xs font-bold uppercase tracking-wider items-center">
            <a href="index.php" class="text-yellow-400">Beranda</a>
            <a href="login.php" class="bg-yellow-400 text-kementan px-6 py-2 rounded-md hover:bg-white transition-all shadow-md">Masuk</a>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="hero-section h-[550px] flex items-center justify-center text-center text-white px-6">
    <div class="max-w-4xl">
        <span class="bg-[#00CC33] text-[#1e3d1a] px-4 py-1 rounded-full border-2 border-[#1e3d1a] text-[10px] font-black uppercase tracking-widest mb-6 inline-block shadow-[3px_3px_0px_0px_rgba(30,61,26,1)]">
            Update Dashboard 2026
        </span>
        <h2 class="text-4xl md:text-6xl font-black mb-6 leading-none uppercase italic tracking-tighter">
            Digitalisasi Kesehatan <br> Tanaman Nasional
        </h2>
        <p class="text-sm md:text-lg mb-10 opacity-90 font-medium max-w-2xl mx-auto leading-relaxed">
            Mendukung swasembada pangan dengan identifikasi penyakit tanaman yang cerdas, cepat, dan akurat untuk petani Indonesia.
        </p>
        <div class="flex flex-wrap justify-center gap-6">
            <a href="register.php" class="btn-taktil bg-white text-kementan px-10 py-4 rounded-xl font-black uppercase text-xs tracking-widest">
                Daftar Sekarang
            </a>
            <a href="login.php" class="btn-taktil bg-yellow-400 text-kementan px-10 py-4 rounded-xl font-black uppercase text-xs tracking-widest">
                Lihat Basis Data
            </a>
        </div>
    </div>
</section>

<!-- Footer: kartu layanan & tautan tidak berfungsi dihapus, hanya info tersisa -->
<footer class="bg-[#1e3d1a] text-white py-16 px-8 border-t-[6px] border-yellow-400">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16">
        <div class="space-y-6">
            <h1 class="text-3xl font-black italic uppercase tracking-tighter">SIMPENAN<span class="text-[#00CC33]">.</span></h1>
            <p class="text-xs font-medium leading-relaxed opacity-60">
                Sistem Informasi Penyakit Tanaman Terpadu merupakan platform resmi digital untuk pemantauan kesehatan ekosistem pertanian Indonesia.
            </p>
        </div>
        <div class="space-y-6">
            <h4 class="font-black uppercase text-xs tracking-[0.2em] text-yellow-400">Kantor Pusat</h4>
            <p class="text-xs font-bold leading-loose opacity-80">
                Jl. Imam Bonjol No. 123, <br>
                Gedung Merdeka Lt. 6, <br>
                Mejayan, Madiun, Jawa Timur.
            </p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-16 pt-8 border-t border-white border-opacity-10 text-center">
        <p class="text-[9px] font-black uppercase tracking-[0.4em] opacity-40">© 2026 Kementerian Pertanian</p>
    </div>
</footer>

<script src="assets/script.js"></script>
</body>
</html>