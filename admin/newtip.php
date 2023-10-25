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
    <title>Sell Crop</title>

    <style>
        table,th,tr,td{
            padding: 10px;
            height: max-content;
            width:fit-content;
            margin-left: 20px;
            
        }
        .table-div{
            width: fit-content;
            overflow-x: scroll;
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
            margin: 10px;

        }
        .crud-btn:hover{
            background-color: lightcoral;
        }

        .form-container-parent{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            width: 1200px;
        }
        .form-container {
            max-width: 400px;
            margin:0 auto;
            padding: 20px;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
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
                    <li><a href="./index.php"  ><li>Complaints</li></a>
                    <li><a href="./feedbackdisplay.php">Website Feedback</li></a>
                    <li><a href="#" active style="color:#f6ff41">Share Farming Tips</a></li>
                    <li><a href="../php/logout.php" >Logout</a></li>
                </ul>
            </nav>
            </div>
            <center>
            <div class="form-container-parent">
            <div class="form-container">
                <form action="../php/inserttip.php" method="post">
                    <caption><h2> Share New Farming Tip</h2></caption>
                    <br>
                    <input type="text" name="title" placeholder="Title" required>
                    <textarea name="description" placeholder="Description" required></textarea>
                    <button type="submit">Share</button>
                </form>
            </div>
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