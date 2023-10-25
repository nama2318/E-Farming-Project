<?php
    session_start();

    include("./connection.php");

    $csubject = $_POST["complaint_subject"];
    $description = $_POST["complaintDesc"];
    $user = $_SESSION["userid"];
    $username = $_SESSION["farmername"];

    $datetime = date("Y-m-d H:i:s");



    $sql = "INSERT INTO complaint_table (complaint_subject,complaint_description,status,farmer_email,farmer_name,complaint_datetime,resolved_datetime) VALUES('$csubject','$description','PROCESSING','$user','$username','$datetime','')";
    $result = $connection->query($sql);

    if(!$result){
        echo "Invalid query";
    }
    else{
        header("Location: ../farmer/complaint_page.php");
    }
?>