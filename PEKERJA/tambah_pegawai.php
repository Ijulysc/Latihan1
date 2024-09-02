<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tambah Pegawai</title>
</head>
<body>
    <h3>Tambah Pegawai</h3>
    <form action="proses_tambah_pegawai.php" method="post">
        Nama Pegawai :
        <input type="text" name="nama_pegawai" value="" class="form-control" required>
        
        NIK : 
        <input type="text" name="nik" value="" class="form-control" required>

        Alamat : 
        <textarea name="alamat" class="form-control" rows="4" required></textarea>

        Jenis Kelamin : 
        <select name="jenis_kelamin" class="form-control" required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>

        No. Telepon : 
        <input type="text" name="no_tlp" value="" class="form-control" required>

        Jabatan :
        <select name="id_jabatan" class="form-control" required>
            <option value="">Pilih Jabatan</option>
            <?php 
            include "koneksi.php";
            $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
            while ($data_jabatan = mysqli_fetch_array($qry_jabatan)) {
                echo '<option value="'.$data_jabatan['id'].'">'.$data_jabatan['nama_jabatan'].'</option>';    
            }
            ?>
        </select>

        <input type="submit"
