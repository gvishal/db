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
        $providerError = null;
        $auth_tokenError = null;

        // keep track post values
        $provider = $_POST['provider'];
        $auth_token= $_POST['auth_token'];

        // validate input
        $valid = true;
        if (empty($provider)) {
            $providerError = 'Please enter provider';
            $valid = false;
        }
        if (empty($auth_token)) {
            $auth_tokenError = 'Please enter auth_token';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $sql = "INSERT INTO ACCOUNT (uid, provider, auth_token)
                      VALUES ('$id', '$provider', '$auth_token')";
            if(mysql_query($sql)) {
                echo "New record created successfully";
                header("Location: account.php");
            }
        }

    }
?>

    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Add an account</h3>
            </div>

            <form class="form-horizontal" action="create_account.php" method="post">
                <div class="control-group <?php echo !empty($providerError)?'error':'';?>">
                    <label class="control-label">Provider</label>
                    <div class="controls">
                        <input name="provider" type="text"  placeholder="Provider" value="<?php echo !empty($provider)?$provider:'';?>">
                        <?php if (!empty($providerError)): ?>
                            <span class="help-inline"><?php echo $providerError;?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="control-group <?php echo !empty($auth_tokenError)?'error':'';?>">
                    <label class="control-label">Authentication Token</label>
                    <div class="controls">
                        <input name="auth_token" type="text"  placeholder="Authentication Token" value="<?php echo !empty($auth_token)?$auth_token:'';?>">
                        <?php if (!empty($auth_tokenError)): ?>
                            <span class="help-inline"><?php echo $auth_tokenError;?></span>
                        <?php endif;?>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn" href="account.php">Back</a>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

<?php
include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>