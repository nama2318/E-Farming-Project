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
       <link rel="stylesheet" href="farmer-css/insertcrop.css">

       

   </head>

   <body>
       <div class="navbar">
            <img src="images/menu-icon.png" alt="icon" class="menu-icon" id="menu-icon" width="50px" style="margin-left:10px;">
            <a href="../farmer/Sell_crop.php"><i class="logo"></i> AGRO-ONE</a>
            <a href="../farmer/Sell_crop.php"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="../php/logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
         </div>
       <div class="container" style="margin-left: 0; padding:0;">
   
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
                <li><a href="./show_farming_tips.php"> Farming Tips</a></li>
                   <li><a href="complaint_page.php">Complaint Page</a></li>
                   <li><a href="Show_complaint_status.php">Complaint Status</a></li>
                   <li><a href="../Crops-Classification-With-Recommendation-System-Machine-Learning-main/runpredict.php" target="_blank">Get Crop Recommendation</a></li>
                  <li><a href="../php/logout.php">Logout</a></li>
                   <br>
                   <br>
                   <li></li>
               </ul>
           </nav>
           </div>
       <div class="maincontent" id="maincontent" style="padding: 20px; margin:auto;">
       <form action="../php/insertcrop.php" method="POST" style="width:1000px; height:1000px" enctype="multipart/form-data">
          <label for="photo">Photo:</label>
          <input type="file" name="uploadfile">
          <br>
          
          <label for="title">Crop Name:</label>
          <input type="text" id="crop-name" name="crop-name" required>
          <br>
          
          <label for="price">Price:</label>
          <input type="number" id="price" name="price" required>
          <br>
          
          <label for="contact">Quantity:</label>
          <input type="number" id="qty" name="qty" required>
          <br>
          
          <label for="category">Crop Category:</label>
          <!-- <input type="text" id="category" name="category" required> -->
          <select id='category' name='category' value='VEGETABLE' required>
                <option value='VEGETABLE'>VEGETABLE</option>
                <option value='FRUIT'>FRUIT</option>
                <option value='SEED'>SEED</option>
                <option value='CEREAL'>CEREAL</option>
            </select>
            <br>
          
          <input type="submit" value="SAVE">
        </form>   
       </div>
       </div>
       <footer>
            <?php
                include("chatbot.php")
            ?>
        </footer>   

       <script>
        $("#menu-icon").click(function(){
            
            
            $("#maincontent").animate({
                width:'100%',
            },'4000');
        });
   </script>

   
   
   </body>
</html>