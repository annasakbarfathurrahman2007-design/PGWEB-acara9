
<!DOCTYPE html>
<html>
<head>
<title>Edit Data SPPG</title>
</head>
<body>

<h2>Form Edit SPPG</h2>

<?php
$conn = new mysqli("localhost", "root", "", "studi kasus acara 9");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? '';

if ($id != '' && is_numeric($id)) {
    $sql = "SELECT * FROM sppg WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

<form action="edit.php" method="post">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

Nama SPPG:<br>
<input type="text" name="nama_sppg" value="<?php echo $row['nama_sppg']; ?>"><br>

Desa:<br>
<input type="text" name="desa" value="<?php echo $row['desa']; ?>"><br>

Kecamatan:<br>
<input type="text" name="kecamatan" value="<?php echo $row['kecamatan']; ?>"><br>

Kabupaten:<br>
<input type="text" name="kabupaten" value="<?php echo $row['kabupaten']; ?>"><br>

Longitude:<br>
<input type="text" name="longitude" value="<?php echo $row['longitude']; ?>"><br>

Latitude:<br>
<input type="text" name="latitude" value="<?php echo $row['latitude']; ?>"><br><br>

<input type="submit" name="submit" value="Simpan">
<a href="../index.php">Kembali</a>

</form>

<?php
    } else {
        echo "Data tidak ditemukan";
    }
} else {
    echo "ID tidak valid";
}

$conn->close();
?>

</body>
</html>
