<?php
    session_start();

?>

<html>
   <head>
       <title>Farmer Dashboard</title>
      <!-- <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">-->
       <meta http-equiv="X-UA Compatible" content="IE-edge">
       <link rel="stylesheet" href="farmer-css/style.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

       

   </head>

   <body>
       <div class="navbar">
            <img src="images/menu-icon.png" alt="icon" class="menu-icon" id="menu-icon" width="50px" style="margin-left:10px;">
           <a href="index.html" style="margin-left: 10px;"><i class="logo"></i> AGRO-ONE</a>
           <a href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
           <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
           <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
           <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
         </div>
       <div class="container">
   
           <div class="sidebar" id="sidebar">  
               <nav class="menu-bar" >
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
                <li><a href="Sell_crop.php">Sell Crop</a></li>
                   <li><a href="#">Advertisement Details</li></a>
                   <li><a href="farmer_farmers_tips.html">Farming Tips</li></a>
                   <li><a href="complaint_page.html">Complaint Page</a></li>
                   <li><a href="Show_complaint_status.html">Complaint Status</a></li>
                   <li><a href="../php/runpredict.php">Crop Prediction</a></li>
                   <li><form action="../Crops-Classification-With-Recommendation-System-Machine-Learning-main/home.html"><button type="submit" id="logout-btn"> Logout</button></form></li>
                   <br>
                   <br>
                   <li></li>
               </ul>
           </nav>
           </div>
       <div class="maincontent" id="maincontent">

       </div>
       </div>   

       <script>
        $("#menu-icon").click(function(){
            
            $("#maincontent").css('background-color','yellow');
            $("#maincontent").animate({
                width:'100%',
            },'4000');
        });
   </script>

   
   
   </body>
</html>