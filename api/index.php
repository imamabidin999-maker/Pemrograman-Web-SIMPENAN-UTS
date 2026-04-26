<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Penyakit Tanaman - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f8fafc; 
        }

        .bg-kementan { background-color: #2d5a27; }
        .border-kementan { border-color: #1e3d1a; }
        .text-kementan { color: #2d5a27; }

        .neo-gov-card {
            border: 3px solid #1e3d1a;
            border-radius: 1.5rem;
            box-shadow: 6px 6px 0px 0px rgba(30, 61, 26, 1);
            transition: all 0.2s ease;
        }
        .neo-gov-card:hover {
            box-shadow: 0px 0px 0px 0px rgba(30, 61, 26, 1);
            transform: translate(3px, 3px);
        }

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

    <div class="bg-[#1e3d1a] text-white text-[10px] py-2 px-8 hidden md:flex justify-end gap-6 uppercase font-bold tracking-[0.2em]">
        <a href="#" class="hover:text-[#00CC33] transition-colors">Peta Situs</a>
        <a href="#" class="hover:text-[#00CC33] transition-colors">Kontak Kami</a>
        <a href="#" class="hover:text-[#00CC33] transition-colors">FAQ</a>
    </div>

<header class="bg-kementan text-white py-4 px-8 sticky top-0 z-50 shadow-lg border-b-4 border-yellow-400">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-4">
            <img src="assets/logo-simpenan.png" alt="Logo" class="w-12 h-auto object-contain">
            <div>
                <h1 class="text-lg font-bold leading-none uppercase">SIMPENAN</h1>
                <p class="text-[10px] font-medium tracking-tighter opacity-80 uppercase italic">Sistem Informasi Penyakit Tanaman</p>
            </div>
        </div>
        
        <nav class="hidden lg:flex gap-6 text-xs font-bold uppercase tracking-wider items-center">
            <a href="index.php" class="text-yellow-400">Beranda</a>
            <a href="#" class="hover:text-yellow-400 transition-colors">Basis Data</a>
            <a href="#" class="hover:text-yellow-400 transition-colors">Publikasi</a>
            <a href="login.php" class="bg-yellow-400 text-kementan px-6 py-2 rounded-md hover:bg-white transition-all shadow-md">Masuk</a>
        </nav>
    </div>
</header>

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

    <section class="py-24 px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-xl">
                <h3 class="text-3xl font-black text-kementan uppercase tracking-tighter leading-none mb-4 italic">Layanan Utama</h3>
                <p class="text-gray-500 font-bold text-sm">Akses berbagai fitur unggulan SIMPENAN untuk meningkatkan produktivitas hasil tani Anda.</p>
            </div>
            <div class="h-1 flex-grow bg-gray-200 mb-2 mx-4 hidden md:block"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white neo-gov-card p-8 flex flex-col items-center text-center group cursor-pointer">
                <div class="w-20 h-20 bg-emerald-50 rounded-2xl border-2 border-kementan flex items-center justify-center mb-6 group-hover:bg-[#00CC33] transition-all">
                    <svg class="w-10 h-10 text-kementan group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                </div>
                <h4 class="font-black uppercase text-sm tracking-wider mb-2">Daftar Penyakit</h4>
                <p class="text-[10px] font-bold text-gray-400 uppercase">Ensiklopedia Penyakit Tanaman</p>
            </div>

            <div class="bg-white neo-gov-card p-8 flex flex-col items-center text-center group cursor-pointer">
                <div class="w-20 h-20 bg-emerald-50 rounded-2xl border-2 border-kementan flex items-center justify-center mb-6 group-hover:bg-[#00CC33] transition-all">
                    <svg class="w-10 h-10 text-kementan group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h4 class="font-black uppercase text-sm tracking-wider mb-2">Cari Informasi</h4>
                <p class="text-[10px] font-bold text-gray-400 uppercase">Pencarian Data Akurat</p>
            </div>

            <div class="bg-white neo-gov-card p-8 flex flex-col items-center text-center group cursor-pointer">
                <div class="w-20 h-20 bg-emerald-50 rounded-2xl border-2 border-kementan flex items-center justify-center mb-6 group-hover:bg-[#00CC33] transition-all">
                    <svg class="w-10 h-10 text-kementan group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h4 class="font-black uppercase text-sm tracking-wider mb-2">e-Library</h4>
                <p class="text-[10px] font-bold text-gray-400 uppercase">Modul Pembelajaran Tani</p>
            </div>

            <div class="bg-white neo-gov-card p-8 flex flex-col items-center text-center group cursor-pointer">
                <div class="w-20 h-20 bg-emerald-50 rounded-2xl border-2 border-kementan flex items-center justify-center mb-6 group-hover:bg-[#00CC33] transition-all">
                    <svg class="w-10 h-10 text-kementan group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h4 class="font-black uppercase text-sm tracking-wider mb-2">Konsultasi</h4>
                <p class="text-[10px] font-bold text-gray-400 uppercase">Hubungi Tenaga Ahli</p>
            </div>
        </div>
    </section>

    <footer class="bg-[#1e3d1a] text-white py-16 px-8 border-t-[6px] border-yellow-400">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-16">
            <div class="space-y-6">
                <h1 class="text-3xl font-black italic uppercase tracking-tighter">SIMPENAN<span class="text-[#00CC33]">.</span></h1>
                <p class="text-xs font-medium leading-relaxed opacity-60">
                    Sistem Informasi Penyakit Tanaman Terpadu merupakan platform resmi digital untuk pemantauan kesehatan ekosistem pertanian Indonesia.
                </p>
            </div>
            
            <div class="space-y-6">
                <h4 class="font-black uppercase text-xs tracking-[0.2em] text-yellow-400">Tautan Resmi</h4>
                <ul class="text-xs space-y-4 font-bold uppercase tracking-widest opacity-80">
                    <li><a href="#" class="hover:text-[#00CC33] transition-colors">Kementerian Pertanian</a></li>
                    <li><a href="#" class="hover:text-[#00CC33] transition-colors">Kementerian Perkebunan</a></li>
                    <li><a href="#" class="hover:text-[#00CC33] transition-colors">Kementerian Persawitan</a></li>
                </ul>
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