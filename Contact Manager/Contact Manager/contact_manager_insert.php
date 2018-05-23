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
        
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $primaryNum = $_POST['primary'];
        $email = $_POST['email'];
        $occupation = $_POST['occupation'];
        $homeAddress = $_POST['home_address'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $comment = $_POST['comment'];
        $sql = "INSERT INTO contact_list (first_name, last_name, primary_num,email, occupation, home_address,
    zip, city, state, comment)
            VALUES ('$firstName', '$lastName', '$primaryNum','$email', '$occupation','$homeAddress','$zip'
            ,'$city','$state','$comment')";
    
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            //header("Location: contact_manager_home.php");
            
?>