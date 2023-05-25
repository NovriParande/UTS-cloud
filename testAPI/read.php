<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>READ PROFIL</title>
    </head>
    <body>
        <div class="container">
            <h2 style="margin-top: 20px;">Data Buku Perpustakaan</h2>         
            <a href="create.php" type="button" class="btn btn-primary">TAMBAH DATA </a> 
            <br/>
            <br/>

            <table class="table table-striped table-bordered" style="width:100%">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Nomor ISBN</th>
                    <th>Tahun terbit</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    include '../testAPI/koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM books");
                    while($d = mysqli_fetch_array($data)){ 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td> 
                            <td><?php echo $d['title']; ?></td>
                            <td><?php echo $d['author']; ?></td>
                            <td><?php echo $d['publisher']; ?></td>
                            <td><?php echo $d['isbn']; ?></td>
                            <td><?php echo $d['published_year']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $d['id']; ?>"type="button" class="btn btn-success">EDIT</a>
                                <a href="delete.php?id=<?php echo $d['id']; ?>"type="button" class="btn btn-danger">HAPUS</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>