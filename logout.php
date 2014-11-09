<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>

<?php
    if(array_key_exists("logged_in", $_SESSION)){
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    else{
        header("Location: index.php");
    }
?>

<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>