<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="farmer-css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
    <style>
        .crud-btn{
            padding: 10px;
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
    <!-- <div class="navbar">
        <a href="#"><i class="logo"></i> AGRO-ONE</a>
        <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
        <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
      </div>
        <div class="farmer-complaint-container">
       
        <div class="farmer-complaint-centerdiv">
            <label for="complaintId" class="custom">Complaint Id:</label>
            <input type="text" id="complaintId" class="custom"><br><br><br><br>
            <label for="complaintDesc" class="custom">Complaint Desc:</label>
            <input type="text" id="complaintDesc" class="custom"><br><br><br><br><br><br>
            <input type="button" id="btn" value="Submit" class="custom">
        </div>
    </div> -->

    <div class="navbar">
        <img src="images/menu-icon.png" alt="icon" class="menu-icon" id="menu-icon" width="50px" style="margin-left:10px;">
        <a href="../farmer/Sell_crop.php"><i class="logo"></i> AGRO-ONE</a>
        <a href="../farmer/Sell_crop.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="../php/logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
      </div>
    <div class="container">

        <div class="sidebar" id="sidebar">  
            <nav class="menu-bar">
            <ul>

                <li><?php
                
                        
                if (session_status() == PHP_SESSION_NONE) {
                    echo "";
                }
                else{
                    $userid = $_SESSION["userid"];
                    $farmername = $_SESSION["farmername"];
                    echo $farmername . "<br>" . $userid;
                }
            ?></li>
             <li><a href="./Sell_crop.php">Sell Crop</a></li>
             <li><a href="./show_farming_tips.php"> Farming Tips</a></li>
                <li><a href="complaint_page.php" style="color:#f6ff41">Complaint Page</a></li>
                <li><a href="Show_complaint_status.php">Complaint Status</a></li>
                <li><a href="../Crops-Classification-With-Recommendation-System-Machine-Learning-main/runpredict.php" target="_blank">Get Crop Recommendation</a></li>
                <li><a href="../php/logout.php">Logout</a></li>
            </ul>
        </nav>
        </div>
    <div class="maincontent" id="maincontent">
        <div class="farmer-complaint-centerdiv">
            <form action="../php/filecomplaint.php" method="post">
                <label for="complaint_subject" class="custom">Complaint subject:</label>
                <input type="text" name="complaint_subject" id="complaint_subject" class="custom"><br><br><br><br>
                <label for="#complaintDesc" class="custom">Complaint Desc:
                <input type="text" name="complaintDesc" id="complaintDesc"></label><br><br><br>
                <button type="submit" class="crud-btn" value="Submit">Submit</button>
            </form>
        </div>

    </div>
    </div>
    <footer>
            <?php
                include("chatbot.php")
            ?>
        </footer>
    <script>

        // function disp(){
        //     var subject =document.getElementById("complaint_subject");
        //     var desc =document.getElementById("complaintDesc");

        //     window.alert(""+subject+ " " +desc);
        // }

        $("#menu-icon").click(function(){
            $("#sidebar").fadeToggle();
            $("#maincontent").animate({
                width:'100%',
            },'4000');
        });
      </script>
</body>
</html>