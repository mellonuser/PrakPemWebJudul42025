<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if (isset($_POST['save'])) {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);

    if ($name == "" || $phone == "" || $email == "") {
        $error = "Semua field wajib diisi!";
    } else {

        $_SESSION['contacts'][] = [
            "name" => $name,
            "phone" => $phone,
            "email" => $email
        ];

        // REDIRECT TANPA GAGAL
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kontak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

<div class="max-w-lg mx-auto bg-indigo-700 p-6 rounded shadow text-white">
    <h2 class="text-2xl font-semibold mb-4">Tambah Kontak</h2>

    <?php if ($error): ?>
        <div class="bg-red-500 text-white p-3 rounded mb-3"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <label class="font-medium">Nama</label>
            <input name="name" class="w-full border rounded p-2 text-black">
        </div>

        <div>
            <label class="font-medium">No Telepon</label>
            <input name="phone" class="w-full border rounded p-2 text-black">
        </div>

        <div>
            <label class="font-medium">Email</label>
            <input name="email" class="w-full border rounded p-2 text-black">
        </div>

        <button name="save" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan
        </button>

        <a href="dashboard.php" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
            Kembali
        </a>
    </form>
</div>

</body>
</html>
