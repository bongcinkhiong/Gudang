<?php 
require '../../connect.php'; 

function query($query) {
    global $host;
    $result = mysqli_query($host, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;   
}

function add($data) {
    global $host;   
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $role = 'User';

    $query = "INSERT INTO users VALUES (null, '$username', '$password', '$role')";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data) {
    global $host;
    $id_user = $data['id_user'];
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $role = htmlspecialchars($data['role']);

    $query = "UPDATE users SET username = '$username', password = '$password', role = '$role' WHERE id_user = $id_user";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}
?>