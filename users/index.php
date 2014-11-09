<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/connect_db.php";
    include $_SERVER['DOCUMENT_ROOT']."/project/header.php";
?>
    <h2><a href="../index.php">Welcome to Dropbox</a></h2>
    <h2><a href='index.php'>User Crud</a></h2>
    <div class="container">
        <div class="row">
            <h3>USER CRUD</h3>
        </div>
        <div class="row">
            <p>
                <a href="create.php" class="btn btn-success">Create</a>
            </p>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Password</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = 'SELECT * FROM USER ORDER BY id DESC';
                $result = mysql_query($sql);
                while ($row = mysql_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'. $row['name'] . '</td>';
                    echo '<td>'. $row['email'] . '</td>';
                    echo '<td>'. $row['hash_password'] . '</td>';
                    echo '<td>'. $row['photo'] . '</td>';
                    echo '<td width=250>';
                    echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                    echo ' ';
                    echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div> <!-- /container -->
<?php
    include $_SERVER['DOCUMENT_ROOT']."/project/footer.php";
?>