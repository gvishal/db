<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>
<?php
    if (array_key_exists("logged_in", $_SESSION)) {
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM SUBSCRIPTION WHERE uid = $id";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        if ($row) {
            $started_at = $row["started_at"];
            $space = $row["space"];
            $type = $row["type"];
            $duration = $row["duration"];
        } else {
            echo "No subscription available";
        }
    } else {
        header("Location: index.php");
    }
?>
    <div class="container">
        <h4>Started_at : <?php echo $started_at ?></h4>
        <h4>Space : <?php echo $space ?> bytes</h4>
        <h4>Account Type: <?php echo $type ?></h4>
        <h4>Ends at: <?php echo $duration ?></h4>
    </div>


<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>