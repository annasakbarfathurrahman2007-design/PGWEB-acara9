
<?php
$conn = new mysqli("localhost", "root", "", "studi kasus acara 9");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_sppg'];
    $desa = $_POST['desa'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];

    $sql = "INSERT INTO sppg
    (nama_sppg, desa, kecamatan, kabupaten, longitude, latitude)
    VALUES
    ('$nama', '$desa', '$kecamatan', '$kabupaten', '$longitude', '$latitude')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
