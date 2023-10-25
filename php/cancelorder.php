<?php
    session_start();
    include('./connection.php');

    $id = $_GET["id"];

    $sql = "SELECT * FROM crop_table where crop_id = '$id'";
    $result = $connection->query($sql);
    $buyer;
    

    if(!$result){
        echo "Invalid Query";
    }
    else{
        while($row = $result->fetch_assoc()){
            $buyer = $row["requested_by"];
        }
        $sql = "UPDATE crop_table SET crop_status = 'available', order_status = 'AVAILABLE',requested_by = '', sold_to = '' where crop_id = '$id'";

        $result2 = $connection->query($sql);

        if(!$result2){
            echo "Invalid query 2";
        }
        else{
            header("Location: ../ratailer/index.php");
        }
    }

?>