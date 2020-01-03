<?php include('security.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>
        <div class="card-body">
            <?php
                if(isset($_POST['reg_edit']))
                {
                    $id = $_POST['edit_id'];

                    $conn = mysqli_connect("localhost", "amit", "test123", "admin");
                    $query = "SELECT * FROM register2 WHERE id=$id";
                    $query_run = mysqli_query($conn, $query);
                    foreach($query_run as $row)
                    {
            ?>
                    <form action="code.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">

                        <div class="form-group">
                            <label>Username </label>
                            <input type="text" name="edit_username" class="form-control" value="<?php echo $row['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" class="form-control" value="<?php echo $row['email'] ?>" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="edit_password" class="form-control" placeholder="Enter Password" value="<?php echo $row['password'] ?>">
                        </div>
                        <div class="form-group">
                            <select name="edit_usertype" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <a href="register.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" class="btn btn-success" name="update_btn">UPDATE</button>

                    </form>
            <?php
                    }
                }

            ?>

            

        </div>
    </div>
</div>
</div>

<?php include('includes/scripts.php'); ?>
<?php include('includes/footer.php'); ?>