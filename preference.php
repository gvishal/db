<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(array_key_exists("id", $_POST))
            $id = $_POST["id"];
        else
            header("Location: login.php");

        if(array_key_exists("alerts", $_POST))
            $alerts = $_POST["alerts"];
        else
            $alerts = 0;
        if(array_key_exists("newsletter", $_POST))
            $newsletter = $_POST["newsletter"];
        else
            $newsletter = 0;

        $sql = "SELECT * FROM PREFERENCE WHERE uid = $id";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);

        if ($row) {//Preferences exist update them
            $sql = "UPDATE PREFERENCE set alerts = $alerts, newsletter = $newsletter WHERE uid = $id";
            if (mysql_query($sql)) {
                echo "Updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysql_error();
            }
        } else {//Preference do not exist add them
            $sql = "INSERT INTO PREFERENCE (uid, alerts, newsletter)
                                VALUES ($id, $alerts, $newsletter)";
            if (mysql_query($sql)) {
                echo "Updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysql_error();
            }
        }
    }
    else {
        if (array_key_exists("logged_in", $_SESSION)) {
            $id = $_SESSION["id"];
            $sql = "SELECT * FROM PREFERENCE WHERE uid = $id";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
            if ($row) {
                $alerts = $row["alerts"];
                $newsletter = $row["newsletter"];
            } else {
                echo "No preferences available";
            }
        } else {
            header("Location: index.php");
        }
    }
?>
    <div class="container">
        <div class="span10 offset1">
            <form class="form-horizontal" action="preference.php" method="post">
                <input type="hidden" name="id" value="<?php echo !empty($id)?$id:'';?>" >
                <input type="checkbox" name="alerts" value="1" <?php echo !empty($alerts)?"checked":'';?> >Alerts<br>
                <input type="checkbox" name="newsletter" value="1" <?php echo !empty($newsletter)?"checked":'';?> >Newsletter<br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>