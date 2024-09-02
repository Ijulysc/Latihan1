<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Data Pegawai</title>
</head>
<body>
    <h3>Data Pegawai</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th><th>NIK</th><th>NAMA PEGAWAI</th><th>ALAMAT</th>
                <th>JENIS KELAMIN</th><th>NO TELEPON</th><th>JABATAN</th><th>GAJI POKOK</th><th>TUNJANGAN</th><th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";  // Pastikan koneksi ke database
            $qry_pegawai = mysqli_query($conn, "SELECT pegawai.*, jabatan.nama_jabatan, jabatan.gaji_pokok, jabatan.tunjangan FROM pegawai JOIN jabatan ON pegawai.jabatan = jabatan.id");
            $no = 0;
            while($data_pegawai = mysqli_fetch_array($qry_pegawai)){
                $no++; ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data_pegawai['nik']?></td>
                    <td><?=$data_pegawai['nama']?></td>
                    <td><?=$data_pegawai['alamat']?></td>
                    <td><?=$data_pegawai['jenis_kelamin']?></td>
                    <td><?=$data_pegawai['no_tlp']?></td>
                    <td><?=$data_pegawai['nama_jabatan']?></td>
                    <td><?=$data_pegawai['gaji_pokok']?></td>
                    <td><?=$data_pegawai['tunjangan']?></td>
                    <td>
                        <a href="ubah_pegawai.php?id=<?=$data_pegawai['id']?>" class="btn btn-success">Ubah</a> | 
                        <a href="hapus_pegawai.php?id=<?=$data_pegawai['id']?>" onclick="return confirm('Apakah Anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
