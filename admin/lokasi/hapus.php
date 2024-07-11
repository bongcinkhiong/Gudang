<?php 
require '../../connect.php'; 

session_start();

$id_lokasi = $_GET['id_lokasi'];

mysqli_query($host, "DELETE FROM lokasi WHERE id_lokasi = $id_lokasi");

echo"
    <script>
        alert('Data Berhasil di Hapus');
        document.location.href = 'index.php';
    </script>
";

?>  