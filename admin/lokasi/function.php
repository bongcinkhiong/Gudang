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

function add ($data){
    global $host;

    $kota = htmlspecialchars($data['Kota']);

    $query = "INSERT INTO lokasi VALUES (null , '$kota')";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data){
    global $host;

    $id_lokasi = $_GET['id_lokasi'];
    $kota = htmlspecialchars($data['Kota']);

    $query = "UPDATE lokasi SET Kota = '$kota' WHERE id_lokasi = $id_lokasi";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

?>
