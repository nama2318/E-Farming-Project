<?php
    session_start();
    include('connection.php');

    $tip_title = $_POST["title"];
    $tip_description = $_POST["description"];
    $datetime = date("Y-m-d H:i:s");


    $sql = "INSERT INTO farming_tips_table (tip_title, tip_description, datetime_created) VALUES ('$tip_title', '$tip_description', '$datetime')";
    $result = $connection->query($sql);

    if(!$result){
        echo "<script> alert('Invalid Query')</script>";
    }
    else{
        header("Location: ../admin/sharefarmingtips.php");
    }
?>