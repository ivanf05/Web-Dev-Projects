<html>
    <body>
    <?php
        $contact = $_POST['contact'];
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
        
        $query = "SELECT * FROM contact_list WHERE contact_id= $contact";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            $blank= str_repeat('&nbsp', 10);
            // output data of each row
            
            while($row = $result->fetch_assoc()) {
                $contactId=$row["contact_id"];
                $firstName =$row["first_name"];
                $lastName= $row["last_name"];
                $primaryNum=$row["primary_num"];
                $email= $row["email"];
                $occupation=$row["occupation"];
                $homeAddress=$row["home_address"];
                $zip=$row["zip"];
                $city=$row["city"];
                $state=$row["state"];
                $comment=$row["comment"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
    </body>
    <body>
        <form action ="contact_manager_update2.php" method = "post">
      <table>
        <tr>
          <td> First Name: </td>  
          <td> <input type = "text"  name = "first_name" 
                      id = "first_name"  size = "30" placeholder="First"
                      value='<?php echo $firstName?>'/>
          </td>
		  <td> Last Name: </td>  
          <td> <input type = "text"  name = "last_name" 
                      id = "last_name" size = "30" placeholder="Last"
                      value='<?php echo $lastName?>'/>
          </td>
        </tr>
        <tr>
          <td> Primary #: </td>
          <td> <input type = "text"  name = "primary"  
                      id = "primary" size = "30" placeholder="Ex: 123-456-7890" 
                      value='<?php echo $primaryNum;?>'/>
          </td>
		  <td> E-mail: </td>
          <td> <input type = "text"  name = "email"  
                      id = "email"  size = "30" placeholder="Ex: email@email.com"
                      value='<?php echo $email?>'/>
          </td>
        </tr>
        <tr>
          <td> Occupation:</td>
          <td> <input type = "text"  name = "occupation"  
                      id = "occupation"  size = "30" placeholder="Ex: Doctor"
                      value='<?php echo $occupation?>'/>
          </td>
          <td> Home Address: </td>
          <td> <input type = "text"  name = "home_address"  
                      id = "home_address"  size = "30" placeholder="Ex: 1234 S. 45th Ave."
                      value='<?php echo $homeAddress?>'/>
          </td>
        </tr>
		<tr>
          <td> Zip Code: </td>
          <td> <input type = "text"  name = "zip"  
                      id = "zip"  size = "30" onfocus="zipFocusFunction()" onblur="zipBlurFunction()" 
                      placeholder="Ex: 60290" value='<?php echo $zip?>'/>
          </td>
		  <td> City: </td>
          <td> <input type = "text"  name = "city"  
                      id = "city"  size = "30" placeholder="Ex: Chicago" value='<?php echo $city?>'/>
          </td>
        </tr>
        <tr>
          <td> State: </td>
          <td> <input type = "text"  name = "state"  
                      id = "state"  size = "30" placeholder="Ex: IL" value='<?php echo $state?>' />
          </td>
		  <td> Comments: </td>
          <td> <input type = "text"  name = "comment"  
                      id = "comment"  size = "30" placeholder="Ex. Speaks Spanish" value='<?php echo $comment;?>'/>
                <input type="hidden" name='contact' value='<?php echo $contact;?>' />      
          </td>
        </tr>
		<tr>
          <td>
			<td><input type="submit" value="Update"/></td>
			 </form>
          </td>
          <td>
          <form action ="contact_manager_home.php" method = "post">
          <input type="submit" value="Home"/>
          </form>
          </td>
        </tr>
      </table>  
    </body>
</html>