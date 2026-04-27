<?php 
session_start(['cookie_path' => '/']); 
include __DIR__ . '/../koneksi.php';
if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') { 
    header("Location: /login"); 
    exit(); 
}
$id   = mysqli_real_escape_string($koneksi, $_GET['id'] ?? '');
if (empty($id)) {
    header("Location: /admin/kelola_user.php");
    exit();
}
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'"));
if (!$data) {
    header("Location: /admin/kelola_user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna - SIMPENAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .neo-gov-card { border: 3px solid #1e3d1a; border-radius: 2rem; box-shadow: 10px 10px 0px 0px rgba(30, 61, 26, 1); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-white neo-gov-card p-12 w-full max-w-lg">
        <div class="flex items-center gap-4 mb-8">
            <img src="/assets/logo-simpenan.png" alt="Logo" class="w-12 h-auto object-contain">
            <h1 class="text-3xl font-black italic uppercase tracking-tighter">Edit Data<span class="text-[#00CC33]">.</span></h1>
        </div>
        
        <form action="/api/update_user.php" method="POST" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
            
            <div>
                <label class="text-[10px] font-black uppercase tracking-widest ml-1 text-gray-400">Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required class="w-full border-2 border-[#1e3d1a] p-4 rounded-xl font-black uppercase italic outline-none focus:bg-emerald-50">
            </div>

            <div>
                <label class="text-[10px] font-black uppercase tracking-widest ml-1 text-gray-400">Email Address</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required class="w-full border-2 border-[#1e3d1a] p-4 rounded-xl font-bold outline-none focus:bg-emerald-50">
            </div>

            <div>
                <label class="text-[10px] font-black uppercase tracking-widest ml-1 text-gray-400">Password Baru (Opsional)</label>
                <input type="password" name="password" placeholder="Kosongkan jika tetap" class="w-full border-2 border-[#1e3d1a] p-4 rounded-xl font-bold outline-none focus:bg-emerald-50">
            </div>

            <div class="flex gap-4 pt-4">
                <a href="kelola_user.php" class="flex-1 text-center p-4 border-2 border-[#1e3d1a] rounded-xl font-black uppercase text-xs hover:bg-gray-100 transition-all">Batal</a>
                <button type="submit" class="flex-1 bg-yellow-400 p-4 border-2 border-[#1e3d1a] rounded-xl font-black uppercase text-xs shadow-[4px_4px_0px_0px_rgba(30,61,26,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">Update Data</button>
            </div>
        </form>
    </div>

    <script src="/assets/script.js"></script>
</body>
</html>