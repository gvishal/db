<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>

<?php
    if (array_key_exists("logged_in", $_SESSION)) {
        $id = $_SESSION["id"];
        if(array_key_exists("target", $_GET))
            $target = $_GET['target'];
    }else{
        header("Location: index.php");
    }
?>

<?php

    if ( !empty($_POST)) {
        // keep track validation errors
        $hashError = null;
        $sizeError = null;

        // keep track post values
        $hash = $_POST['hash'];
        $size= $_POST['size'];
        $target = $_POST['target'];

        // validate input
        $valid = true;
        if (empty($hash)) {
            $hashError = 'Please enter hash';
            $valid = false;
        }
        if (empty($size)) {
            $sizeError = 'Please enter size';
            $valid = false;
        }
        if(empty($target))
            header("Location: index.php");

        // insert data
        if ($valid) {
            $result = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES
                                      WHERE TABLE_SCHEMA = 'db_project' AND TABLE_NAME = 'VERSION' ");
            $vid = mysql_fetch_array($result)["AUTO_INCREMENT"];
            $location = "files/" . $target . "_" . $vid;
            $sql = "INSERT INTO VERSION (fileid, hash, location, size, date_modified)
                      VALUES ('$target', '$hash', '$location', '$size', CURRENT_TIMESTAMP())";
            mysql_query($sql);
            echo "New record created successfully";
            header("Location: home.php");
        }

    }
?>

    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Add a version</h3>
            </div>

            <form class="form-horizontal" action="create_version.php" method="post">
                <input type="hidden" name="target" value="<?php echo $target; ?>">
                <div class="control-group <?php echo !empty($hashError)?'error':'';?>">
                    <label class="control-label">hash</label>
                    <div class="controls">
                        <input name="hash" type="text"  placeholder="hash" value="<?php echo !empty($hash)?$hash:'';?>">
                        <?php if (!empty($hashError)): ?>
                            <span class="help-inline"><?php echo $hashError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($sizeError)?'error':'';?>">
                    <label class="control-label">size</label>
                    <div class="controls">
                        <input name="size" type="text"  placeholder="size" value="<?php echo !empty($size)?$size:'';?>">
                        <?php if (!empty($sizeError)): ?>
                            <span class="help-inline"><?php echo $sizeError;?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn" href="home.php">Back</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

<?php
include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>