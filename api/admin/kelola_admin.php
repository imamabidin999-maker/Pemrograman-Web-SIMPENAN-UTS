<?php
include __DIR__ . '/../koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Admin - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-[#f4f7f4] font-[Poppins]">
    <div class="flex min-h-screen">
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-[#2d5a27] mb-6">Manajemen Administrator</h1>
            
            <div class="flex space-x-4 mb-6">
                <a href="/admin" class="bg-gray-500 text-white px-6 py-2 rounded-full hover:bg-gray-600 transition">Kembali</a>
                <a href="/tambah_admin.php" class="bg-[#2d5a27] text-white px-6 py-2 rounded-full hover:bg-green-800 transition">+ Tambah Admin</a>
            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-2 border-[#2d5a27]">
                <table class="w-full text-left">
                    <thead class="bg-[#2d5a27] text-white">
                        <tr>
                            <th class="p-4">ID</th>
                            <th class="p-4">Username Admin</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $res = mysqli_query($koneksi, "SELECT * FROM admin");
                        while($row = mysqli_fetch_assoc($res)) {
                            echo "<tr>
                                <td class='p-4'>{$row['id']}</td>
                                <td class='p-4 font-semibold'>{$row['username']}</td>
                                <td class='p-4 text-center'>
                                    <a href='/hapus_admin.php?id={$row['id']}' class='text-red-600 hover:underline' onclick='return confirm(\"Hapus admin ini?\")'>Hapus</a>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>