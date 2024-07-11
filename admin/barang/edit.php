<?php 
require 'function.php';

if(!isset($_SESSION["username"])) {
    echo "
        <script type='text/javascript'>
            alert('Anda Harus Login Terlebih Dahulu');
            document.location.href = 'login.php';
        </script>
    ";
}

if(isset($_POST["edit"])) {

    if(edit($_POST) > 0) {
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

$id_barang = $_GET["id_barang"];
$barang = query("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

?>

<?php include '../../layouts/sidebar.php' ?>

<form action="" method="post">
    <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">

    <label for="">Nama Barang</label>
    <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required> <br>

    <label for="">Harga</label>
    <input type="text" class="form-control" name="harga" value="<?= $barang['harga'] ?>" required> <br>

    <label for="">Stok</label>
    <input type="text" class="form-control" name="stok" value="<?= $barang['stok'] ?>" required> <br>

    <input type="submit" name="edit" value="submit" class="btn btn-success">
</form>

<?php include '../../layouts/footer.php' ?>
