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
    $file_id = null;
    $file_name = null;
    if ( !empty($_GET['id'])) {
        $file_id = $_REQUEST['id'];
    }
    if ( !empty($_GET['name'])) {
        $file_name = $_REQUEST['name'];
    }

    if ( (null == $file_id) || (null == $file_name)) {
        header("Location: home.php");
    }

?>
    <div class="container">
        <div class="row">
            <h3><?php echo $file_name ?> versions</h3>
        </div>
        <div class="row">
            <p>
                <a href="create_version.php?target=<?php echo $file_id ?>" class="btn btn-primary">Add new version</a>
            </p>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Hash</th>
                    <th>Location</th>
                    <th>Size</th>
                    <th>Modified</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM VERSION WHERE fileid = '$file_id'";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)){
                    echo '<tr>';
//                    $href = '?id=' . $row['id'] . '&name=' . $row['name'];
//                    echo '<td>'. '<a href="file.php'.$href.'">' . $row['name'] . '</a>' . '</td>';
                    echo '<td>'. $row['hash'] . '</td>';
                    echo '<td>'. $row['location'] . '</td>';
                    echo '<td>'. $row['size'] . ' bytes</td>';
                    echo '<td>'. $row['date_modified'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn btn-danger" href="delete_version.php?id='.$row['id'].'">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
            <a class="btn" href="home.php">Back</a>
        </div>
    </div> <!-- /container -->

<?php
include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>