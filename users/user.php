<?php
    
    include 'connect_db.php';


    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $photo = NULL;

    $sql = "INSERT INTO USER (name, email, hash_password, photo)
            VALUES ('".$name"', '".$email"', '".$hash_password"', '".$photo"')";

    if (mysql_query($sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysql_error($conn);
    }
    
?>