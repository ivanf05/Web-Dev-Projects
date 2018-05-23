<html>
     <head>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    
    </head>
    
    <style>
        tr.nice td{
            background: #D3D3D3;
        }
        tr.wh td{
            background: white;
        }
        tr.trmouseon td {
            background: #ADD8E6;
        }
       
    </style>
    
<body>
    <?php
        $servername = "127.0.0.1";
        $username = "ivanf05";
        $password = "";
        $dbname = "contact_manager";
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        //echo "Connected successfully"."</br>";
        $query = "SELECT * FROM contact_list";
        $result = $conn->query($query);
         echo "<div id =\"numbers\">"; 
        echo "<table id  border='1'>"; 
        echo "<th>Contact #</th>";
        echo "<th>Name</th>";
        echo "<th>Primary Number</th>";
        
        if ($result->num_rows > 0) {
           
            // output data of each row
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>"; 
                echo "<td> ".$row["contact_id"]."</td>";
                echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
               
                echo "<td>".$row["primary_num"]."</td>";
                echo "</tr>"; 
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
          echo "</div>"; 
    ?>    
    </body>
    <body>
        <form action ="contact_manager_del.php" method = "post">
         <td> Enter Contact ID#: </td>  
          <td> <input type = "text"  name = "contact" 
                      id = "contact"  size = "30" placeholder="Ex: 1" />
	
			
            <td algin = "center"><input type="submit" value="Delete"/></td>
            </form>
            <form action ="contact_manager_home.php" method = "post">
                <input type="submit" value="Home"/>
            </form>
          </td>
    </body>
    <script type="text/javascript">
    $("body").css("background-color","#EEEEEE");
    $("#numbers tr:even").addClass("nice");
	$("#numbers tr:odd").addClass("wh");
    $("th").css("background-color","#000080");	
	$("#numbers tr").mouseover(function() { $(this).addClass("trmouseon"); });
	$("#numbers tr").mouseout(function() { $(this).removeClass("trmouseon"); });
	$("th").mouseover(function(){
	    $("th").css("background-color", "#ADD8E6");
	});
	$("th").mouseout(function(){
	   $("th").css("background-color", "#000080");
	});
    
        
    </script>
    
    </html>