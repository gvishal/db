<h2><a href="index.php">Welcome to Dropbox</a></h2>
<?php
    if(array_key_exists("logged_in", $_SESSION)) {
        echo "<h3>Welcome " . $_SESSION["user"] . "</h3>";
        if (array_key_exists("admin", $_SESSION)) {
            if ($_SESSION["admin"]) {
                echo "<h2><a href='users/index.php'>User Crud</a></h2>";
            }
        }
        echo "<h2><a href='logout.php'>Logout</a></h2>";
    }
    else{
        echo "<h2><a href='login.php'>Login</a></h2>";
        echo "<h2><a href='register.php'>Register</a></h2> ";
    }
?>
