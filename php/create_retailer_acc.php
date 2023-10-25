<?php

    include('connection.php');
   

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $city = $_POST["city"];
    $pswd = $_POST["pswd"];

    $datetime = date("Y-m-d H:i:s");

    //for checking connection



    $sql = "INSERT INTO retailer_table (retailer_email, retailer_first_name, retailer_last_name, retailer_phone_no, retailer_city, retailer_password,date_time_created,date_time_last_login)" . "VALUES ('$email', '$first_name', '$last_name', '$phone_no', '$city', '$pswd','$datetime','$datetime')";
    $result = $connection->query($sql);

    if(!$result){
        $errorMessage = "Invalid Query";
    }
        
        session_start();
        $_SESSION["userid"] = $email;
        $_SESSION["retailername"] = $first_name . " " . $last_name;
        $_SESSION["phoneno"] = $phone_no;
        header("Location: http://localhost/E-Farming%20Project/ratailer/index.php");
    
?>