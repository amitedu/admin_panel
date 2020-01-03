<?php 

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>



<div class="container my-5 ">
    <div class="row">
        <div class="col-md-8 border border-primary mx-auto">
            <div class="row bg-dark">
                <div class="col-md-8 text-center mx-auto p-3">
                    <h2 class="text-uppercase text-white my-auto font-weight-bold">Add User Form</h2>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-md-8 mx-auto">
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Section</label>
                            <select name="section" class="form-control">
                                <!-- <option value="" selected>Choose...</option> -->
                                <option value="features_items">Features Items</option>
                                <option value="category_items">Category Items</option>
                                <option value="recomend_items">Recomend Items</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="add_product_price" class="form-control"  placeholder="Enter Price">
                        </div>

                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" name="add_product_discount" class="form-control" placeholder="Discount">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="add_product_description" class="form-control" placeholder="Small Description...">
                        </div>

                        <div class="form-group mb-4">
                            <label>Picture of Product</label>
                            <input type="file" name="add_product_image" class="form-control-file">
                        </div>

                        <div class="text-center">
                            <a href="index.php" class="btn btn-danger mr-5">Cancel</a>
                            <button type="submit" name="add_product_submit" class="btn btn-primary ml-5">Submit</button>
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