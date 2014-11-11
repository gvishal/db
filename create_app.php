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
        $nameError = null;

        // keep track post values
        $name = $_POST['name'];

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter name';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $sql = "INSERT INTO APP (uid, name)
                          VALUES ('$id', '$name')";
            if(mysql_query($sql)) {
                echo "New record created successfully";
                header("Location: app.php");
            }
        }

    }
?>

    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Add an app</h3>
            </div>

            <form class="form-horizontal" action="create_app.php" method="post">
                <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input name="name" type="text"  placeholder="name" value="<?php echo !empty($name)?$name:'';?>">
                        <?php if (!empty($nameError)): ?>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn" href="app.php">Back</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

<?php
include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>