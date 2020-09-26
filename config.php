<?php
    $conn = mysqli_connect("localhost","root","","users");
    
    if($conn->connect_error){
        die("Could not connect to the database!".$conn->connect_error);
    }



?>