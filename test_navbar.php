<?php
include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
?>

    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#" data-toggle="tab">Dropbox</a></li>
        <li role="presentation"><a href="#" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#" data-toggle="tab">Messages</a></li>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li role="presentation"><a href="#" data-toggle="tab">Home</a></li>
            </ul>
        </li>
    </ul>

<?php
include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";

?>