<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="css/style.css">
    <!--MENGHUBUNGKAN SYNTAX KE BOOSTRAP  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Insert data books</title>
    <body>
    <div id="video-background">
		<video autoplay muted loop>
			<source src="video/bg1.mp4" type="video/mp4">
		</video>
	</div>
    <!-- FORM INPUT/TAMBAH DATA -->
    <div class="container">
        <center><h1>Insert data books</h1></center>
        <form action="create.php" method="POST" style="margin-top: 20px;"> 
        
        <div class="row mb-3">
            <label for="inputjudul" class="col-sm-2 col-form-label">Judul buku</label>
            <div class="col-sm-10">
            <input type="text" name="title" class="form-control" value="">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputjudul" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
            <input type="text" name="author" class="form-control" value="">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputjudul" class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
            <input type="text" name="publisher" class="form-control" value="">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputjudul" class="col-sm-2 col-form-label">Nomor ISBN</label>
            <div class="col-sm-10">
            <input type="text" name="isbn" class="form-control" value="">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputjudul" class="col-sm-2 col-form-label">Tahun terbit</label>
            <div class="col-sm-10">
            <input type="text" name="published_year" class="form-control" value="">
            </div>
        </div>
        
        <center>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="read.php" type="button" class="btn btn-success">Back to Home</a>
        </center>
        
        </form>
    </div>

        <?php
            if(isset($_POST['simpan'])){ 
                include ('../testAPI/koneksi.php'); 
                $title = $_POST['title']; 
                $author = $_POST['author']; 
                $publisher = $_POST['publisher']; 
                $isbn = $_POST['isbn']; 
                $published_year = $_POST['published_year'];  
                
                $sql = mysqli_query($koneksi, "INSERT INTO books (title, author, publisher, isbn, published_year) values ('$title', '$author', '$publisher', '$isbn', '$published_year')");
            }
        ?>
    </body>
</html>