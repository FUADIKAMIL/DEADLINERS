<?php
include '../includes/conn.php';
include '../includes/header.php';

$result = mysqli_query($conn, "SELECT * FROM mata_kuliah ORDER BY nama_matkul");
?>

<h2>Daftar Mata Kuliah</h2>
<a class="btn" href="tambah.php">+ Tambah Mata Kuliah</a>

<table>
  <tr>
    <th>Nama Mata Kuliah</th>
    <th>Nama Dosen</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['nama_matkul'] ?></td>
    <td><?= $row['nama_dosen'] ?></td>
    <td>
      <a class="btn" href="edit.php?id=<?= $row['id_matkul'] ?>">Edit</a>
      <a class="btn btn-danger" href="hapus.php?id=<?= $row['id_matkul'] ?>" onclick="confirmDelete(event)">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

<?php include '../includes/footer.php'; ?>