<?php 
require '../../connect.php';

session_start();

$id_confirm = $_GET['id_confirm'];

$query = mysqli_query($host, "DELETE FROM konfirmasi WHERE id_confirm = $id_confirm");

if ($query) {
    echo "
        <script>
            alert('Data Berhasil di Hapus');
            document.location.href = 'index.php';
        </script>
    ";
}
?>