<?php
include '../testAPI/koneksi.php'; 

$id = $_POST ['id'];
$title = $_POST ['title'];
$author = $_POST ['author'];
$publisher = $_POST ['publisher'];
$isbn = $_POST ['isbn'];
$published_year = $_POST ['published_year'];

mysqli_query($koneksi, "UPDATE books SET title='$title', author='$author', publisher='$publisher', isbn='$isbn', published_year='$published_year' WHERE id='$id'");
header("location:read.php");
?>