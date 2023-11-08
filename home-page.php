<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Home Page</title>
    
</head>
<body>
    <!-- untuk mengeluarkan data -->
    <div class="card">
            <div class="card-header text-white bg-primary">
                Data Anggota Perpustakaan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No      </th>
                            <th scope="col">FOTO</th>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">JURUSAN</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        
                
                        $q2 = mysqli_query($koneksi, "select * from peminjaman ");
                        $no = 0;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $no++;
                            $id     = $r2['id'];
                            $nama   = $r2['nama'];
                            $kelas   = $r2['kelas'];
                            $jurusan   = $r2['jurusan'];
                            $photo = $r2['photo'];
                            
                        ?>
                            <tr>
                                <td scope="row"><?php echo $no ?></td>
                                <td scope="row"><img src="img/<?php echo $photo ?>" alt="<?php echo $photo ?>" style="max-width:20rem;"></td>
                                <td scope="row"><?php echo $id ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $kelas ?></td>
                                <td scope="row"><?php echo $jurusan ?></td>
                                <td scope="row">
                                    <a href="edit.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    
                                    <a href="koneksi.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a> 
                                </td>
                            </tr>
                            
                        <?php
                        }
                        ?>
                       <a href="add.php"><button type="button" class="btn btn-primary">Add</button></a>
                    </tbody>
            </div>
            
        </div>
    </div>
</body>
</html>