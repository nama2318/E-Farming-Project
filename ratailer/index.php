<?php
    session_start();
  
?>

<html>
   <head>
       <title>SUPPLIER Dashboard</title>
      <!-- <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">-->
       <meta http-equiv="X-UA Compatible" content="IE-edge">
       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
       
       <style>
        .div-table{
          height: 80vh;
          overflow-y: scroll;
          width: 2500px;
          overflow-x: scroll;
          margin-left: 30px;
        }
        .table-heading{
          position:sticky;
          width: max-content;
        }
        table,th,tr,td{
            padding: 10px;
            height: max-content;
            width:fit-content;
        }
        .crop_img{
            height: 150px;
            width: 150px;
        }

        .crud-btn{
            padding: 8px;
            background-color: lightgreen;
            color: black;
            border-radius: 10px;
            border: none;
            margin: 10px;
            width: 100px;

        }
        .crud-btn:hover{
            background-color: lightcoral;
        }
        a:hover {
          color: #f6ff41;
        }


       </style>

       <script src="graph.js"></script>
   </head>

   <body>
       <div class="navbar">
           <a href="./index.php"><i class="logo"></i> AGRO-ONE</a>
           <a href="./index.php"><i class="fa fa-fw fa-home"></i> Home</a>
           <a href="../php/logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
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
                   <a href="#" onclick="postadv();"><li>EXPLORE PRODUCTS</li></a>
                    <a href="#" onclick="crops();"><li>CROPS RECIEVED</li></a>
                   
                    <a href="../php/logout.php"><li>LOGOUT</li></a>
               </ul>
           </nav>
           </div>

         
       <div class="container-fluid div-table" id="div1" style="margin-top: 20px; ">
        <center>
          <label for=""><H2>EXPLORE PRODUCTS</H2></label>
          <table class="adv-dis-table" style="padding: 5px">
            <tr class="table-heading">
            <th>
              <h3>ID</h3>
            </th>
            <th>
              <h3>Image</h3>
            </th>
            <th>
              <h3>Product Name</h3>
            </th>
            <th>
              <h3>Price (Rs.)</h3>
            </th>
            <th>
              <h3>Qty</h3>
            </th>
            <th>
              <h3>
                Total Price (Rs.)
              </h3>
            </th>
            <th>
              <h3>Seller</h3>
            </th>
            <th>
              <h3>Action</h3>
            </th>
            </tr>

            <?php
            include("../php/connection.php");

            $sql = "SELECT * FROM crop_table where crop_status = 'available' ORDER BY datetime_last_updated DESC";
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
                  <h3>$row[crop_id]</h3>
                </td>
                <td>
                <img class='crop_img' src='data:image/jpeg;base64,".base64_encode($row['crop_image']) . "'/>
                </td>
                <td>
                <h3>$row[crop_name]</h3>
                <h5><label style='color: rgb(168, 168, 168)'>$row[crop_category]</label></h4>

                </td>
                <td>
                <h3>$row[crop_price]</h3>
                </td>
                <td>
                <h3>$row[crop_qty]</h3>
                </td>
                ";
                $total = $row["crop_price"] * $row["crop_qty"];
                echo "<td>
                <h3>$total Rs.</h3>
                </td>";
                echo"

                <td>
                <h3>$row[farmer_name]</h3>
                </td>
                <td>
                <button type='button' class='crud-btn  details-btn' id='details-btn'><a href='./adv_details.php?id=$row[crop_id]'>DETAILS</a></button>

                <button type='button' class='crud-btn buy-btn' id='buy-btn'><a href='./adv_details.php?id=$row[crop_id]'>Buy</a></button>
                </td>
              </tr>
                
                
                ";
              }}
                
                
                ?>



            
          </table>
          </center>


        <!-- <form>
          <label for="photo">Photo:</label>
          <input type="file" id="photo" name="photo">
          
          <label for="title">Title:</label>
          <input type="text" id="title" name="title" required>
          
          <label for="description">Description:</label>
          <textarea id="description" name="description"></textarea>
          
          <label for="price">Price:</label>
          <input type="number" id="price" name="price" required>
          
          <label for="contact">Contact:</label>
          <input type="text" id="contact" name="contact" required>
          
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" required>
          
          <label for="locality">Locality:</label>
          <input type="text" id="locality" name="locality" required>
          
          <input type="submit" value="Submit">
        </form> -->
      </div>
       <script>
        let display = false
             
         function postadv() {
            document.getElementById("div2").style.display = "none"
            display1 = false
             if (display == false) {
                 document.getElementById("div1").style.display = "block"
                 display = true
             } else {
                 document.getElementById("div1").style.display = "none"
                 display = false
 
             }
         }
     </script>
     <div class="crops div-table" id="div2" style=" height:80vh; margin-top: 20px; margin-left: 30px; overflow-x: hidden; overflow-y:scroll">
         <label for=""><H2>YOUR ORDERS</H2></label>
      
        <table>
            <tr>
              <th>ID</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Quantity (Kg.)</th>
              <th>Price(Rs.)</th>
              <th>Total Price(Rs.)</th>
              <th>Farmer Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>

            <?php
            include("../php/connection.php");

            $sql = "SELECT * FROM crop_table where requested_by='{$userid}' ";
            $result = $connection->query($sql);

            
            
            if(!$result){
                $errorMessage = "Invalid Query";
                echo " ";
            }

            else{
                while($row = $result->fetch_assoc()){
                echo "
                <tr>
                <td><h3>$row[crop_id]</h3></td>
                <td><img class='crop_img' src='data:image/jpeg;base64,".base64_encode($row['crop_image']) . "'/></td>
                <td><h3>$row[crop_name]<h3>
                <h5><label style='color: rgb(168, 168, 168)'>$row[crop_category]</label></h4>
                </td>
                <td><h3>$row[crop_qty]</h3></td>
                <td><h3>$row[crop_price]<h3></td>

                ";
                $total = $row["crop_price"] * $row["crop_qty"];
                echo "<td>
                <h3>$total Rs.</h3>
                </td>";
                echo"

                <td><h3>$row[farmer_name]</td><h3>";
                  
                if($row["order_status"] == "SOLD"){
                  
                  echo "
                  
                <td>
                <span><img src='../images/gtick.png' alt='green tick' style='width:20px; height:20px'>
                <h3>ORDER CONFIREMED<h3></span></td>"; 
                }
                else{
                  echo "
                <td><h3>$row[order_status]<h3></td>";
                }
                 
                
                echo"
                <td><button type='button' class='crud-btn details-btn' id='detailss-btn'><a href='./cartitemdetails.php?id=$row[crop_id]'>VIEW DETAILS</a></button>
                
                ";
                if($row["order_status"] == 'REQUESTED'){
                  echo "<button type='button' class='crud-btn cancel-btn' id='cancel-btn'><a href='../php/cancelorder.php?id=$row[crop_id]'>CANCEL</a></button>";
                }

                echo "
                </td>
                </tr>
                ";
              
              
                }
              
              
              
              }
                
                
                
                
                ?>
            <!-- <tr>
              <td></td>
              <td><img  class="crop-img" src="" alt="Product 1"></td>
              <td>Product 1</td>
              <td>10</td>
              <td>100</td>
              <td>Farmer A</td>
              <td></td>
              <td><button class="button">View Details</button></td>
            </tr> -->
            
          </table>
    </div>
    <script>
        let display1=false
       
         function crops() {
            document.getElementById("div1").style.display = "none"
            display=false
             if (display1 == false) {
                 document.getElementById("div2").style.display = "block"
                 display1 = true
             } else {
                 document.getElementById("div2").style.display = "none"
                 display1 = false
 
             }
 
         }
     </script>
     <div class="dashboard" id="div3">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
      <script>
        // Create the scene, camera, and renderer
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.body.appendChild(renderer.domElement);
    
        // Create the line geometry and material
        const geometry = new THREE.BufferGeometry();
        const material = new THREE.LineBasicMaterial({ color: 0xffffff });
    
        // Set the positions of the line vertices
        const positions = [];
        positions.push(0, 0, 0); // starting point
        positions.push(1, 1, 1); // next point
        positions.push(2, 2, 2); // next point
        positions.push(3, 3, 3); // next point
        positions.push(4, 4, 4); // next point
    
        // Set the line geometry attributes
        geometry.setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
    
        // Create the line and add it to the scene
        const line = new THREE.Line(geometry, material);
        scene.add(line);
    
        // Set the camera position
        camera.position.z = 5;
    
        // Render the scene
        function animate() {
          requestAnimationFrame(animate);
          renderer.render(scene, camera);
        }
        animate();
      </script>
    </div>
    <footer>
      <?php
        include("chatbot.php")
      ?>
    </footer>
   </body>
</html>