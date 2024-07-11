<?php 
session_start();
require 'function.php';

if(!isset($_SESSION["username"])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

$id_size = $_GET["id_size"];

$size = query("SELECT * FROM size WHERE id_size = $id_size")[0];

if(isset($_POST["edit"])) {
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
                alert('Data Gagal Disimpan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<?php include '../../layouts/sidebar.php' ?>

<form action="" method="POST">
    <input type="hidden" name="id_size" value="<?= $size['id_size'] ?>">

    <label for="">Size / Ukuran</label>
    <input type="text" class="form-control" name="size" value="<?= $size["size"]; ?>" required> <br>

    <input type="submit" name="edit" value="submit" class="btn btn-success">
</form>

<?php include '../../layouts/footer.php' ?>