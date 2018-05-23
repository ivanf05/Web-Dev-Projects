<html>
     <head>
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src = "ja.js">
        
        
    </script>  
     <link rel="stylesheet" type="text/css" href="contact_manager_style.css">
    </head>
    <style>
        tr.nice td{
            background: #D3D3D3;
        }
        tr.wh td{
            background: white;
        }
        tr.mouseon td {
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
        $dash = str_repeat('-', 237);
        echo "<div id =\"numbers\">"; 
        echo "<table border='1'>"; 
        echo "<th>Name</th>";
        echo "<th>Primary Number</th>";
        echo "<th>Email</th>";
        echo "<th>Occupation</th>";
        echo "<th>Home Address</th>";
        echo "<th>Zip</th>";
        echo "<th>City</th>";
        echo "<th>IL</th>";
        echo "<th>Comment</th>";
        if ($result->num_rows > 0) {
            $blank= str_repeat('&nbsp', 10);
            // output data of each row
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
            
                echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
                echo "<td>".$row["primary_num"]."</td>";
               
                echo "<td>".$row["email"]."</td>";
    
                echo "<td>".$row["occupation"]."</td>";
                echo "<td>".$row["home_address"]."</td>";
                echo "<td>".$row["zip"]."</td>";
                echo "<td>".$row["city"]."</td>";
                
                echo "<td>".$row["state"]."</td>";
                echo "<td>".$row["comment"]."</td>";
               
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        echo "</div>";
$conn->close();
?>
</body>
<form action ="contact_manager_home.php" method = "post">
    
    <input type="submit" value="Home"/>
</form>
</html>