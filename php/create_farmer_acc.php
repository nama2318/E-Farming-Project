<?php

    include('connection.php');

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $city = $_POST["city"];
    $pswd = $_POST["pswd"];
    $datetime = date("Y-m-d H:i:s");


    $sql = "INSERT INTO farmer_table (farmer_email, farmer_first_name, farmer_last_name, farmer_phone_no, farmer_city, farmer_password,date_time_created,date_time_last_login)" . "VALUES ('$email', '$first_name', '$last_name', '$phone_no', '$city', '$pswd','$datetime','$datetime')";
    $result = $connection->query($sql);

    if(!$result){
        $errorMessage = "Invalid Query";
    }
        
        session_start();
        $_SESSION["userid"] = $email;
        $_SESSION["farmername"] = $first_name . " " . $last_name;
        $_SESSION["phoneno"] = $phone_no;
        header("Location: http://localhost/E-Farming%20Project/farmer/Sell_crop.php");
    
?>