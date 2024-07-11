<?php 
require '../../connect.php';

function query($query){
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

    $size = $data['size'];

    $query = "INSERT INTO size VALUES (null , '$size')";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data) {
    global $host;

    $id_size = $data['id_size'];
    $size = $data['size'];

    $query = "UPDATE size SET size = '$size' WHERE id_size = '$id_size' ";

    mysqli_query($host,$query);

    return mysqli_affected_rows($host);
}
?>