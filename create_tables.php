<?php

    $username = "root";
    $password = "";
    $hostname = "localhost"; 

    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password)
      or die("Unable to connect to MySQL");

    echo "Connected to MySQL<br>";

    $selected = mysql_select_db("db_project");

    if(!$selected){
        echo "Creating database!<br>";
        $sql = 'CREATE DATABASE db_project';

        if (mysql_query($sql))
            echo "Database db_project created successfully\n";
        else
            echo 'Error creating database: ' . mysql_error() . "\n";

        $selected = mysql_select_db("db_project")
          or die("Could not select examples");

        echo "<br>Connected to db_project<br>";
    }
    else
        echo "Database exists and connected<br>";
?>