<?php
include '../includes/conn.php';
include '../includes/header.php';

if (isset($_POST['submit'])) {
    $nama_status = trim($_POST['nama_status']);

    if ($nama_status == '') {
        echo "<div class='alert' style='background:#2a2a2a;color:#ff4d6d;padding:10px;border-radius:8px;margin-bottom:15px;'>Nama status tidak boleh kosong!</div>";
    } else {
        $query = "INSERT INTO status (nama_status) VALUES ('$nama_status')";
        if (mysqli_query($conn, $query)) {
            header("Location: index.php?success=1");
            exit();
        } else {
            echo "<div class='alert' style='background:#2a2a2a;color:#ff4d6d;padding:10px;border-radius:8px;margin-bottom:15px;'>Gagal menambah status: " . mysqli_error($conn) . "</div>";
        }
    }
}
?>

<main class="container">
  <h2>Tambah Status</h2>

  <form method="post">
    <label for="nama_status">Nama Status</label>
    <input type="text" id="nama_status" name="nama_status" placeholder="Contoh: Sengaja Ditunda" required>

    <button type="submit" name="submit" class="btn">Simpan</button>
    <a href="index.php" class="btn btn-danger">Batal</a>
  </form>
</main>

<?php include '../includes/footer.php'; ?>
