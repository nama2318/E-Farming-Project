<?php
    session_start();
    include('connection.php');

    $data = $_GET['id'];

    $sql = "DELETE FROM crop_table WHERE crop_id = '{$data}'";

    if($connection->query($sql) === TRUE){
        echo  "Data is deleted successfully";
        header("Location: ../farmer/Sell_crop.php");
    }else{
        echo "data is not deleted.";
    }
?>