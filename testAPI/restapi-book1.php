<?php
require_once "koneksi.php";
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_books(){
    global $koneksi;
    $query = $koneksi -> query("SELECT * FROM books");
    while($row=mysqli_fetch_object($query)){
        $data[]=$row;
    }
    $respons=array(
        'status'=>1,
        'message'=>'Sukses menampilkan data',
        'data'=>$data
    );
    header('content-type: application/json');
    echo json_encode($respons);
}

function get_book_by_id(){
    global $koneksi;
    $id = $_GET['id'] ?? null;

    if ($id) {
        $query = $koneksi->query("SELECT * FROM books WHERE id = $id");
        if ($query->num_rows > 0) {
            $book = $query->fetch_object();

            $respons = array(
                'status' => 1,
                'message' => 'Sukses mendapatkan data buku',
                'data' => $book
            );
        } else {
            $respons = array(
                'status' => 0,
                'message' => 'Buku tidak ditemukan',
                'data' => null
            );
        }
    } else {
        $respons = array(
            'status' => 0,
            'message' => 'Parameternya salah',
            'data' => null
        );
    }

    header('Content-Type: application/json');
    echo json_encode($respons);
}

function insert_books(){
    global $koneksi;
    $check = array('id' => '', 'title' => '', 'author' => '', 'publisher' => '', 'isbn' => '', 'published_year' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    if($check_match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO books SET 
        id = '$_POST[id]',        
        title = '$_POST[title]',
        author = '$_POST[author]',
        publisher = '$_POST[publisher]',
        isbn = '$_POST[isbn]',
        published_year = '$_POST[published_year]' ");

        if($result){
            $respons = array(
                'status'=>1,
                'message' => 'Insert data sukses'
            );
        }
        else{
            $respons=array(
                'status'=>0,
                'message'=> 'Gagal insert data'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Parameternya salah'
        );
    }
    header('Content-type:applicaton/json');
    echo json_encode($respons);
}

function update_books(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id=$_GET["id"];
    }
    $check=array('title'=>'', 'author'=>'', 'publisher'=>'', 'isbn'=>'', 'published_year'=>'');
    $check_match=count(array_intersect_key($_POST, $check));
    if ($check_match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE books SET
        title = '$_POST[title]',
        author = '$_POST[author]',
        publisher = '$_POST[publisher]',
        isbn = '$_POST[isbn]' ,
        published_year = '$_POST[published_year]' WHERE id = $id");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Berhasil mengupdate data'
            );
        }
        else {
            $respons=array(
                'status'=>0,
                'message'=>'Gagal mengupdate data'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Parameternya salah',
            'data'=>$id
        );
    }
    header('content-type: application/json');
    echo json_encode($respons);
}

function delete_books(){
    global $koneksi;
    $id=$_GET['id'];
    $query = "DELETE FROM books WHERE id =".$id;
    if(mysqli_query($koneksi, $query)){
        $respons=array(
            'status'=>1,
            'message'=>'Data buku berhasil dihapus'
        );
    }
    else{
        $respons=array(
            'status'=>0,
            'message'=>'Gagal menghapus data'
        );
    }
    header('content-type: application/json');
    echo json_encode($respons);
}
