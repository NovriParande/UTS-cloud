<?php
include '../testAPI/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM books WHERE id='$id'");
header("location:read.php");
?>