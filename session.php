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