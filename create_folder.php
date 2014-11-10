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

    if ( !empty($_POST)) {
        // keep track validation errors
        $folderError = null;

        $folder = $_POST['folder'];
        // validate input
        $valid = true;
        if (empty($folder)) {
            $folderError = 'Please enter folder name';
            $valid = false;
        }
        // insert data
        if ($valid) {
            $sql = "INSERT INTO CONTENT (type, name)
                    VALUES ('folder', '$folder' )";
            if (mysql_query($sql)) {
                $result = mysql_query("SELECT * FROM CONTENT WHERE name = '$folder'");
                $row = mysql_fetch_array($result);
                if($row) {
                    $cid = $row["id"];
                    mysql_query("INSERT INTO HOMEFOLDER (uid, cid)
                                  VALUES ('$id', '$cid') " );
                    mysql_query("INSERT INTO FOLDER (id, cid)
                                  VALUES ('$cid', NULL) " );
                    echo "New record created successfully";
                    }
                header("Location: home.php");
            } else {
                $folderError =  'Folder exists.';
            }
        }
    }
?>

    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Create a Folder</h3>
            </div>

            <form class="form-horizontal" action="create_folder.php" method="post">
                <div class="control-group <?php echo !empty($folderError)?'error':'';?>">
                    <label class="control-label">folder</label>
                    <div class="controls">
                        <input name="folder" type="text"  placeholder="folder" value="<?php echo !empty($folder)?$folder:'';?>">
                        <?php if (!empty($folderError)): ?>
                            <span class="help-inline"><?php echo $folderError;?></span>
                        <?php endif; ?>
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