<?php 
require '../../connect.php';

session_start();

$id_barang = $_GET['id_barang'];

$query = mysqli_query($host, "DELETE FROM barang WHERE id_barang = $id_barang");

if ($query) {
    echo "
        <script>
            alert('Data Berhasil di Hapus');
            document.location.href = 'index.php';
        </script>
    ";
}


?>