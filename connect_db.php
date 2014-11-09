<?php

    $username = "root";
    $password = "";
    $hostname = "localhost"; 

    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password)
      or die("Unable to connect to MySQL");

    // echo "Connected to MySQL<br>";

    $conn = mysql_select_db("db_project")
      or die("Could not select db_project");

    // echo "<br>Connected to db_project<br>";
?>