<?php include('security.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Abouts</h6>
        </div>
        <div class="card-body">
            <?php
                if(isset($_POST['about_edit']))
                {
                    $id = $_POST['about_edit_id'];

                    $conn = mysqli_connect("localhost", "amit", "test123", "admin");
                    $query = "SELECT * FROM abouts WHERE id=$id";
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
                            <label>Subtitle</label>
                            <input type="text" name="edit_subtitle" class="form-control" value="<?php echo $row['subtitle'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="edit_description" class="form-control" value="<?php echo $row['description'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="edit_link" class="form-control" value="<?php echo $row['link'] ?>">
                        </div>

                        <a href="aboutus.php" class="btn btn-danger">CANCEL</a>
                        <button type="submit" class="btn btn-success" name="about_update_btn">UPDATE</button>

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