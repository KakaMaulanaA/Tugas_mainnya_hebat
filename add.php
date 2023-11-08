<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header text-white bg-primary">
                Add data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kelas" class="col-sm-2 col-form-label">KELAS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">JURUSAN</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value="">-Pilih Jurusan-</option>
                                <option value="TKJ" <?php if ($jurusan == "TKJ") echo "selected" ?>>TKJ</option>
                                <option value="RPL" <?php if ($jurusan == "RPL") echo "selected" ?>>RPL</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                        <div class="col-sm-2 col-form-label">
                            <!-- existing form fields -->

                            <!-- Add this for file upload -->
                            <label for="photo">Upload Photo:</label>
                            <div class="col-sm-10">
                            <input type="file" name="photo" id="photo">
                            </div>
                        
                        </div>
            </div>
                    <div class="col-12">
                        <a href="home-page.php"><button type="button" class="btn btn-danger">Back</button></a>
                        <input type="submit" name="simpan" href="home-page.php" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>