<?php
if($_POST){
    $nama_jabatan = $_POST['nama_jabatan'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tunjangan = $_POST['tunjangan'];
    
    // Validasi untuk memastikan input tidak kosong
    if(empty($nama_jabatan)){
        echo "<script>alert('Nama jabatan tidak boleh kosong');location.href='tambah_jabatan.php';</script>";
    } elseif(empty($gaji_pokok)){
        echo "<script>alert('Gaji pokok tidak boleh kosong');location.href='tambah_jabatan.php';</script>";
    } elseif(empty($tunjangan)){
        echo "<script>alert('Tunjangan tidak boleh kosong');location.href='tambah_jabatan.php';</script>";
    } else {
        include "koneksi.php";  // Pastikan file koneksi ke database ada
        
        // Query untuk memasukkan data ke dalam tabel jabatan
        $insert = mysqli_query($conn, "insert into jabatan (nama_jabatan, gaji_pokok, tunjangan) VALUES ('".$nama_jabatan."', '".$gaji_pokok."', '".$tunjangan."')");
        
        if($insert){
            echo "<script>alert('Sukses menambahkan jabatan');location.href='tambah_jabatan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan jabatan');location.href='tambah_jabatan.php';</script>";
        }
    }
}
?>
