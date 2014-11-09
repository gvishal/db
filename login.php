<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/navbar.php";
?>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $emailError = null;
        $passwordError = null;

        $email = $_POST["email"];
        $password = $_POST["password"];
        $hash_password = $password;

        // validate input
        $valid = true;
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

        if($valid){
            $sql = "SELECT * FROM USER WHERE email = '$email' AND hash_password = '$hash_password'";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);
            if ($row) {
                echo "Logged in successfully";
                $_SESSION["user"] = $row["name"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["email"] = $email;
                $_SESSION["id"] = $row["id"];
                $_SESSION["admin"] = $row["admin"];
                $_SESSION["logged_in"] = 1;
                header("Location: index.php");
            }
            else{
                $emailError =  "Invalid details";
                $passwordError = " ";
            }
        }
    }
?>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Login</h3>
            </div>

            <form class="form-horizontal" action="login.php" method="post">
                <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input name="email" type="text"  placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError;?></span>
                        <?php endif; ?>
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
                    <button type="submit" class="btn btn-success">Login</button>
                    <a class="btn" href="index.php">Back</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>