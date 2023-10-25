<?php
    session_start();
    include('connection.php');

    $crop_name = $_POST["crop-name"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $category = $_POST["category"];
    // $category = filter_input(INPUT_POST, 'crop_category');
    
    $user = $_SESSION["userid"];
    $user_name = $_SESSION["farmername"];
        // $image = $_FILES['img']['name'];
        // $tempname = $_FILES["img"]["tmp_name"];
        // $folder = "../upload_data/crop_img/" . $image;

        $datetime = date("Y-m-d H:i:s");
    
    
    // if(!$result){
    //     $errorMessage = "Invalid Query";
    // }
    
    //     if (move_uploaded_file($tempname, $folder)) {
    //         echo "<h3>  Image uploaded successfully!</h3>";
    //     } else {
    //         echo "<h3>  Failed to upload image!</h3>";
    //     }
        

 
    $imagename = basename($_FILES["uploadfile"]["name"]);
    if(isset($_FILES["uploadfile"])){
        $imagetmp = addslashes(file_get_contents($_FILES["uploadfile"]["tmp_name"]));


        $sql = "INSERT INTO crop_table ( crop_name, crop_price, crop_qty, crop_category, crop_image, farmer_email, farmer_name,crop_status,order_status,requested_by,sold_to,datetime_posted,datetime_last_updated,datetime_request,datetime_sold)" . "VALUES ('$crop_name', '$price', '$qty', '$category', '$imagetmp', '$user','$user_name', 'available','AVAILABLE','','','$datetime','$datetime','','')";
        $result = $connection->query($sql);
        if(!$result){
            echo "<script> alert('Invalid Query')</script>";
        }
        header("Location: ../farmer/Sell_crop.php");
    }
    else{
        $sql = "INSERT INTO crop_table ( crop_name, crop_price, crop_qty, crop_category, crop_image, farmer_email,crop_status,order_status,requested_by,sold_to,datetime_posted,datetime_last_updated,datetime_request,datetime_sold)" . "VALUES ('$crop_name', '$price', '$qty', '$category', '', '$user', 'available','available','AVAILABLE','','','$datetime','$datetime','','')";
        $result = $connection->query($sql);
        header("Location: ../farmer/Sell_crop.php");
    }
    
   


    // $sql = "INSERT INTO crop_table ( crop_name, crop_price, crop_qty, crop_category, crop_image, farmer_email,crop_status)" . "VALUES ('$crop_name', '$price', '$qty', '$category', '$target_file', '$user', 'available')";
    // $result = $connection->query($sql);
   

    
?>