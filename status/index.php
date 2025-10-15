<?php
include '../includes/conn.php';
include '../includes/header.php';

$result = mysqli_query($conn, "SELECT * FROM status ORDER BY id_status");
?>

<h2>Daftar Status</h2>
<a class="btn" href="tambah.php">+ Tambah Status</a>

<table>
  <tr>
    <th>Nama Status</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['nama_status'] ?></td>
    <td>
      <a class="btn" href="edit.php?id=<?= $row['id_status'] ?>">Edit</a>
      <a class="btn btn-danger" href="hapus.php?id=<?= $row['id_status'] ?>" onclick="confirmDelete(event)">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

<?php include '../includes/footer.php'; ?>
