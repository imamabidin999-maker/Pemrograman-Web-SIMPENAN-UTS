<?php 
session_start(); include '../api/koneksi.php';
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Admin - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .sidebar { background-color: #1e3d1a; border-right: 5px solid #00CC33; }
        .neo-gov-card { border: 3px solid #1e3d1a; border-radius: 1.5rem; box-shadow: 6px 6px 0px 0px rgba(30, 61, 26, 1); }
    
        .text-kementan { color: #1e3d1a; transition: all 0.3s; }
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
                <a href="../api/logout.php" class="block w-full bg-[#ff4d4d] border-[3px] border-[#1e3d1a] p-3 rounded-xl text-center font-black text-[10px] uppercase shadow-[3px_3px_0px_0px_rgba(30,61,26,1)]">
                    LOGOUT
                </a>
            </div>
        </aside>

    <main class="flex-1 p-12 flex flex-col items-start">
        <h1 class="text-5xl font-black uppercase italic tracking-tighter text-[#1e3d1a] mb-2">Manajemen Admin</h1>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-10">Daftar Tim Pengelola Sistem</p>
        
        <div class="bg-white neo-gov-card overflow-hidden w-full max-w-5xl">
            <table class="w-full text-left">
                <thead class="bg-[#1e3d1a] text-white uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="p-5">ID</th>
                        <th class="p-5">Username</th>
                        <th class="p-5">Akses</th>
                        <th class="p-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-bold text-xs">

                <?php if (strtolower($_SESSION['username']) === 'imam'): ?>
                <div class="bg-white neo-gov-card p-8 w-full mb-10">
                    <h4 class="font-black uppercase text-xs mb-6 italic border-b-2 border-emerald-100 pb-2 text-kementan">Otoritas Master: Tambah Admin Baru</h4>
                    <form action="../api/tambah_admin.php" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                        <div>
                            <label class="text-[9px] font-black uppercase block mb-1 ml-1 text-[#1e3d1a]">Username Admin</label>
                            <input type="text" name="username" required class="w-full border-2 border-[#1e3d1a] p-3 rounded-xl font-bold bg-white/50 outline-none">
                        </div>
                        <div>
                            <label class="text-[9px] font-black uppercase block mb-1 ml-1 text-[#1e3d1a]">Password Sementara</label>
                            <input type="password" name="password" required class="w-full border-2 border-[#1e3d1a] p-3 rounded-xl font-bold bg-white/50 outline-none">
                        </div>
                        <button type="submit" class="bg-black text-white px-8 py-3 rounded-xl border-2 border-[#1e3d1a] font-black uppercase text-[10px] shadow-[4px_4px_0px_0px_rgba(30,61,26,1)] hover:bg-[#00CC33] hover:text-[#1e3d1a] transition-all">
                            Daftarkan Admin
                        </button>
                    </form>
                </div>
                <?php else: ?>

                    <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 mb-10 rounded-r-xl">
                        <p class="text-[10px] font-black uppercase text-yellow-700 italic">Hanya Admin Master yang memiliki akses untuk menambah anggota tim baru.</p>
                    </div>
                <?php endif; ?>
                    <?php 

                    $res = mysqli_query($koneksi, "SELECT * FROM users WHERE role = 'admin'");
                    while($row = mysqli_fetch_assoc($res)): ?>
                    <tr class="border-b-2 border-gray-50 hover:bg-emerald-50 transition-colors">
                        <td class="p-5 text-gray-300">#<?php echo $row['id']; ?></td>
                        <td class="p-5 italic uppercase text-kementan font-black">
                            <?php echo $row['username']; ?>
                        </td>
                        <td class="p-5 text-yellow-500 uppercase tracking-tighter">Full Access</td>
                        <td class="p-5 text-center">
                            <?php if($row['username'] == $_SESSION['username']): ?>
                                <span class="badge-sesi px-3 py-1 rounded-lg text-[8px] font-black uppercase bg-gray-100 text-gray-400">
                                    Sesi Aktif
                                </span>
                            <?php elseif (strtolower($_SESSION['username']) === 'Imam'): ?>
                                <a href="../api/hapus_admin.php?id=<?php echo $row['id']; ?>" 
                                onclick="return confirm('Yakin ingin menghapus admin ini?')"
                                class="bg-red-500 text-white border-2 border-[#1e3d1a] px-3 py-1 rounded-lg text-[9px] font-black uppercase shadow-[2px_2px_0px_0px_rgba(30,61,26,1)] hover:shadow-none transition-all">
                                Hapus
                                </a>
                            <?php else: ?>
                                <span class="text-[8px] font-black uppercase opacity-30">No Access</span>
                            <?php endif; ?>
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