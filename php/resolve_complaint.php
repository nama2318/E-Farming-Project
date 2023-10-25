<?php

    session_start();
    include("./connection.php");

    $id = $_GET["id"];
    $datetime = date("Y-m-d H:i:s");

    $sql = "UPDATE complaint_table SET status = 'RESOLVED', resolved_datetime='$datetime' where complaint_id = $id";
    $result = $connection->query($sql);

    if(!$result){
        echo " Invalid query";
    }
    else{
        header("Location: ../admin/index.php");
    }


?>