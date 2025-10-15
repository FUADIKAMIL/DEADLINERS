<?php
include '../includes/conn.php';
include '../includes/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM status WHERE id_status=$id"));

if (isset($_POST['update'])) {
  $nama = $_POST['nama_status'];
  mysqli_query($conn, "UPDATE status SET nama_status='$nama' WHERE id_status=$id");
  header("Location: index.php");
}
?>

<h2>Edit Status</h2>
<form method="post">
  <label>Nama Status</label>
  <input type="text" name="nama_status" value="<?= $data['nama_status'] ?>" required>

  <button type="submit" name="update" class="btn">Perbarui</button>
</form>

<?php include '../includes/footer.php'; ?>
