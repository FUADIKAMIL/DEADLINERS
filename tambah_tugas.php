<?php
include 'includes/conn.php';
include 'includes/header.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_tugas'];
    $desk = $_POST['deskripsi'];
    $dl = $_POST['deadline'];
    $matkul = $_POST['id_matkul'];
    $status = $_POST['id_status'];

    mysqli_query($conn, "INSERT INTO tugas (nama_tugas, deskripsi, deadline, id_matkul, id_status)
                        VALUES ('$nama', '$desk', '$dl', '$matkul', '$status')");
    header("Location: index.php");
}
?>

<h2>Tambah Tugas</h2>
<form method="post">
  <label>Nama Tugas</label>
  <input type="text" name="nama_tugas" required>
  
  <label>Deskripsi</label>
  <textarea name="deskripsi"></textarea>
  
  <label>Deadline</label>
  <input type="date" name="deadline">
  
  <label>Mata Kuliah</label>
  <select name="id_matkul">
    <?php
      $mk = mysqli_query($conn, "SELECT * FROM mata_kuliah");
      while ($m = mysqli_fetch_assoc($mk)) {
        echo "<option value='{$m['id_matkul']}'>{$m['nama_matkul']}</option>";
      }
    ?>
  </select>
  
  <label>Status</label>
  <select name="id_status">
    <?php
      $st = mysqli_query($conn, "SELECT * FROM status");
      while ($s = mysqli_fetch_assoc($st)) {
        echo "<option value='{$s['id_status']}'>{$s['nama_status']}</option>";
      }
    ?>
  </select>
  
  <button type="submit" name="simpan" class="btn">Simpan</button>
</form>

<?php include 'includes/footer.php'; ?>