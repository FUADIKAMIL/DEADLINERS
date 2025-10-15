<?php
include '../includes/conn.php';
include '../includes/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mata_kuliah WHERE id_matkul=$id"));

if (isset($_POST['update'])) {
  $nama = $_POST['nama_matkul'];
  $dosen = $_POST['nama_dosen'];
  mysqli_query($conn, "UPDATE mata_kuliah SET nama_matkul='$nama', nama_dosen='$dosen' WHERE id_matkul=$id");
  header("Location: index.php");
}
?>

<h2>Edit Mata Kuliah</h2>
<form method="post">
  <label>Nama Mata Kuliah</label>
  <input type="text" name="nama_matkul" value="<?= $data['nama_matkul'] ?>" required>

  <label>Nama Dosen</label>
  <input type="text" name="nama_dosen" value="<?= $data['nama_dosen'] ?>">

  <button type="submit" name="update" class="btn">Perbarui</button>
</form>

<?php include '../includes/footer.php'; ?>