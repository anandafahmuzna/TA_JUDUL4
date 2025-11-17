<?php include "session_start.php"; ?>

<?php
$data_file = "data.json";
$kontak = json_decode(file_get_contents($data_file), true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new = [
        "nama" => $_POST["nama"],
        "telepon" => $_POST["telepon"],
        "email" => $_POST["email"]
    ];

    $kontak[] = $new;

    file_put_contents($data_file, json_encode($kontak, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="fw-bold mb-3">Tambah Kontak</h3>

        <form method="POST">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button class="btn text-white" style="background:#9c6ade;">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
