<?php 
session_start(); include '../api/koneksi.php';
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan SIMPENAN - <?php echo date('d/m/Y'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print { 
            .no-print { display: none !important; }
            body { background: white !important; }
        }
        body { font-family: 'Courier New', Courier, monospace; background-color: #f1f1f1; }
    </style>
</head>
<body class="p-10">
    <div class="max-w-4xl mx-auto bg-white p-12 border-4 border-black shadow-none">
        <div class="text-center border-b-8 border-black pb-6 mb-10">
            <h1 class="text-6xl font-black italic tracking-tighter uppercase">SIMPENAN<span class="text-[#2d5a27]">.</span></h1>
            <p class="text-xs font-bold uppercase tracking-[0.3em] mt-2">Sistem Informasi Penyakit Tanaman Terpadu</p>
            <p class="text-[10px] mt-4 opacity-60 uppercase">Dicetak pada: <?php echo date('d F Y, H:i'); ?> | Admin: <?php echo $_SESSION['username']; ?></p>
        </div>

        <h2 class="text-2xl font-black uppercase text-center mb-8 border-2 border-black py-2 bg-gray-50">Laporan Data Katalog Penyakit</h2>

        <table class="w-full border-collapse border-4 border-black">
            <thead class="bg-gray-100">
                <tr class="text-xs font-black uppercase italic">
                    <th class="border-4 border-black p-4 text-left w-12">No</th>
                    <th class="border-4 border-black p-4 text-left w-64">Nama Penyakit</th>
                    <th class="border-4 border-black p-4 text-left">Gejala Utama</th>
                </tr>
            </thead>
            <tbody class="text-xs font-bold uppercase">
                <?php 
                $res = mysqli_query($koneksi, "SELECT * FROM penyakit ORDER BY nama_penyakit ASC");
                $no = 1; while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                    <td class="border-4 border-black p-4"><?php echo $no++; ?></td>
                    <td class="border-4 border-black p-4 text-[#2d5a27] italic"><?php echo $row['nama_penyakit']; ?></td>
                    <td class="border-4 border-black p-4"><?php echo $row['gejala_utama']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="mt-20 flex justify-between items-end">
            <div class="text-[10px] font-black uppercase opacity-40 italic">Dokumen ini dihasilkan secara otomatis oleh sistem digital SIMPENAN.</div>
            <div class="text-center w-48 border-t-4 border-black pt-2 font-black uppercase text-[10px]">Tanda Tangan</div>
        </div>
    </div>

    <div class="fixed bottom-10 right-10 no-print flex gap-4">
        <a href="kelola_penyakit.php" class="bg-white border-4 border-black px-8 py-3 font-black uppercase text-xs hover:bg-gray-100">Kembali</a>
        <button onclick="window.print()" class="bg-[#00CC33] border-4 border-black px-8 py-3 font-black uppercase text-xs shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">🖨️ Cetak PDF</button>
    </div>

    <script src="../assets/script.js"></script>
</body>
</html>