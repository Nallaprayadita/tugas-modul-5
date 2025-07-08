<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            background-color: #e0ffe0;
            border-left: 4px solid #2ecc71;
            padding: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Buku Tamu Digital STITEK Bontang</h1>
</header>

<div class="container">
    <?php
    // Inisialisasi variabel
    $nama = $email = $pesan = "";
    $error_nama = $error_email = $error_pesan = "";
    $tampilkan_data = false;

    // Proses form saat disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $error_nama = "Nama wajib diisi.";
        } else {
            $nama = htmlspecialchars($_POST["nama"]);
        }

        if (empty($_POST["email"])) {
            $error_email = "Email wajib diisi.";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }

        if (empty($_POST["pesan"])) {
            $error_pesan = "Pesan wajib diisi.";
        } else {
            $pesan = htmlspecialchars($_POST["pesan"]);
        }

        // Jika tidak ada error, tampilkan data
        if (!$error_nama && !$error_email && !$error_pesan) {
            $tampilkan_data = true;
        }
    }
    ?>

    <form method="post" action="">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" name="nama" id="nama" value="<?= $nama ?>">
        <?php if ($error_nama) echo "<div class='error'>$error_nama</div>"; ?>

        <label for="email">Alamat Email:</label>
        <input type="email" name="email" id="email" value="<?= $email ?>">
        <?php if ($error_email) echo "<div class='error'>$error_email</div>"; ?>

        <label for="pesan">Pesan/Komentar:</label>
        <textarea name="pesan" id="pesan"><?= $pesan ?></textarea>
        <?php if ($error_pesan) echo "<div class='error'>$error_pesan</div>"; ?>

        <button type="submit">Kirim Pesan</button>
    </form>

    <?php if ($tampilkan_data): ?>
        <div class="success">
            <h3>Pesan Anda telah diterima!</h3>
            <p><strong>Nama:</strong> <?= $nama ?></p>
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Pesan:</strong> <?= nl2br($pesan) ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
