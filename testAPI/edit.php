<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>UPDATE DATA</title>
    </head>
    <body>
    <div id="video-background">
		<video autoplay muted loop>
			<source src="video/bg1.mp4" type="video/mp4">
		</video>
	</div>
        <div class="container" style="margin-top: 20px;">
            <center><h3>Edit Data books</h3></center>
            <?php
            include '../testAPI/koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "SELECT * FROM books WHERE id=$id");
            while ($d = mysqli_fetch_array($data))
            {
                ?>
                <div class="container1">
                    <center>
                        <form method="POST" action="update.php" style="margin-top: 20px;" >
                    <div class="mb-3 col-5">
                        <label class="col-sm-2 col-form-label">Judul Buku</label>
                        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text" class="form-control" name="title" value="<?php echo $d['title'];?>">
                    </div>
                    <div class="mb-3 col-5">
                        <label class="form-label">penulis</label>
                        <input type="text" class="form-control" name="author" value="<?php echo $d['author'];?>">
                    </div>
                    <div class="mb-3 col-5">
                        <label class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="publisher" value="<?php echo $d['publisher'];?>">
                    </div>
                    <div class="mb-3 col-5">
                        <label class="form-label">Nomor ISBN</label>
                        <input type="text" class="form-control" name="isbn" value="<?php echo $d['isbn'];?>">
                    </div>
                    <div class="mb-3 col-5">
                        <label class="form-label">Tahun terbit</label>
                        <input type="text" class="form-control" name="published_year" value="<?php echo $d['published_year'];?>">
                    </div>
                    <div class="mb-4 col-5">
                        <button type="submit" class="btn btn-primary" value="Simpan">Save</button>
                        <a href="read.php" type="button" class="btn btn-warning">Back to Home</a>
                    </div>          
                </form>
                </center>
                </div>
                
            <?php
            }
            ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>