<?php

use LDAP\Result;

    session_start();
    include('./connection.php');

    $name = $_POST["Name"];
    $number = $_POST["phone_number"];
    $msg = $_POST["message"];

    $datetime = date("Y-m-d H:i:s");

    $sql = "INSERT INTO feedback_table (name,phone_number,feedback,feedback_datetime) values ('$name','$number','$msg','$datetime')";

    $result = $connection -> query($sql);

    if(!$result){
        echo "invalid query";
    }
    else{
        session_unset();
        session_destroy();
        header("Location: ../");    
    }

?>