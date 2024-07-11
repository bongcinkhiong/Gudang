<?php 
require '../connect.php';

session_start();

if (!isset($_SESSION["username"])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            document.location.href = '../auth/login/index.php';
        </script>
    ";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
<title>Gudang Hengky</title>
<link rel="shortcut icon" href="../layouts/favicon.ico" type="image/x-icon">
</head>
</head>
<body>
    <?php include 'C:\laragon\www\gudang\layouts\sidebar.php'; ?>

    <h1>Selamat Datang <i><?= $_SESSION["username"]; ?></i></h1>


    <?php include 'C:\laragon\www\gudang\layouts\footer.php'; ?>
</body>
</html>