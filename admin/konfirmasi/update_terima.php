<?php 
require '../../connect.php';

session_start();

$id = $_GET ['id_confirm'];

$query = mysqli_query($host, "UPDATE konfirmasi SET status = 'Success' WHERE id_confirm = $id"); 

if ($query) {
    echo "
        <script>
            alert('Data Berhasil di Terima');
            document.location.href = 'index.php';
        </script>
    ";
}
?>