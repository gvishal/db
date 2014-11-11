<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/users/navbar.php";
?>
<?php
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $sql = "SELECT * FROM USER where id = '$id'";
        $result = mysql_query($sql);
        $data = mysql_fetch_array($result);
//        while ($row = mysql_fetch_array($result)){
//            echo '<tr>';
//            echo '<td>'. $row['name'] . '</td>';
//            echo '<td>'. $row['email'] . '</td>';
//            echo '<td>'. $row['hash_password'] . '</td>';
//            echo '<td>'. $row['photo'] . '</td>';
//            echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Read</a></td>';
//            echo '</tr>';
//        }
    }
?>
    <div class="container">

        <div class="span10 offset1">
            <div class="row">
                <h3>Read a User</h3>
            </div>

            <div class="form-horizontal" >
                <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['name'];?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email Address</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['email'];?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['hash_password'];?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Photo</label>
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['photo'];?>
                        </label>
                    </div>
                </div>
                <div class="form-actions">
                    <a class="btn" href="index.php">Back</a>
                </div>


            </div>
        </div>

    </div> <!-- /container -->


<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>