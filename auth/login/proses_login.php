<?php

require '../../connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($host, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_array($query);

    if ($data['role'] == 'Admin') {
        session_start();
        $_SESSION = [
            'id_user' => $data['id_user'],
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => $data['role']
        ];
        header('location: ../../admin/index.php');
    } else if ($data['role'] == 'User') {
        session_start();
        $_SESSION = [
            'id_user' => $data['id_user'],
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => $data['role']
        ];
        header('location: ../../user/index.php');
    }
} else {
        echo"
            <script>
                alert('Login Failed');
                document.location.href = 'index.php';
            </script>
        ";
    }

?>