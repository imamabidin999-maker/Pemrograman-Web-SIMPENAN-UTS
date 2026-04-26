<?php 
session_start(); include 'koneksi.php';
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Penyakit - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .sidebar { background-color: #1e3d1a; border-right: 5px solid #00CC33; }
        .neo-gov-card { border: 3px solid #1e3d1a; border-radius: 1.5rem; box-shadow: 6px 6px 0px 0px rgba(30, 61, 26, 1); }
        
        .text-kementan { color: #1e3d1a; }
        .dark .text-kementan { color: #00CC33 !important; }

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
<body class="flex min-h-screen">
        <aside class="w-72 sidebar text-white p-8 flex flex-col sticky top-0 h-screen shrink-0">
            <div class="flex flex-col items-center mb-10">
                <img src="../assets/logo-simpenan.png" alt="Logo" class="w-20 h-auto mb-4 object-contain">
                <h2 class="text-xl font-black italic uppercase text-center leading-none">
                    ADMIN<br><span class="text-[#00CC33]">PANEL.</span>
                </h2>
            </div>

            <nav id="sidebar-nav" class="space-y-3 flex-grow text-[10px] font-black uppercase tracking-widest">
                <a href="index.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Dashboard
                </a>
                <a href="kelola_user.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Kelola User
                </a>
                <a href="kelola_admin.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Kelola Admin
                </a>
                <a href="kelola_penyakit.php" class="flex items-center gap-3 p-3 rounded-xl border-2 border-[#1e3d1a] transition-all">
                    Kelola Penyakit
                </a>
            </nav>

            <div class="space-y-4">
                <button id="toggle-dark" class="w-full p-2 border-2 border-[#00CC33] rounded-xl text-[10px] font-black uppercase transition-all">
                    🌙 Mode Gelap
                </button>
                <a href="logout.php" class="block w-full bg-[#ff4d4d] border-[3px] border-[#1e3d1a] p-3 rounded-xl text-center font-black text-[10px] uppercase shadow-[3px_3px_0px_0px_rgba(30,61,26,1)]">
                    LOGOUT
                </a>
            </div>
        </aside>

    <main class="flex-1 p-12 flex flex-col items-start">
        <div class="w-full flex justify-between items-center mb-10">
            <h1 class="text-5xl font-black uppercase italic tracking-tighter text-[#1e3d1a]">Kelola Penyakit</h1>
            <a href="cetak_penyakit.php" target="_blank" class="bg-[#00CC33] border-2 border-[#1e3d1a] px-6 py-2 rounded-xl font-black text-[10px] uppercase shadow-[4px_4px_0px_0px_rgba(30,61,26,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">🖨️ Cetak Laporan</a>
        </div>

        <div class="bg-white neo-gov-card p-8 w-full mb-10">
            <h4 class="font-black uppercase text-xs mb-6 italic border-b-2 border-emerald-100 pb-2">Tambah Data Baru</h4>
                <form action="tambah_penyakit.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 block mb-1">Nama Penyakit</label>
                        <input type="text" name="nama_penyakit" required class="w-full border-2 border-[#1e3d1a] p-3 rounded-xl font-bold outline-none text-sm">
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 block mb-1">Gejala Utama</label>
                        <textarea name="gejala_utama" required class="w-full border-2 border-[#1e3d1a] p-3 rounded-xl font-bold outline-none text-sm h-20"></textarea>
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 block mb-1">Ciri-Ciri Penyakit</label>
                        <textarea name="ciri_ciri" class="w-full border-2 border-[#1e3d1a] p-3 rounded-xl font-bold outline-none text-sm h-24"></textarea>
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 block mb-1">Cara Penanganan</label>
                        <textarea name="penanganan" class="w-full border-2 border-[#1e3d1a] p-3 rounded-xl font-bold outline-none text-sm h-24"></textarea>
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase text-gray-400 block mb-1">Foto Penyakit (JPG/PNG)</label>
                        <input type="file" name="foto" class="w-full border-2 border-dashed border-[#1e3d1a] p-3 rounded-xl font-bold text-xs bg-gray-50">
                    </div>
                    
                    <button type="submit" class="w-full bg-[#1e3d1a] text-white py-4 rounded-xl font-black uppercase text-xs tracking-[0.2em] shadow-[4px_4px_0px_0px_#00CC33] hover:shadow-none transition-all mt-4">
                        Simpan Data Penyakit
                    </button>
                </form>
        </div>

        <div class="bg-white neo-gov-card overflow-hidden w-full max-w-6xl">
            <table class="w-full text-left">
                <thead class="bg-[#1e3d1a] text-white uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="p-5">No</th>
                        <th class="p-5">Nama Penyakit</th>
                        <th class="p-5">Gejala Utama</th>
                        <th class="p-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-bold text-xs text-gray-600">
                    <?php 
                    $res = mysqli_query($koneksi, "SELECT * FROM penyakit ORDER BY id DESC");
                    $no = 1; while($row = mysqli_fetch_assoc($res)): ?>
                    <tr class="border-b-2 border-gray-50 hover:bg-emerald-50 transition-colors">
                        <td class="p-5 text-gray-300"><?php echo $no++; ?></td>
                        <td class="p-6 italic uppercase text-kementan font-black">
                            <?php echo $row['nama_penyakit']; ?>
                        </td>
                        <td class="p-5"><?php echo $row['gejala_utama']; ?></td>
                        <td class="p-5 flex justify-center">
                            <a href="hapus_penyakit.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')" class="bg-red-500 text-white border-2 border-[#1e3d1a] px-4 py-1 rounded-lg text-[9px] font-black uppercase shadow-[2px_2px_0px_0px_rgba(30,61,26,1)] hover:shadow-none transition-all">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="../assets/script.js"></script>
</body>
</html>