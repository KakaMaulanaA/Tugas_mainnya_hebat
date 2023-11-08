<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "perpustakaan";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$foto           = "";
$id             = "";
$nama           = "";
$kelas          = "";
$jurusan        = "";
$error          = "";
$sukses         = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from peminjaman where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
        header('location:home-page.php');
    }else{
        $error  = "Gagal melakukan delete data";
    }
}

if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from peminjaman where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $id         = $r1['id'];
    $nama       = $r1['nama'];
    $kelas      = $r1['kelas'];
    $jurusan    = $r1['jurusan'];
    $name       = $r1['photo'];


    if ($id == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $id         = $_POST['id'];
    $nama       = $_POST['nama'];
    $kelas      = $_POST['kelas'];
    $jurusan    = $_POST['jurusan'];
    $photo      = $_FILES['photo'];
    $tmp = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];

    if ($id && $nama && $kelas && $jurusan) {
        if ($op == 'edit') { //untuk update
            move_uploaded_file($tmp, "img/$name");
            $sql1       = "update peminjaman set id = '$id',nama = '$nama',kelas = '$kelas',jurusan = '$jurusan', photo ='$name' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
                header('location:home-page.php');
            } else {
                $error  = "Data gagal diupdate";
            }
            
        } else { //untuk insert
            move_uploaded_file($tmp, "img/$name");
            $sql1 = "insert into peminjaman(id,nama,kelas,jurusan,photo) values ('$id','$nama','$kelas','$jurusan','$name')";
            $q1   = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
                header('location:home-page.php');
            } else{
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>