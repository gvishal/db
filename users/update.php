<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
?>
<?php
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $passwordError = null;

        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $photo = NULL;
        $hash_password = $password;

        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }

        if (empty($password)) {
            $passwordError = 'Please enter Password';
            $valid = false;
        }

        // update data
        if ($valid) {
            $sql = "UPDATE USER  set name = '$name', email = '$email', hash_password = '$hash_password' WHERE id = $id";
            if (mysql_query($sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysql_error($conn);
            }
            header("Location: index.php");
        }
    } else {
        $sql = "SELECT * FROM USER where id = '$id'";
        $result = mysql_query($sql);
        $data = mysql_fetch_array($result);
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['hash_password'];
    }
?>

    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Update a User</h3>
            </div>

            <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                        <?php if (!empty($nameError)): ?>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input name="email" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError;?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <input name="password" type="text"  placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
                        <?php if (!empty($passwordError)): ?>
                            <span class="help-inline"><?php echo $passwordError;?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>