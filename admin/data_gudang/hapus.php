<?php 
require '../../connect.php';

session_start();

$id_data = $_GET['id_data'];

$query = mysqli_query($host, "DELETE FROM data_barang WHERE id_data = $id_data");

if ($query) {
    echo "
        <script>
            alert('Data Berhasil di Hapus');
            document.location.href = 'index.php';
        </script>
    ";
}


?>