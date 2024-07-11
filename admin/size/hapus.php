<?php 
require '../../connect.php';

session_start();

$id_size = $_GET['id_size'];

$query = mysqli_query($host, "DELETE FROM size WHERE id_size = '$id_size'");

if ($query) {
    echo "
        <script>
            alert('Data Berhasil di Hapus');
            document.location.href = 'index.php';
        </script>
    ";
}

?>