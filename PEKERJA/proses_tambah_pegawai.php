<?php
include 'koneksi.php';

if ($_POST) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_tlp = $_POST['no_tlp'];
    $jabatan = $_POST['jabatan'];

    if (empty($nik) || empty($nama) || empty($alamat) || empty($jenis_kelamin)) {
        echo "<script>alert('Semua field wajib diisi');location.href='edit_pegawai.php?id=$id';</script>";
    } else {
        $update = mysqli_query($conn, "UPDATE Tabel_Pegawai SET Nik='$nik', Nama='$nama', Alamat='$alamat', Jenis_kelamin='$jenis_kelamin', No_tlp='$no_tlp', Jabatan='$jabatan' WHERE Id='$id'");
        if ($update) {
            echo "<script>alert('Pegawai berhasil diubah');location.href='daftar_pegawai.php';</script>";
        } else {
            echo "<script>alert('Gagal mengubah pegawai');location.href='edit_pegawai.php?id=$id';</script>";
        }
    }
}
?>
