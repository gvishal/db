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
            <h3>Subscription</h3>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Space</th>
                    <th>Started At</th>
                    <th>Ends At</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM SUBSCRIPTION WHERE uid = $id";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'. $row['type'] . '</td>';
                    echo '<td>'. $row['space'] . 'bytes' . '</td>';
                    echo '<td>'. $row['started_at'] . '</td>';
                    echo '<td>'. $row['duration'] . '</td>';
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
