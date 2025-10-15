<?php
include '../includes/conn.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM mata_kuliah WHERE id_matkul=$id");
header("Location: index.php");