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
                $sql = "DELETE FROM DEVICE WHERE id = $aid AND uid = $id";
                if (mysql_query($sql)) {
                    echo "Record deleted successfully";
                    header("Location: device.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysql_error($conn);
                }

            }
        }
    }
?>

    <div class="container">
        <div class="row">
            <h3>Devices Open On</h3>
        </div>
        <div class="row">
            <p>
                <a href="#" class="btn btn-success">Create</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM DEVICE WHERE uid = $id";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'. $row['name'] . '</td>';
                    echo '<td>'. $row['type'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn btn-danger" href="device.php?action=delete&id='.$row['id'].'">Delete</a>';
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