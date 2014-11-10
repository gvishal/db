<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>
    ?>

<?php
    $id = 0;

    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];

        // delete data
        $sql = "DELETE FROM VERSION WHERE id = $id";
        if(mysql_query($sql)){
            echo "Record deleted successfully";
            header("Location: home.php");
        }
        else{
            echo "Error: " . $sql . "<br>". mysql_error($conn);
        }

    }
?>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Delete Version</h3>
            </div>

            <form class="form-horizontal" action="delete_version.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
                <p class="alert alert-error">Are you sure to delete ?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Yes</button>
                    <a class="btn" href="home.php">No</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>