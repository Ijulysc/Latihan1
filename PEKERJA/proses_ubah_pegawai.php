<?php
if ($_POST) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_tlp = $_POST['no_tlp'];
    $jabatan = $_POST['jabatan'];
    $password = $_POST['password'];

    if (empty($nik)) {
        echo "<script>alert('NIK tidak boleh kosong');location.href='edit_pegawai.php?id=".$id."';</script>";
    } elseif (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='edit_pegawai.php?id=".$id."';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='edit_pegawai.php?id=".$id."';</script>";
    } elseif (empty($jenis_kelamin)) {
        echo "<script>alert('Jenis Kelamin tidak boleh kosong');location.href='edit_pegawai.php?id=".$id."';</script>";
    } elseif (empty($jabatan)) {
        echo "<script>alert('Jabatan tidak boleh kosong');location.href='edit_pegawai.php?id=".$id."';</script>";
    } else {
        include "koneksi.php";
        if (empty($password)) {
            $update = mysqli_query($conn, "UPDATE Tabel_Pegawai SET Nik='".$nik."', Nama='".$nama."', Alamat='".$alamat."', Jenis_kelamin='".$jenis_kelamin."', No_tlp='".$no_tlp."', Jabatan='".$jabatan."' WHERE Id='".$id."'") or die(mysqli_error($conn));
        } else {
            $update = mysqli_query($conn, "UPDATE Tabel_Pegawai SET Nik='".$nik."', Nama='".$nama."', Alamat='".$alamat."', Jenis_kelamin='".$jenis_kelamin."', No_tlp='".$no_tlp."', Jabatan='".$jabatan."', Password='".md5($password)."' WHERE Id='".$id."'") or die(mysqli_error($conn));
        }

        if ($update) {
            echo "<script>alert('Sukses update pegawai');location.href='tampil_pegawai.php';</script>";
        } else {
            echo "<script>alert('Gagal update pegawai');location.href='edit_pegawai.php?id=".$id."';</script>";
        }
    }
}
?>
