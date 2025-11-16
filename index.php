<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    if ($_POST['username'] === "radhit" && $_POST['password'] === "0512") {
        $_SESSION['login'] = true;

        if (!isset($_SESSION['contacts'])) {
            $_SESSION['contacts'] = [];
        }

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

<div class="bg-white shadow-lg p-8 rounded-lg w-96">
    <h2 class="text-2xl font-semibold text-center mb-5">Login</h2>

    <?php if (isset($error)): ?>
        <div class="bg-red-500 text-white p-3 rounded mb-3">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <label class="font-medium">Username</label>
            <input name="username" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="font-medium">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>

        <button name="login" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
            Login
        </button>
    </form>
</div>

</body>
</html>
