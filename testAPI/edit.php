<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>UPDATE DATA</title>
    </head>
    <body>

        <div class="container" style="margin-top: 20px;">
            <a href="read.php" type="button" class="btn btn-warning">KEMBALI</a>
            <br>
            <br>
            <h3>EDIT DATA</h3> <br>
            <?php
            include '../testAPI/koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "SELECT * FROM books WHERE id=$id");
            while ($d = mysqli_fetch_array($data))
            {
                ?>
                <form method="POST" action="update.php">  
                    <table>
                        <tr>
                            <td>Judul buku</td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                <input type="text" name="title" value="<?php echo $d['title'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td><input type="text" name="author" value="<?php echo $d['author'];?>"></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td><input type="text" name="publisher" value="<?php echo $d['publisher']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nomor ISBN</td>
                            <td><input type="text" name="isbn" value="<?php echo $d['isbn']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tahun terbit</td>
                            <td><input type="year" name="published_year" value="<?php echo $d['published_year']; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="simpan"></td>
                        </tr>
                    </table>
                </form>
            <?php
            }
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>