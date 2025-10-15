<?php
include '../includes/conn.php';
include '../includes/header.php';

if (isset($_POST['simpan'])) {
  $nama = $_POST['nama_matkul'];
  $dosen = $_POST['nama_dosen'];
  mysqli_query($conn, "INSERT INTO mata_kuliah (nama_matkul, nama_dosen) VALUES ('$nama','$dosen')");
  header("Location: index.php");
}
?>

<h2>Tambah Mata Kuliah</h2>
<form method="post">
  <label>Nama Mata Kuliah</label>
  <input type="text" name="nama_matkul" required>

  <label>Nama Dosen</label>
  <input type="text" name="nama_dosen">

  <button type="submit" name="simpan" class="btn">Simpan</button>
</form>

<?php include '../includes/footer.php'; ?>