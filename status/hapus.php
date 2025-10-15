<?php
include '../includes/conn.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM status WHERE id_status=$id");
header("Location: index.php");
