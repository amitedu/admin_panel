<?php 

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container">
    <div class="row">
        <div class="col text-center my-5 mx-auto">
            <h2 class="title text-capitalize font-weight-bold">list of product</h2>
        </div>
    </div>
    <div class="row">
        <div class="col mb-5">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Section</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $query = "SELECT * FROM shopping_product";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        $count = 1;
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                    ?>

                    <tr>
                        <td class="align-middle"><?= $count; ?></td>
                        <td class="align-middle"><?= $row['price']; ?></td>
                        <td class="align-middle"><?= $row['discount']; ?></td>
                        <td class="align-middle"><?= $row['description']; ?></td>
                        <td class="align-middle"><img src="<?= $row['images']; ?>" height="70px" width="70px" class="img-fluid"></td>
                        <td class="align-middle"><?= $row['section']; ?></td>
                        <td class="align-middle">
                            <form action="edit_product.php" method="POST">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <button type="submit" name="edit_list_product" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td class="align-middle">
                            <form action="code.php" method="POST">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <button type="submit" name="delete_list_product" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <?php
                    $count++;
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>














</div>
<?php 

include('includes/scripts.php');
include('includes/footer.php'); 

?>