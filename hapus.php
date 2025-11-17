<?php include "session_start.php"; ?>

<?php
$data_file = "data.json";
$kontak = json_decode(file_get_contents($data_file), true);

$id = $_GET["id"];
unset($kontak[$id]);

$kontak = array_values($kontak);

file_put_contents($data_file, json_encode($kontak, JSON_PRETTY_PRINT));
header("Location: index.php");
exit;
?>
