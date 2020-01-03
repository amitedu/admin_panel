<?php 

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<?php

if(isset($_POST['edit_list_product']))
{
    $id = $_POST['id'];
    
    $query = "SELECT * FROM shopping_product WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $row = mysqli_fetch_assoc($query_run);
    }
}

?>

<div class="container my-5 ">
    <div class="row">
        <div class="col-md-8 border border-primary mx-auto">
            <div class="row bg-dark">
                <div class="col-md-8 text-center mx-auto p-3">
                    <h2 class="text-uppercase text-white my-auto font-weight-bold">Edit User Form</h2>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-8 mx-auto">
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Section</label>
                            <select name="edit_section" class="form-control">
                                <!-- <option value="" selected>Choose...</option> -->
                                <option value="features_items" <?php if($row['section'] == 'features_items') { echo 'selected'; } ?>>
                                    Features Items
                                </option>
                                <option value="category_items" <?php if($row['section'] == 'category_items') { echo 'selected'; } ?>>
                                    Category Items
                                </option>
                                <option value="recomend_items" <?php if($row['section'] == 'recomend_items') { echo 'selected'; } ?>>
                                    Recomend Items
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="edit_product_price" class="form-control" value="<?= $row['price']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" name="edit_product_discount" class="form-control" value="<?= $row['discount']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="edit_product_description" class="form-control" value="<?= $row['description']; ?>">
                        </div>

                        <div class="form-group mb-4">
                            <label>Picture of Product</label>
                            <div>
                                <img src="<?= $row['images']; ?>" class="img-fluid" height="120px" width="120px">
                            </div>
                            <input type="hidden" name="existing_product_image" class="form-control" value="<?= $row['images']; ?>">
                            <input type="file" name="edit_product_image" class="form-control-file my-1">
                        </div>
                        
                        <input type="hidden" class="form-control" name="edit_id" value="<?= $id; ?>">
                        <div class="text-center">
                            <a href="list_product.php" class="btn btn-danger mr-5">Cancel</a>
                            <button type="submit" name="edit_product_submit" class="btn btn-primary ml-5">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>





























</div>
<?php 

include('includes/scripts.php');
include('includes/footer.php'); 

?>