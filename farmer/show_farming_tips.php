<?php 
    session_start();
    include('../php/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="farmer-css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Sell Crop</title>

    <style>
        table,th,tr,td{
            padding: 10px;
            height: max-content;
            width:fit-content;
            margin-left: 20px;
        }
        .table-div{
            width: 1300px;
            height: 70vh;
            margin-top: 2%;
            overflow-y: scroll;
        }
        .crop_img{
            height: 70px;
            width: 70px;
        }
        .crud-btn{
            padding: 8px;
            background-color: lightgreen;
            color: black;
            border-radius: 10px;
            border: none;

        }
        .crud-btn:hover{
            background-color: lightcoral;
        }
        
    </style>
</head>
<body>
    <div class="navbar">
        <a href="../farmer/Sell_crop.php"><i class="logo"></i> AGRO-ONE</a>
        <a href="../farmer/Sell_crop.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="../php/logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
    </div>
   <div class="sell_crop_div">

            <div class="sidebar">
               
                <nav>
                <ul>
                <li>
                    <?php
                
                        
                        if (session_status() == PHP_SESSION_NONE) {
                            echo "";
                        }
                        else{
                            $userid = $_SESSION["userid"];
                            $farmername = $_SESSION["farmername"];
                            echo $farmername . "<br>" . $userid;
                        }
                    ?>
                </li>
                    <li><a href="./Sell_crop.php"  ><li>Sell Crop</li></a>
                    <li><a href="#" active style="color:#f6ff41">Farming Tips</li></a>
                    <li><a href="complaint_page.php">Complaint Page</li></a>
                    <li><a href="Show_complaint_status.php">Complaint Status</li></a>
                    <li><a href="../Crops-Classification-With-Recommendation-System-Machine-Learning-main/runpredict.php" target="_blank">Get Crop Recommendation</a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                </ul>
            </nav>
            </div>
            <center>
    <div class="table-div">
    <table><form action="addcrop.php">
        <caption style="text-align: left; margin:3px">
        <label for=""><center> <H2>FARMING TIPS</H2></center> </label>
                        
        <!-- <button type="submit" class="crud-btn">New Crop</button></form></caption> -->
        <br>
        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>DATE & TIME</th>
        <?php

            $sql = "SELECT * FROM farming_tips_table";
            $result = $connection->query($sql);
            
            if(!$result){
                $errorMessage = "Invalid Query";
                echo " ";
            }

            else{
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>
                        $row[tip_id]
                        </td>
                        <td>
                        $row[tip_title]
                        </td>
                        <td>
                        $row[tip_description]
                        </td>
                        
                        <td>
                        $row[datetime_created]
                        </td>
                        
                                
                    ";


                }
            }
        
        
        ?>
        <!-- <button type='button' class='crud-btn edit-btn' id='edit-btn'><a href='farmer_adv.php'>EDIT</a></button>
                        <button type='button' class='crud-btn details-btn ' id='details-btn'><a href='farmer_adv.php'>View Details</a></button> -->
        
                        
    </table>
    </div>
</div>
        </center>
        <footer>
            <?php
                include("chatbot.php")
            ?>
        </footer>
<script>
    $("#menu-icon").click(function(){
        $("#sidebar").fadeToggle();
        $("#maincontent").animate({
            width:'100%',
        },'4000');
    });
  </script>
</body>
</html>