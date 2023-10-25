<?php
    $u_id = $_POST['email'];
    $pass = $_POST['passwd'];


    if($u_id == "farmer@gmail.com" && $pass == 123){
        header("Location: http://localhost/E-Farming%20Project/farmer/index.html");
        exit;
        // echo "Success";
    }
    elseif($u_id == "retailer@gmail.com" && $pass == 123){
        header("Location: http://localhost/E-Farming%20Project/ratailer/index.html");
        exit;
    }
    else{
        echo "failed";
    }

    

?>