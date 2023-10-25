<?php
    session_start();
    include("./connection.php");

    $id = $_GET["id"];
    $user = $_SESSION["userid"];
    $datetime = date("Y-m-d H:i:s");

    $sql = "UPDATE crop_table SET order_status='REQUESTED',requested_by='$user',crop_status='requested',datetime_request = '$datetime' where crop_id = '$id'";
    $result = $connection->query($sql);

    if(!$result){
        echo "Invalid Query";
    }
    else{
        echo"<script>alert('Order Requested')</script>";
        header("Location: ../ratailer/index.php#div1");
    }


?>