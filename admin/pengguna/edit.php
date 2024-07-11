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

$id_user = $_GET["id_user"];

$user = query("SELECT * FROM users WHERE id_user = $id_user")[0];

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
    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

    <label for="">Username</label>
    <input type="text" class="form-control" name="username" value="<?= $user["username"]; ?>" required> <br>

    <label for="">Password</label>
    <input type="password" class="form-control" name="password" value="<?= $user["password"]; ?>" required> <br>

    <label for="">Role</label>
    <select name="role" id="" class="form-control" required>
        <option> <?= $user["role"] ?> </option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
    </select> <br>

    <input type="submit" name="edit" value="submit" class="btn btn-success">
</form>

<?php include '../../layouts/footer.php' ?>