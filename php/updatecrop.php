<?php
    session_start();

    include('./connection.php');

    $crop_id = $_GET['id'];
    $crop_name = $_POST['crop_name'];
    $crop_category = filter_input(INPUT_POST, 'crop_category');
    $crop_price = $_POST['crop_price'];
    $crop_qty = $_POST['crop_qty'];
    $datetime = date("Y-m-d H:i:s");


    $sql = "UPDATE crop_table SET crop_name='".$crop_name."',crop_category='".$crop_category."',crop_price='".$crop_price."',crop_qty='".$crop_qty."' WHERE crop_id=".$crop_id;
    $sql2 = "UPDATE crop_table SET datetime_last_updated = '$datetime' where crop_id = '$crop_id'";


    $result = $connection->query($sql);
    $result2 = $connection->query($sql2);

    if(!$result){
        echo "Invalid Query";
    }
    else{
        header("Location: ../farmer/Sell_crop.php");
    }






?>
