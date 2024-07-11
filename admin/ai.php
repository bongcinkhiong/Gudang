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

<?php include '../layouts/sidebar.php'; ?>

<form action="">
    
</form>

<?php include '../layouts/footer.php'; ?>