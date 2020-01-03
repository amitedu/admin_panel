<?php include('security.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<!-- Modal -->
<div class="modal fade" id="ABOUTUSMODAL" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="code.php" method="POST">

            <div class="modal-body">
                <div class="form-group">
                    <label>Title </label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label>Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" placeholder="Enter Sub Title">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" placeholder="Enter Description"></textarea>
                </div>
                <div class="form-group">
                    <label>Links</label>
                    <input type="text" name="link" class="form-control" placeholder="Enter Links">
                </div>
                <input type="hidden" value="admin" name="usertype">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="about_save" class="btn btn-primary">Save</button>
            </div>

        </form>
      </div>

    </div>
  </div>
</div>

<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Admin Profile
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ABOUTUSMODAL">
            Add
            </button>
        </h6>
    </div>
    <div class="card-body">
        <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
                echo '<h2>' . $_SESSION['success'] . '</h2>';
                unset($_SESSION['success']);
            }
            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
                echo '<h2>' . $_SESSION['status'] . '</h2>';
                unset($_SESSION['status']);
            }
        ?>
        <div class="table-responsive">
        <?php

            $conn = mysqli_connect("localhost", "amit", "test123", "admin");
            $query = "SELECT * FROM abouts";
            $query_run = mysqli_query($conn, $query);
        
        ?>
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Subtitle</th>
                        <th>Description</th>
                        <th>Links</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {

                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['subtitle']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['link']; ?></td>
                        <td>
                            <form action="about_edit.php" method="POST">
                                <input type="hidden" name="about_edit_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="about_edit"  class="btn btn-success">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="about_delete_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="about_delete" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                    
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>


<?php include('includes/scripts.php'); ?>
<?php include('includes/footer.php'); ?>