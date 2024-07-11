<?php
session_start();
unset($_SESSION['id_user']);
session_destroy();
echo "
    <script>
        alert('Logout Success');
        document.location.href = 'auth/login/index.php';
    </script>
";
?>