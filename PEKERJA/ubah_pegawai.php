<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Edit Pegawai</title>
</head>
<body>
    <?php 
    include "koneksi.php";
    $qry_get_pegawai = mysqli_query($conn, "SELECT * FROM Tabel_Pegawai WHERE Id = '".$_GET['id']."'");
    $dt_pegawai = mysqli_fetch_array($qry_get_pegawai);
    ?>
    <div class="container mt-5">
        <h3>Edit Pegawai</h3>
        <form action="proses_edit_pegawai.php" method="post">
            <input type="hidden" name="id" value="<?=$dt_pegawai['Id']?>">
            <div class="mb-3">
                <label for="nik" class="form-label">NIK:</label>
                <input type="text" id="nik" name="nik" value="<?=$dt_pegawai['Nik']?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?=$dt_pegawai['Nama']?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" rows="4" required><?=$dt_pegawai['Alamat']?></textarea>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <?php 
                $arr_gender = array('L' => 'Laki-laki', 'P' => 'Perempuan');
                ?>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                    <option value=""></option>
                    <?php foreach ($arr_gender as $key_gender => $val_gender):
                        $selek = ($key_gender == $dt_pegawai['Jenis_kelamin']) ? 'selected' : '';
                    ?>
                    <option value="<?=$key_gender?>" <?=$selek?>><?=$val_gender?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_tlp" class="form-label">No Telepon:</label>
                <input type="text" id="no_tlp" name="no_tlp" value="<?=$dt_pegawai['No_tlp']?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan:</label>
                <select id="jabatan" name="jabatan" class="form-control" required>
                    <option value=""></option>
                    <?php 
                    $qry_jabatan = mysqli_query($conn, "SELECT id, Nama_jabatan FROM Tabel_Jabatan");
                    while ($data_jabatan = mysqli_fetch_array($qry_jabatan)) {
                        $selek = ($data_jabatan['id'] == $dt_pegawai['Jabatan']) ? 'selected' : '';
                        echo '<option value="'.$data_jabatan['id'].'" '.$selek.'>'.$data_jabatan['Nama_jabatan'].'</option>';   
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Update Pegawai</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
