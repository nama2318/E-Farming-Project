<?php
  session_start();
  include('../php/connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="farmer-css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        a{
            text-decoration: none;
            color: white;
        }
        table,th,tr,td{
            padding: 10px;
            height: max-content;
            width:fit-content;
            margin-left: 350px;
        }
        .maincontent{
            width: 1300px;
            height: 70vh;
            margin-top: 2%;
            overflow-y: scroll;
        }
        

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head> 
<body>
    
    
    <div class="navbar">
        <a href="../farmer/Sell_crop.php"><i class="logo"></i> AGRO-ONE</a>
        <a href="../farmer/Sell_crop.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="../php/logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
    </div>

    <div class="sell_crop_div">
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
                <li><a href="complaint_page.php">Complaint Page</a></li>
                <li><a href="Show_complaint_status.php" active style="color:#f6ff41">Complaint Status</a></li>
                <li><a href="../Crops-Classification-With-Recommendation-System-Machine-Learning-main/runpredict.php" target="_blank">Get Crop Recommendation</a></li>
                <li><a href="../php/logout.php">Logout</a></li>
            </ul>
        </nav>
        </div>
      <div class="maincontent" id="maincontent">
        <center> <caption ><h2> <label style="color:green;" > COMPLAINT STATUS</label></h2></caption></center>
      <table class="table table-striped w-50 h-50" style="margin-top: 30px;">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Subject</th>
            <th scope="col">Description</th>
            <th scope="col">Complaint Date & Time</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
        <?php

            $sql = "SELECT * FROM complaint_table where farmer_email = '{$userid}'";
            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid Query";
                echo " ";
            }

            else{
                while($row = $result->fetch_assoc()){
                  echo "
                  <tr>
                  <th scope='row'>$row[complaint_id]</th>
                  <td>$row[complaint_subject]</td>
                  <td>$row[complaint_description]</td>
                  <td>$row[complaint_datetime]</td>
                  <td>$row[status]</td>
                </tr>
                  ";}
              
              
              }
                
                ?>
          
        </tbody>
      </table>
    </div> 
</div>

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