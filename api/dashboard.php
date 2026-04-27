<?php 
session_start(['cookie_path' => '/']);
include 'koneksi.php';
if(!isset($_SESSION['username'])) { 

    header("Location: /login"); 
    exit(); 
}
?>
<?php

$penyakit_lokal = [];
$get_local = mysqli_query($koneksi, "SELECT * FROM penyakit");
while($row = mysqli_fetch_assoc($get_local)) {

    $penyakit_lokal[strtolower($row['nama_penyakit'])] = [
        'gejala' => $row['gejala_utama'],
        'ciri' => $row['ciri_ciri'],
        'penanganan' => $row['penanganan'],
        'foto' => $row['foto']
    ];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog Penyakit - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <script>

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; transition: all 0.3s ease; }
        .bg-kementan { background-color: #2d5a27; }
        .neo-gov-card { border: 3px solid #1e3d1a; border-radius: 2rem; box-shadow: 6px 6px 0px 0px rgba(30, 61, 26, 1); }

        .dark body { background-color: #0f172a !important; color: white !important; }
        
        .dark .bg-white { background-color: #1e293b !important; color: #f8fafc !important; }
        
        .dark .neo-gov-card { 
            border-color: #00CC33 !important; 
            box-shadow: 6px 6px 0px 0px #00CC33 !important; 
        }

        .dark .text-\[\#1e3d1a\], 
        .dark .text-kementan, 
        .dark h2, 
        .dark td.italic { 
            color: #00CC33 !important; 
        }

        .dark tbody tr:hover { background-color: #334155 !important; }
        .dark tbody tr { border-color: #334155 !important; color: #f8fafc !important; }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-[#f4f7f4]">

    <header class="bg-kementan text-white py-5 px-10 border-b-[4px] border-yellow-400 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center gap-4">
            <img src="assets/logo-simpenan.png" alt="Logo" class="w-12 h-auto object-contain">
            <h1 class="text-2xl font-black italic uppercase tracking-tighter">SIMPENAN<span class="text-yellow-400">.</span></h1>
        </div>

        <div class="flex items-center gap-10">
            <div class="flex flex-col items-end border-r-2 border-white/20 pr-6 hidden md:flex">
                <div id="clock" class="text-xl font-black italic leading-none">00:00:00</div>
                <div id="greeting" class="text-[9px] font-bold uppercase tracking-widest opacity-60"></div>
            </div>
            <button id="toggle-dark" class="bg-white/10 p-2 border-2 border-white/20 rounded-xl text-[9px] font-black uppercase hover:bg-yellow-400 hover:text-kementan transition-all">
                🌙 Mode Gelap
            </button>
            <a href="logout.php" class="bg-red-500 border-2 border-[#1e3d1a] px-6 py-2 rounded-xl text-[10px] font-black uppercase shadow-[3px_3px_0px_0px_rgba(30,61,26,1)]">Keluar</a>
        </div>
    </header>

    <main class="max-w-6xl mx-auto p-12 w-full flex-grow">
        <div class="mt-12 w-full">
            <div class="bg-white dark:bg-slate-800 neo-gov-card p-8 mb-6 border-l-8 border-yellow-400 flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <h2 class="text-3xl font-black uppercase italic tracking-tighter text-[#1e3d1a] dark:text-[#00CC33]">Monitoring OPT Terpadu</h2>
                    <p class="font-bold text-gray-400 uppercase text-[10px] tracking-[0.2em]">Katalog Gejala & Statistik Luas Serangan BPS</p>
                </div>
                <div class="w-full md:w-72 relative">
                    <input type="text" id="search-opt" placeholder="Cari Hama/Penyakit..." 
                        class="w-full bg-gray-50 dark:bg-slate-900 border-2 border-[#1e3d1a] dark:border-[#00CC33] p-3 rounded-xl font-bold outline-none text-xs shadow-[4px_4px_0px_0px_rgba(30,61,26,1)] dark:shadow-[4px_4px_0px_0px_#00CC33] transition-all">
                </div>
            </div>

            <div class="bg-white dark:bg-slate-800 neo-gov-card overflow-hidden w-full">
                <table class="w-full text-left">
                    <thead class="bg-[#1e3d1a] text-white uppercase text-[10px] font-black tracking-widest text-center">
                        <tr>
                            <th class="p-5">No</th>
                            <th class="p-5">Jenis OPT</th>
                            <th class="p-5 text-yellow-400">Kategori</th> 
                            <th class="p-5">Ringan</th>
                            <th class="p-5">Sedang</th>
                            <th class="p-5">Berat</th>
                            <th class="p-5">Puso</th>
                            <th class="p-5">Gejala Utama</th>
                        </tr>
                    </thead>
                    <tbody id="merged-data-body" class="font-bold text-sm text-gray-600 dark:text-gray-300">
                        </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="bg-[#1e3d1a] text-white py-16 px-10 border-t-[6px] border-yellow-400">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-16">
            <div class="space-y-6">
                <h1 class="text-3xl font-black italic uppercase tracking-tighter">SIMPENAN<span class="text-[#00CC33]">.</span></h1>
                <p class="text-xs font-medium leading-relaxed opacity-60">Sistem Informasi Penyakit Tanaman Terpadu merupakan platform resmi digital untuk pemantauan kesehatan ekosistem pertanian Indonesia.</p>
            </div>
            <div class="space-y-6">
                <h4 class="font-black uppercase text-xs tracking-[0.2em] text-yellow-400">Layanan User</h4>
                <ul class="text-xs space-y-4 font-bold uppercase tracking-widest opacity-80">
                    <li><a href="#" class="hover:text-[#00CC33] transition-colors">Panduan Penggunaan</a></li>
                    <li><a href="#" class="hover:text-[#00CC33] transition-colors">Laporkan Masalah</a></li>
                    <li><a href="#" class="hover:text-[#00CC33] transition-colors">Pusat Bantuan</a></li>
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
        <div class="max-w-6xl mx-auto mt-16 pt-8 border-t border-white border-opacity-10 text-center">
            <p class="text-[9px] font-black uppercase tracking-[0.4em] opacity-40">© 2026 Kementerian Pertanian</p>
        </div>
    </footer>

<div id="modal-detail" class="hidden fixed inset-0 bg-black/60 z-[100] items-center justify-center p-6 backdrop-blur-sm">
    <div class="bg-white dark:bg-slate-800 neo-gov-card w-full max-w-2xl overflow-hidden">
        <div class="bg-kementan p-6 border-b-4 border-yellow-400 flex justify-between items-center">
            <h3 id="modal-title" class="text-white font-black uppercase italic tracking-tighter text-2xl">Detail</h3>
            <button onclick="closeModal()" class="text-white hover:text-yellow-400 font-black text-2xl">&times;</button>
        </div>
        
        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <h4 class="text-[10px] font-black uppercase text-gray-400 mb-1">Ciri-Ciri</h4>
                    <p id="modal-ciri" class="text-sm font-bold text-[#1e3d1a] dark:text-emerald-400"></p>
                </div>
                <div>
                    <h4 class="text-[10px] font-black uppercase text-gray-400 mb-1">Penanganan</h4>
                    <p id="modal-penanganan" class="text-sm font-medium text-gray-600 dark:text-gray-300"></p>
                </div>
            </div>
            <div class="space-y-4 text-center">
                <img id="modal-foto" src="" class="w-full rounded-2xl border-4 border-kementan shadow-lg">
            </div>
        </div>
    </div>
</div>

    <script>
        const dataGejalaLokal = <?php echo json_encode($penyakit_lokal); ?>;
    </script>

    <script src="assets/script.js"></script>
</body>
</html>