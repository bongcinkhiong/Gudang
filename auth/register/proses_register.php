<?php
require '../connect.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$roles = 'User';

$query = mysqli_query($host, "INSERT INTO users VALUES (null, '$username', '$password', '$roles')");

if ($query) {
    echo "
        <script>
            alert('Register Success Mate!');
            document.location.href = '../login/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Register Failed BAKAA!!!');
            document.location.href = 'index.php';
        </script>
    ";
}
?>