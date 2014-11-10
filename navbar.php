<h2><a href="index.php">Welcome to Dropbox</a></h2>
<?php
    if(array_key_exists("logged_in", $_SESSION)) {
        echo "<h4>Welcome " . $_SESSION["user"] . "</h4>";
        if (array_key_exists("admin", $_SESSION)) {
            if ($_SESSION["admin"]) {
                echo "<h2><a href='users/index.php'>User Crud</a></h2>";
            }
        }
        echo "<h4><a href='home.php'>Home Folder</a></h4>";
        echo "<h4><a href='account.php'>Accounts Linked</a></h4>";
        echo "<h4><a href='app.php'>Your apps</a></h4>";
        echo "<h4><a href='device.php'>Devices Open On</a></h4>";
        echo "<h4><a href='preference.php'>Preference</a></h4>";
        echo "<h4><a href='session.php'>Sessions Active</a></h4>";
        echo "<h4><a href='subscription.php'>Subscription</a></h4>";
        echo "<h4><a href='logout.php'>Logout</a></h4>";
    }
    else{
        echo "<h4><a href='login.php'>Login</a></h4>";
        echo "<h4><a href='register.php'>Register</a></h4> ";
    }
?>
