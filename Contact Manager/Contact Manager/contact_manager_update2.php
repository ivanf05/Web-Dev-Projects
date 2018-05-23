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
        $contact = $_POST['contact'];
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
        echo $contact."dxdx";
        $sql = "UPDATE contact_list SET first_name='$firstName', last_name ='$lastName',
        primary_num = '$primaryNum', email = '$email', occupation = '$occupation', home_address='$homeAddress',
        zip = '$zip', city = '$city', state = '$state', comment= '$comment' WHERE contact_id=$contact";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        header("Location: contact_manager_home.php");
        $conn->close();
        mysqli_close($conn);
        
?>