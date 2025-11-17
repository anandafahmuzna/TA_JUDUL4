<?php include "session_start.php"; ?>

<?php
$data_file = "data.json";

if (!file_exists($data_file)) {
    file_put_contents($data_file, json_encode([]));
}

$kontak = json_decode(file_get_contents($data_file), true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark" style="background:#9c6ade;">
    <div class="container">
        <a class="navbar-brand fw-bold">Daftar Kontak</a>
        <a href="logout.php" class="btn btn-light">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow p-4">
        <div class="d-flex justify-content-between mb-3">
            <h3 class="fw-bold">Daftar Kontak</h3>
            <a href="tambah.php" class="btn text-white" style="background:#9c6ade;">Tambah Kontak</a>
        </div>

        <table class="table table-hover table-striped">
            <thead class="text-white" style="background:#b38bfa;">
                <tr>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kontak as $index => $k): ?>
                <tr>
                    <td><?= $k["nama"] ?></td>
                    <td><?= $k["telepon"] ?></td>
                    <td><?= $k["email"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $index ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $index ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

</body>
</html>
