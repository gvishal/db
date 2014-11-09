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
            <h3>Apps Linked</h3>
        </div>
        <div class="row">
            <p>
                <a href="#" class="btn btn-success">Create</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Date_added</th>
                    <th>Last_access</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM APP WHERE uid = $id";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'. $row['name'] . '</td>';
                    echo '<td>'. $row['date_added'] . '</td>';
                    echo '<td>'. $row['last_access'] . '</td>';
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