<?php 
    session_start();
    include('../php/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Complaints</title>

    <style>
        .sell_crop_div{
            height: 60vh;
        }

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
        <a href="./index.php"><i class="logo"></i> AGRO-ONE</a>
        <a href="./index.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="../php/logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
    </div>
   <div class="sell_crop_div">

            <div class="sidebar">
               
                <nav>
                <ul>
                <li>
                    Welcome, Admin!
                </li>
                    <li><a href="#" active style="color:#f6ff41"><li>Complaints</li></a>
                    <li><a href="./feedbackdisplay.php">Website Feedback</li></a>
                    <li><a href="./sharefarmingtips.php">Share Farming Tips</a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                </ul>
            </nav>
            </div>
            <center>
    <div class="table-div">
    <table>
        <label for=""><center> <H2>Complaints</H2></center> </label>
                        
        <br>
        <th>ID</th>
        <th>Complaint Subject</th>
        <th>Complaint Description</th>
        <th>Complaint Date & Time</th>
        <th>Resolve Date & Time</th>
        <th>Farmer Name</th>
        <th>Farmer E-Mail</th>
        <th>STATUS</th>
        <th>ACTION</th>
        <?php

            $sql = "SELECT * FROM complaint_table ORDER BY status";
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
                        $row[complaint_id]
                        </td>
                        <td>
                        $row[complaint_subject]
                    
                        </td>
                        <td>
                        $row[complaint_description]
                        </td>
                        <td>
                        $row[complaint_datetime]
                        </td>
                        ";
                        if($row["resolved_datetime"] == "0000-00-00 00:00:00"){
                            echo "<td>
                            Not Resolved yet
                            </td>";
                        }
                        else{
                            echo "<td>
                            $row[resolved_datetime]
                            </td>";
                        }   
                        echo"
                        <td>
                        $row[farmer_name]
                        </td>
                        <td>
                        $row[farmer_email]
                        </td>

                        <td>
                            $row[status]
                        </td>


                        <td>
                        
                        "; 

                        if($row["status"] == "PROCESSING"){
                        echo "
                        <button type='button' class='crud-btn  resolve-btn' id='resolve-btn'><a href='../php/resolve_complaint.php?id=$row[complaint_id]'>MARK AS RESOLVED</a></button>";
                    }
                        else{
                            echo "<img src='../images/gtick.png' alt='green tick' style='width:20px; height:20px'>";
                        }

                        echo "
                    </td>
                    </tr>
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