<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$contact = $_SESSION['contacts'][$id];

if (isset($_POST['update'])) {
    $_SESSION['contacts'][$id] = [
        "name" => $_POST['name'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email']
    ];
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Kontak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Edit Kontak</h2>

    <form method="POST" class="space-y-4">
        <div>
            <label class="font-medium">Nama</label>
            <input name="name" class="w-full border rounded p-2" value="<?= $contact['name'] ?>">
        </div>

        <div>
            <label class="font-medium">No Telepon</label>
            <input name="phone" class="w-full border rounded p-2" value="<?= $contact['phone'] ?>">
        </div>

        <div>
            <label class="font-medium">Email</label>
            <input name="email" class="w-full border rounded p-2" value="<?= $contact['email'] ?>">
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Update
        </button>
        <a href="dashboard.php" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
            Kembali
        </a>
    </form>
</div>

</body>
</html>
