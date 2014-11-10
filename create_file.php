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
    $fileError = null;

    $file = $_POST['file'];
    // validate input
    $valid = true;
    if (empty($file)) {
        $fileError = 'Please enter file name';
        $valid = false;
    }
    // insert data
    if ($valid) {
        $sql = "INSERT INTO CONTENT (type, name)
                    VALUES ('file', '$file' )";
        if (mysql_query($sql)) {
            $result = mysql_query("SELECT * FROM CONTENT WHERE name = '$file'");
            $row = mysql_fetch_array($result);
            if($row) {
                $cid = $row["id"];
                mysql_query("INSERT INTO HOMEFOLDER (uid, cid)
                                  VALUES ('$id', '$cid') " );
                mysql_query("INSERT INTO FILE (id)
                                  VALUES ('$cid') " );
                echo "New record created successfully";
            }
                header("Location: home.php");
        } else {
            $fileError =  'file exists.';
        }
    }
}
?>

    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Create a file</h3>
            </div>

            <form class="form-horizontal" action="create_file.php" method="post">
                <div class="control-group <?php echo !empty($fileError)?'error':'';?>">
                    <label class="control-label">file</label>
                    <div class="controls">
                        <input name="file" type="text"  placeholder="file" value="<?php echo !empty($file)?$file:'';?>">
                        <?php if (!empty($fileError)): ?>
                            <span class="help-inline"><?php echo $fileError;?></span>
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