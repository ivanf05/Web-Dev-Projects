<html>
    <body>
    <?php
        $contact = $_POST['contact'];
        echo $contact."3";
        
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
        
        
        $sql = "DELETE FROM contact_list WHERE contact_id=$contact";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        header("Location: contact_manager_home.php");
        $conn->close();
    ?>
    </body>
</html>