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
    <div class="container">
        <div class="row">
            <h3>Home Folder</h3>
        </div>
        <div class="row">
            <p>
                <a href="create_folder.php?target=home" class="btn btn-success">Create Folder</a>
                <a href="create_file.php?target=home" class="btn btn-primary">Create File</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Kind</th>
                    <th>Modified</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT b.id, b.type, b.name, b.last_modified FROM HOMEFOLDER a, CONTENT b WHERE a.cid = b.id AND a.uid = $id;";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)){
                    echo '<tr>';
                    $href = '?id=' . $row['id'] . '&name=' . $row['name'];
                    if($row["type"] == 'folder')
                        echo '<td>'. '<a href="folder.php'.$href.'">' . $row['name'] . '</a>' . '</td>';
                    else
                        echo '<td>'. '<a href="file.php'.$href.'">' . $row['name'] . '</a>' . '</td>';
                    echo '<td>'. $row['type'] . '</td>';
                    echo '<td>'. $row['last_modified'] . '</td>';
                    echo '<td width=250>';
                    if($row["type"] == 'folder')
                        echo '<a class="btn btn-danger" href="delete_folder.php?id='.$row['id'].'">Delete</a>';
                    else
                        echo '<a class="btn btn-danger" href="delete_file.php?id='.$row['id'].'">Delete</a>';
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