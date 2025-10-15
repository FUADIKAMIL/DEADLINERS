<?php
include 'includes/conn.php';
include 'includes/header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tugas WHERE id_tugas=$id"));

if (isset($_POST['update'])) {
  $nama = $_POST['nama_tugas'];
  $desk = $_POST['deskripsi'];
  $dl = $_POST['deadline'];
  $matkul = $_POST['id_matkul'];
  $status = $_POST['id_status'];

  mysqli_query($conn, "UPDATE tugas SET 
                        nama_tugas='$nama', deskripsi='$desk', deadline='$dl',
                        id_matkul='$matkul', id_status='$status'
                        WHERE id_tugas=$id");
  header("Location: index.php");
}
?>

<h2>Edit Tugas</h2>
<form method="post">
  <label>Nama Tugas</label>
  <input type="text" name="nama_tugas" value="<?= $data['nama_tugas'] ?>" required>

  <label>Deskripsi</label>
  <textarea name="deskripsi"><?= $data['deskripsi'] ?></textarea>

  <label>Deadline</label>
  <input type="date" name="deadline" value="<?= $data['deadline'] ?>">

  <label>Mata Kuliah</label>
  <select name="id_matkul">
    <?php
      $mk = mysqli_query($conn, "SELECT * FROM mata_kuliah");
      while ($m = mysqli_fetch_assoc($mk)) {
        $sel = ($data['id_matkul'] == $m['id_matkul']) ? "selected" : "";
        echo "<option value='{$m['id_matkul']}' $sel>{$m['nama_matkul']}</option>";
      }
    ?>
  </select>

  <label>Status</label>
  <select name="id_status">
    <?php
      $st = mysqli_query($conn, "SELECT * FROM status");
      while ($s = mysqli_fetch_assoc($st)) {
        $sel = ($data['id_status'] == $s['id_status']) ? "selected" : "";
        echo "<option value='{$s['id_status']}' $sel>{$s['nama_status']}</option>";
      }
    ?>
  </select>

  <button type="submit" name="update" class="btn">Perbarui</button>
</form>

<?php include 'includes/footer.php'; ?>