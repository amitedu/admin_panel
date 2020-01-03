<?php include('security.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Faculty Edit</h6>
        </div>
        <div class="card-body">

        <?php

        if(isset($_POST['faculty_edit']))
        {
            $id = $_POST['faculty_edit_id'];

            $query = "SELECT * FROM faculty2 where id='$id'";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>
            <form action="code.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="faculty_edit_id" value="<?php echo $row['id']; ?>">

                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="faculty_edit_name" class="form-control" value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="faculty_edit_desig" class="form-control" value="<?php echo $row['desig']; ?>">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="faculty_edit_descrip" class="form-control" value="<?php echo $row['descrip']; ?>">
                </div>
                <div class="form-group">
                    <label>Edit Image</label>
                    <input type="file" id="file"  name="faculty_edit_file" class="form-control" value="">
                </div>

                <a href="faculty.php" class="btn btn-danger">CANCEL</a>
                <button type="submit" class="btn btn-success" name="faculty_edit_btn">UPDATE</button>

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