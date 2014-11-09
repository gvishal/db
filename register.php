<?php
    
    include 'connect_db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $photo = NULL;
        $hash_password = $password;

        $sql = "INSERT INTO USER (name, email, hash_password, photo)
                VALUES ('$name', '$email', '$hash_password', '$photo')";

        if (mysql_query($sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysql_error($conn);
        }
    }
    else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        ?>
        <form action="" method="POST">
            Name : <input type="text" name="name"/><br>
            Email : <input type="text" name="email"/><br>
            Password: <input type="text" name="password"/><br>
            Photo: <input type="text" name="photo"/><br>
            <input type="submit" name="formSubmit" value="Submit" />
        </form>
    <?php
    }
    
?>