<?php 
require '../../connect.php';

session_start();

if(!isset($_SESSION["username"])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

$id_user = $_GET["id_user"];

$query = mysqli_query($host, "DELETE FROM users WHERE id_user = '$id_user'");

if($query) {
    echo "
        <script>
            alert('Data Berhasil di Hapus');
            document.location.href = 'index.php';
        </script>
    ";
}

?>