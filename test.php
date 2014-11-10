<?php
include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>

<?php
    if (array_key_exists("logged_in", $_SESSION)) {
        $id = $_SESSION["id"];
    }else{
        header("Location: index.php");
    }
?>

<?php
    $result = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES
                                          WHERE TABLE_SCHEMA = 'db_project' AND TABLE_NAME = 'VERSION' ");
    $vid = mysql_fetch_array($result)["AUTO_INCREMENT"];
    echo $vid . "<br>";
    $hash = "asdasdas";
    $cid = 2;
    $location = "/images/" . $cid . "_" . $vid;
    echo $location;
    $size = 12;
?>

<?php
include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>