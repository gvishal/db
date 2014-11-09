<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>
<?php

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

    // insert data
    if ($valid) {
        $sql = "INSERT INTO USER (name, email, hash_password, photo)
                VALUES ('$name', '$email', '$hash_password', '$photo')";
        if (mysql_query($sql)) {
            echo "New record created successfully";
            $sql = "SELECT * FROM USER WHERE email = '$email'";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
            if ($row) {
                $id = $row["id"];

                mysql_query("INSERT INTO ACCOUNT (uid, provider, auth_token)
                              VALUES ('$id', 'facebook', 'dasdad32423asd')");
                mysql_query("INSERT INTO APP (uid, name, date_added, last_access)
                              VALUES ('$id', 'mycloud', NOW(), NOW())");
                mysql_query("INSERT INTO DEVICE (uid, type, name)
                              VALUES ('$id', 'mobile', 'iOS')");
                mysql_query("INSERT INTO PREFERENCE (uid, alerts, newsletter)
                                VALUES ($id, '1', '1')");
                mysql_query("INSERT INTO SESSION (uid, time, ip_address, browser, os)
                                VALUES ('$id', CURRENT_TIME(), '192.168.1.1', 'chrome', 'linux' )");
                mysql_query("INSERT INTO SUBSCRIPTION (uid, started_at, space, type, duration)
                        VALUES ('$id', CURRENT_DATE(), '10000000', 'free', DATE('2014-12-11')) ");
            }
            header("Location: index.php");
        } else {
            $emailError =  'Email exists.Try with a different email.';
        }
    }
}
?>

    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Create a User</h3>
            </div>

            <form class="form-horizontal" action="register.php" method="post">
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
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->


<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>