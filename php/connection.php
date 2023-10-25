<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "efarmingmaster";

    $connection = new mysqli($servername,$username,$password,$db_name);

    if($connection->connect_error){
        die("Connection Error : " . $connection->connect_error);
    }
    // echo "Connection success.";
?>