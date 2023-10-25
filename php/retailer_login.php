<?php
    
    include('connection.php');
    $userid = $_POST["email"];
    $pswd = $_POST["passwd"];

    
    $datetime = date("Y-m-d H:i:s");
    

    

    // $sql = "SELECT * FROM 'farmer_table' where farmer_email = '$userid'" ;
    $sql = "SELECT * FROM retailer_table where retailer_email = '{$userid}'";
    $result = $connection->query($sql);

    if(!$result){
        $errorMessage = "Invalid Query";
        echo " ";
    }


    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $user_id = $row["retailer_email"];
        $retailer_fullname = $row["retailer_first_name"] . " " . $row["retailer_last_name"];
        $passwd = $row["retailer_password"];
    }
    
    
    // $user_id = $firstrow["email"];
    // $farmer_fullname = $firstrow["farmer_first_name"] . " " . $firstrow["farmer_last_name"];
    if($user_id == $userid && $passwd == $pswd){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            
        }
        $sql2 = "UPDATE retailer_table SET date_time_last_login = '$datetime' where retailer_email = '$user_id'";
        $result2 = $connection->query($sql2);
        if(!$resule2){
            echo "invalid date query";
        }
        $_SESSION["userid"] = $user_id;
        $_SESSION["retailername"] = $retailer_fullname;
        header("Location: http://localhost/E-Farming%20Project/ratailer/index.php");
    }

?>