<?php
include 'includes/conn.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tugas WHERE id_tugas=$id");
header("Location: index.php");
