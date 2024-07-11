<?php 
require '../../connect.php';

session_start();

function query ($query) {
    global $host;
    $result = mysqli_query($host, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
?>