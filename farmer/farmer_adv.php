<?php
    session_start();
?>

<html>
   <head>
       <title>Farmer Dashboard</title>
      <!-- <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">-->
       <meta http-equiv="X-UA Compatible" content="IE-edge">
       <link rel="stylesheet" href="farmer-css/style.css">
       <link rel="sytlesheet" href="farmer-css/adv.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

       <!-- <style>
        .crop_img{
            height: 70px;
            width: 70px;
        }
       </style> -->
      

       

   </head>

   <body>
       <div class="navbar">
            <img src="images/menu-icon.png" alt="icon" class="menu-icon" id="menu-icon" width="50px" style="margin-left:10px;">
            <a href="../farmer/Sell_crop.php"><i class="logo"></i> AGRO-ONE</a>
            <a href="../farmer/Sell_crop.php"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="../php/logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
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
           <div class="maincontent" id="maincontent">
                <!-- <div class="inner-container" style="height:1000px; width:1000px">
                        <div class="image-div" style="height:100%; width:30%">
                            <img src="" alt="">
                        </div>
                        <form action="">
                        <div class="crop_name" >
                            <label for="#crop-name">Crop Name</label>
                            <input type="text" value="" id="crop-name">
                        </div>
                        <br>
                        <div>
                            <label for="#price">Price</label>
                            <input type="number" value="" id="price">
                        </div>
                        <br>
                        <div>
                            <label for="qty">QTY</label>
                            <input type="number" value="" id="qty">
                        </div>
                        <br>
                        <div>
                            <button class="save-btn"><a href="../php/updatef.php">Save</a></button>
                            <button class="delete-btn"><a href="../php/deletef.php">Delete</a></button>
                        </div>
                        </form>
                </div> -->


                <div>
                    <link href="./farmer-css/home.css" rel="stylesheet" />
                    
                    <div class="home-container">
                    <?php
                        $id = $_GET["id"];

                        include("../php/connection.php");

                        $sql = "SELECT * FROM crop_table WHERE crop_id = '{$id}'";

                        $result = $connection->query($sql);
            
                        if(!$result){
                            $errorMessage = "Invalid Query";
                            echo " ";
                        }

                        else{
                            while($row = $result->fetch_assoc()){
                                echo "

                                <form class='home-form'>
                                <span>
                                    <span>Product ID: $row[crop_id]</span>
                                    <br />
                                </span>
                                <div class='home-container01'>
                                    <div class='home-container02'>
                                    <img 
                                        class='home-image' 
                                        alt = 'image'
                                        src='data:image/jpeg;base64,".base64_encode($row['crop_image']) . "'/>
                                    </div>
                                    <div class='home-container03'>
                                    <div class='home-container04'><span>Product Name: $row[crop_name]</span></div>
                                    <div class='home-container05'><span>Category: $row[crop_category]</span></div>
                                    <div class='home-container06'>
                                        <span>Advertiser: {$_SESSION['farmername']}</span>
                                    </div>
                                    <div class='home-container07'>
                                        <div class='home-container08'><span>Price : Rs. $row[crop_price] /Kg.</span></div>
                                        <div class='home-container09'>
                                        <span>
                                            <span>Qty: $row[crop_qty] Kg.</span>
                                            <br />
                                        </span>
                                        </div>
                                    </div>
                                    ";
                                        $total = $row["crop_price"] * $row["crop_qty"];
                                        echo "
                                        <div class='home-container04'><span>Total Price: $total Rs.</span></div> </br>";

                                        if($row["order_status"] == 'SOLD'){
                                            echo "
                                            <div class='home-container04'><span>Status: SOLD </span></div> </br>

                                            <div class='home-container04'><span>Buyer: $row[sold_to]</span></div> </br>
                                            ";
                                        }

                                        if($row["order_status"] == 'SOLD'){

                                            echo "<div class='home-container12'>
                                            <button class='home-button1 button'>
                                                <a href='./Sell_crop.php'>
                                                DONE
                                                </a>
                                            </button>
                                            </div>";


                                        }
                                        else{ 
                                            echo"
                                    <div class='home-container10'>
                                        <div class='home-container11'>
                                        <button class='home-button button'>
                                            <a href='./editcrop.php?id=$row[crop_id]'>
                                                Edit
                                            </a>
                                        </button> </div>";
                                        
                                        echo "
                                        
                                        <div class='home-container12'>
                                        <button class='home-button1 button'>
                                            <a href='../php/deletef.php?id=$row[crop_id]'>
                                            Delete
                                            </a>
                                        </button>
                                        </div>

                                        ";
                                        }
                                        
                                        echo "
                                    </div>
                                    </div>
                                </div>
                                </form>

                                
                                ";
                            }
                        
                        
                        }

                    
                    ?>
                    </div>
                </div>



        <!-- <div>
            <link href="./farmer-css/home.css" rel="stylesheet" />
            <div class="home-container">

                <form class="home-form">
                <span>
                    <span>Product ID: 1234</span>
                    <br />
                </span>
                <div class="home-container01">
                    <div class="home-container02">
                    <img
                        src="../farmer/images/menu-icon.jpg"
                        alt="image"
                        class="home-image"
                    />
                    </div>
                    <div class="home-container03">
                    <div class="home-container04"><span>Product Name: Wheat</span></div>
                    <div class="home-container05"><span>Category: Flour</span></div>
                    <div class="home-container06">
                        <span>Advertiser: Abhinav Singh</span>
                    </div>
                    <div class="home-container07">
                        <div class="home-container08"><span>Price : 15</span></div>
                        <div class="home-container09">
                        <span>
                            <span>Qty: 20</span>
                            <br />
                        </span>
                        </div>
                    </div>
                    <div class="home-container10">
                        <div class="home-container11">
                        <button class="home-button button">
                            <span>
                            <span>Edit</span>
                            <br />
                            </span>
                        </button>
                        </div>
                        <div class="home-container12">
                        <button class="home-button1 button">
                            <span>
                            <span>Delete</span>
                            <br />
                            </span>
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
                </form>


            </div>
        </div> -->



            


            </div>
       </div>   
       <footer>
            <?php
                include("chatbot.php")
            ?>
        </footer>

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