<?php
include 'includes/conn.php';
include 'includes/header.php';

$query = "SELECT t.*, m.nama_matkul, s.nama_status 
          FROM tugas t
          LEFT JOIN mata_kuliah m ON t.id_matkul = m.id_matkul
          LEFT JOIN status s ON t.id_status = s.id_status
          ORDER BY deadline ASC";
$result = mysqli_query($conn, $query);
?>

<h2>Daftar Tugas</h2>
<a class="btn" href="tambah_tugas.php">+ Tambah Tugas</a>

<table>
  <tr>
    <th>Nama Tugas</th>
    <th>Mata Kuliah</th>
    <th>Deadline</th>
    <th>Status</th>
    <th>Aksi</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['nama_tugas'] ?></td>
    <td><?= $row['nama_matkul'] ?></td>
    <td><?= $row['deadline'] ?></td>
    <td><?= $row['nama_status'] ?></td>
    <td>
      <a class="btn" href="edit_tugas.php?id=<?= $row['id_tugas'] ?>">Edit</a>
      <a class="btn btn-danger" href="hapus_tugas.php?id=<?= $row['id_tugas'] ?>" onclick="confirmDelete(event)">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

<?php include 'includes/footer.php'; ?>