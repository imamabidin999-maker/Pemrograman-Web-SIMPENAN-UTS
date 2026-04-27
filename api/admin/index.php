<?php 
session_start(['cookie_path' => '/']); 
include __DIR__ . '/../koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') { 
    header("Location: /login"); 
    exit(); 
}

$total_user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM users WHERE role = 'user'"));
$total_penyakit = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penyakit"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; transition: background 0.3s ease; }
        .sidebar { background-color: #1e3d1a; border-right: 5px solid #00CC33; }
        .neo-gov-card { border: 3px solid #1e3d1a; border-radius: 1.5rem; box-shadow: 6px 6px 0px 0px rgba(30, 61, 26, 1); }

        .dark body { background-color: #0f172a !important; color: #f8fafc !important; }
        
        .dark .neo-gov-card { 
            background-color: #1e293b !important; 
            border-color: #00CC33 !important; 
            box-shadow: 6px 6px 0px 0px #00CC33 !important; 
        }

        .dark input, .dark select, .dark textarea {
            background-color: #0f172a !important;
            color: #f8fafc !important;
            border-color: #00CC33 !important;
        }
        .dark label { color: #f8fafc !important; opacity: 0.9; }

        .dark .bg-\[\#00CC33\], .dark .bg-emerald-500, .dark .bg-green-500 {
            background-color: #00CC33 !important;
            color: #1e3d1a !important;
            box-shadow: 4px 4px 0px 0px #f8fafc !important;
        }

        .dark button[type="submit"].bg-black, .dark .bg-\[\#1e3d1a\] {
            background-color: #00CC33 !important;
            color: #1e3d1a !important;
            border-color: #f8fafc !important;
            box-shadow: 4px 4px 0px 0px #f8fafc !important;
        }

        .dark .bg-red-500 {
            border-color: #f8fafc !important;
            box-shadow: 3px 3px 0px 0px #f8fafc !important;
        }

        .dark .bg-yellow-400 {
            background-color: #fbbf24 !important;
            color: #1e3d1a !important;
            box-shadow: 3px 3px 0px 0px #f8fafc !important;
        }

        .dark thead.bg-\[\#1e3d1a\] { background-color: #00CC33 !important; }
        .dark thead th { color: #1e3d1a !important; }
    </style>
</head>
<body class="flex min-h-screen bg-[#f8fafc]">
        <aside class="w-72 sidebar text-white p-8 flex flex-col sticky top-0 h-screen shrink-0">
            <div class="flex flex-col items-center mb-10">
                <img src="/assets/logo-simpenan.png" alt="Logo" class="w-20 h-auto mb-4 object-contain">
                <h2 class="text-xl font-black italic uppercase text-center leading-none">
                    ADMIN<br><span class="text-[#00CC33]">PANEL.</span>
                </h2>
            </div>

            <nav id="sidebar-nav" class="space-y-3 flex-grow text-[10px] font-black uppercase tracking-widest">
                <a href="/admin/index.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Dashboard
                </a>
                <a href="/admin/kelola_user.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Kelola User
                </a>
                <a href="/admin/kelola_penyakit.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Kelola Admin
                </a>
                <a href="/admin/kelola_admin.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Kelola Penyakit
                </a>
            </nav>

            <div class="space-y-4">
                <button id="toggle-dark" class="w-full p-2 border-2 border-[#00CC33] rounded-xl text-[10px] font-black uppercase transition-all">
                    🌙 Mode Gelap
                </button>
                <a href="/api/logout.php" class="block w-full bg-[#ff4d4d] border-[3px] border-[#1e3d1a] p-3 rounded-xl text-center font-black text-[10px] uppercase shadow-[3px_3px_0px_0px_rgba(30,61,26,1)]">
                    LOGOUT
                </a>
            </div>
        </aside>

    <main class="flex-1 p-12 flex flex-col items-start">
        <header class="w-full flex justify-between items-center mb-12">
            <div>
                <h1 class="text-5xl font-black uppercase italic tracking-tighter text-[#1e3d1a]">Panel Kendali</h1>
                <p class="font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em]">Sistem Informasi Penyakit Tanaman</p>
            </div>
            
            <div class="flex flex-col items-end text-[#1e3d1a]">
                <div id="clock" class="text-2xl font-black italic">00:00:00</div>
                <div id="greeting" class="text-[10px] font-bold uppercase tracking-widest opacity-60"></div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full items-start">
            <div class="bg-white neo-gov-card p-8">
                <p class="text-[10px] font-black uppercase text-gray-400 mb-4 tracking-widest">Total Petani</p>
                <h3 class="text-7xl font-black italic text-[#00CC33] mb-4"><?php echo $total_user; ?></h3>
                <a href="kelola_user.php" class="text-[10px] font-black uppercase text-[#00CC33] hover:underline">Kelola Data →</a>
            </div>
            <div class="bg-[#00CC33] neo-gov-card p-8 text-[#1e3d1a]">
                <p class="text-[10px] font-black uppercase mb-4 opacity-60 tracking-widest">Katalog Penyakit</p>
                <h3 class="text-7xl font-black italic mb-4"><?php echo $total_penyakit; ?></h3>
                <p class="text-[10px] font-black uppercase opacity-60 italic">Data Terverifikasi</p>
            </div>
            <div class="bg-white neo-gov-card p-8">
                <h4 class="font-black uppercase text-xs mb-3 italic tracking-widest border-b-2 border-[#00CC33] inline-block">Info Server</h4>
                <p class="text-[11px] font-bold text-gray-500 leading-relaxed uppercase">Status: <span class="text-green-500">Connected</span><br>Database: Data SIMPENAN</p>
            </div>
        </div>
    </main>

    <script src="/assets/script.js"></script>
</body>
</html>