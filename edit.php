<?php
$conn = new mysqli("localhost", "root", "", "studi kasus acara 9");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_sppg'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];

    $sql = "UPDATE sppg SET
    nama_sppg='$nama',
    desa='$desa',
    kecamatan='$kecamatan',
    kabupaten='$kabupaten',
    longitude='$longitude',
    latitude='$latitude'
    WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
