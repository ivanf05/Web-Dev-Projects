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
        tr.trmouseon td {
            background: #ADD8E6;
        }
       
    </style>
    <div id ='title'>
    <h1>Contacts</h1>
    </div>
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
         echo "<table border='1'color='black'>"; 
         echo "<th>Name</th>";
         echo "<th>Primary Number</th>";
         echo "<th>Edit/View</th>";
         echo "<th>Delete</th>";
        if ($result->num_rows > 0) {
           
            // output data of each row
            
            while($row = $result->fetch_assoc()) {
                $contact = $row["contact_id"];
                echo "<tr>"; 
                
                echo "<td>".$row["first_name"]." ".$row["last_name"]."</td>";
               
                echo "<td>".$row["primary_num"]."</td>";
                echo "<form action=\"contact_manager_update.php\" method=\"post\">";
                echo "<input type=\"hidden\" name='contact' value='$contact' />";   
                echo "<td><input type=\"submit\" class=\"linkButton\" value = \"Edit/View\"/></a></td>";
                echo "</form>";
                echo "<form action=\"contact_manager_del.php\" method=\"post\">";
                echo "<input type=\"hidden\" name='contact' value='$contact' />";
                echo "<td><input type=\"submit\" class=\"linkButton\" value = \"Delete\"/></a></td>";
                echo "</form>";
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
        <table border = "0">
        <tr>
            <form action ="contact_manager.php" method = "post">
                <td algin = "center"><input type="submit" value="Contact List"/></td>
            </form>
            <form action ="contact_manager.html" method = "post">
                <td algin = "center"><input type="submit" value="Create New"/></td>
            </form>   
            <form action ="contact_manager_del_list.php" method = "post">
                <td algin = "center"><input type="submit" value="Delete"/></td>
            </form>
            <form action ="contact_manager_update_list.php" method = "post">
                <td algin = "center"><input type="submit" class="linkButton" value="Update"/></td>
            </form>
                <td algin = "center"><button id = "xmlButton" class="linkButton">Import from XML</button></td>
        </tr>
        </table>
    </body>
    <style>
        .linkButton { 
     background: none;
     border: none;
     color: #0066ff;
     text-decoration: underline;
     cursor: pointer; 
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
	// Change elements of the h1 tag so their inner text says "jQuery works..."
	$("h1").css("background-color","#000080");
	$("h1").css("color","white");
	$("th").css("color","white");
    $("th").css("background-color","#000080");
	$("#numbers tr:even").addClass("nice");
	$("#numbers tr:odd").addClass("wh");
	
	$("#numbers tr").mouseover(function() { $(this).addClass("trmouseon"); });
	$("#numbers tr").mouseout(function() { $(this).removeClass("trmouseon"); });
	$("th").mouseover(function(){
	    $("th").css("background-color", "#ADD8E6");
	});
	$("th").mouseout(function(){
	   $("th").css("background-color", "#000080");
	});
	$("#xmlButton").bind('click', launchImport);
	
});
function launchImport(){
	window.location.href = "import_contacts.php";
}
/*function contactXML(){
	$.ajax({
		type: "GET",
		url:"customers.xml",
    	datatype: "xml",
    	success: postToPageTwo
	});

	
}*/
    </script>

</html>