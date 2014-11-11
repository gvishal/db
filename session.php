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

    if ( !empty($_GET)) {
        $aid = 0;
        $action = NULL;

        if (!empty($_GET['id'])) {
            $aid = $_GET['id'];
        }
        if (!empty($_GET['action'])) {
            $action = $_GET['action'];
        }

        if($action == "delete") {
            if ($aid && $action) {
                // delete data
                $sql = "DELETE FROM SESSION WHERE id = $aid AND uid = $id";
                if (mysql_query($sql)) {
                    echo "Record deleted successfully";
                    header("Location: session.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysql_error($conn);
                }

            }
        }
    }
?>


    <div class="container">
        <div class="row">
            <h3>Sessions Active</h3>
        </div>
        <div class="row">
            <p>
                <a href="#" class="btn btn-success">Create</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>IP_Address</th>
                    <th>Browser</th>
                    <th>OS</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM SESSION WHERE uid = $id";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'. $row['ip_address'] . '</td>';
                    echo '<td>'. $row['browser'] . '</td>';
                    echo '<td>'. $row['os'] . '</td>';
                    echo '<td>'. $row['time'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn btn-danger" href="session.php?action=delete&id='.$row['id'].'">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->

<?php
include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>