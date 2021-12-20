<?php
require 'db_connection.php';

function fill_locatia($conn){
    $output ="";
    $sql ="SELECT * FROM locatie;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result))
    {
        $output .= '<option value = "'.$row["id_locatie"].'" >'.$row["raion"].'</option>';
    }
    return $output;
}
?>