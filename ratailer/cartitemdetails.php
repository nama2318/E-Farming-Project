<!-- <?php
    session_start();
    ?> -->
    
    <html>
       <head>
           <title>SUPPLIER Dashboard</title>
          <!-- <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">-->
           <meta http-equiv="X-UA Compatible" content="IE-edge">
           <link rel="stylesheet" href="css/style.css">
           
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
           <script src="graph.js"></script>
    
           </head>
    
       <body>
           <div class="navbar">
               <a href="#"><i class="logo"></i> AGRO-ONE</a>
               <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
               <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
               <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
               <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
             </div>
           <div class="content">
               <div class="sidebar">
                   
                   <nav>
                   <ul>
                    <li>
                      <?php
                          $userid = $_SESSION["userid"];
                          $farmername = $_SESSION["retailername"];
                          echo $farmername . "<br>" . $userid;
                      ?>
                    </li>
                       <a href="#"onclick="dashboard();"><li>DASHBOARD</li></a>
                       <a href="#" onclick="postadv();"><li>POST ADVERTISEMENT</li></a>
                        <a href="#" onclick="crops();"><li>CROPS RECIEVED</li></a>
                       
                       <li>LOGOUT</li>
                   </ul>
               </nav>
               </div>
    
    
                <div>
                        <link href="./css/home.css" rel="stylesheet" />
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
                                            <span>Advertiser: {$row["farmer_name"]}</span>
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
                                        <div class='home-container10'>
                                            <div class='home-container11'>

                                            ";


                                                $total = $row["crop_price"] * $row["crop_qty"];
                                                echo "<td>
                                                <label>Total Price: $total Rs.</label>
                                                </td> </br></br>";
                

                                            if($row["order_status"] == 'REQUESTED'){
                                                echo "<button class='home-button button'>
                                                <a href='../php/cancelorder.php?id=$row[crop_id]'>
                                                    CANCEL
                                                </a>
                                                </button>";
                                            }
                                            else{
                                                echo "
                                                <button class='home-button button' style='width: 100px; height: 100px;'>
                                                <a href='./index.php'>
                                                    DONE
                                                </a>
                                                </button>
                                                ";
                                            }

                                            echo"
                                            
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
               
    
    
    
                    <footer>
      <?php
        include("chatbot.php")
      ?>
    </footer>
    
       </body>
    </html>