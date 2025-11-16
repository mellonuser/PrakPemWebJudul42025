<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$contacts = $_SESSION['contacts'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">

<div class="max-w-4xl mx-auto bg-white shadow p-6 rounded">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-semibold">Daftar Kontak</h2>

        <a href="logout.php" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            Logout
        </a>
    </div>

    <a href="add.php" 
       class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Tambah Kontak
    </a>

    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full text-left border border-black border-collapse rounded overflow-hidden">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="px-6 py-3 border border-black">Nama</th>
                    <th class="px-6 py-3 border border-black">No Telepon</th>
                    <th class="px-6 py-3 border border-black">Email</th>
                    <th class="px-6 py-3 text-center border border-black">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                <?php if (count($contacts) === 0): ?>
                <tr>
                    <td colspan="4" class="text-center py-4 border border-black">Belum ada kontak.</td>
                </tr>
                <?php endif; ?>

                <?php foreach ($contacts as $index => $c): ?>
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-3 border border-black"><?= $c['name'] ?></td>
                    <td class="px-6 py-3 border border-black"><?= $c['phone'] ?></td>
                    <td class="px-6 py-3 border border-black"><?= $c['email'] ?></td>
                    <td class="px-6 py-3 border border-black text-center">

                        <a href="edit.php?id=<?= $index ?>" 
                        class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 mr-2">
                        Edit
                        </a>

                        <a href="delete.php?id=<?= $index ?>"
                        onclick="return confirm('Hapus kontak?')"
                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 ml-2">
                        Hapus
                        </a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
