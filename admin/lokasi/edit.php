<?php 
require 'function.php';

session_start();

if(!isset($_SESSION["username"])) {
    echo"
        <script type='text/javascript'>
            alert('Anda Harus Login Terlebih Dahulu');
            document.location.href = 'login.php';
        </script>
    ";
}

if(isset($_POST["edit"])){
    if(edit($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil di Edit');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data Gagal DiEdit Bakaaa!!!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

$id_lokasi = $_GET["id_lokasi"];
$lokasi = query("SELECT * FROM lokasi WHERE id_lokasi = $id_lokasi")[0];
?>

<?php include '../../layouts/sidebar.php' ?>

<form action="" method="post">
    <input type="hidden" name="id_lokasi" value="<?= $lokasi["id_lokasi"]; ?>">

    <label for="">Nama Kota</label>
    <input type="text" class="form-control" name="Kota" value="<?= $lokasi["Kota"]; ?>" required> <br>

    <input type="submit" name="edit" value="submit" class="btn btn-success">
</form>

<?php include '../../layouts/footer.php' ?>