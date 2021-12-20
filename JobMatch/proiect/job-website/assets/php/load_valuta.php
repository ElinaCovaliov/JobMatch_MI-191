<?php
require 'db_connection.php';

function fill_valuta($conn){
    $output ="";
    $sql ="SELECT * FROM valuta;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result))
    {
        $output .= '<option value = "'.$row["id_valuta"].'" >'.$row["valuta"].'</option>';
    }
    return $output;
}
?>