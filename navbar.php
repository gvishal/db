    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="index.php">DB PROJECT</a></li>
<?php
    if(array_key_exists("logged_in", $_SESSION)) {
        echo '<li role="presentation"><a href="#">Welcome ' .$_SESSION["user"] . '!</a></li>';
        if (array_key_exists("admin", $_SESSION)) {
            if ($_SESSION["admin"]) {
                echo '<li role="presentation"><a href="users/index.php">User Crud</a></li>';
            }
        }
        echo '<li role="presentation"><a href="home.php">Home Folder</a></li>';
        echo '<li role="presentation"><a href="account.php">Accounts Linked</a></li>';
        echo '<li role="presentation"><a href="app.php">Your Apps</a></li>';
        echo '<li role="presentation"><a href="device.php">Devices Open on</a></li>';
        echo '<li role="presentation"><a href="preference.php">Preferences</a></li>';
        echo '<li role="presentation"><a href="session.php">Sessions Active</a></li>';
        echo '<li role="presentation"><a href="subscription.php">Subscription</a></li>';
        echo '<li role="presentation"><a href="logout.php">Logout</a></li>';
    }
    else{
        echo '<li role="presentation"><a href="login.php">Login</a></li>';
        echo '<li role="presentation"><a href="register.php">Register</a></li>';
    }
?>
    </ul>