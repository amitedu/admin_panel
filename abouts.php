<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container py-5">
    <div class="row py-3">

        <div class="col-md-8">
            <!-- Card -->
            <div class="card">

                <!-- Card image -->
                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap">

                <!-- Card content -->
                <div class="card-body">
                    <?php
                    
                    require 'admin/dbconfig.php';

                    $query = "SELECT * FROM abouts";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $row)
                        {
                            
                            // echo $row['subtitle'];
                            // echo $row['description'];
                            // echo $row['link'];

                            ?>
                            
                    <!-- Title -->
                    <h5 class="card-title"><a><?php echo $row['username']; ?></a></h5>
                    <!-- Subtitle -->
                    <h6 class="card-title"><a><?php echo $row['subtitle']; ?></a></h6>
                    <!-- Text -->
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    <!-- Button -->
                    <a href="<?php echo $row['link']; ?>" class="btn btn-primary">Button</a>
                    
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
            <!-- Card -->
        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-body">
                    <!-- Title -->
                    <h5 class="card-title"><a> Notice </a></h5>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Button -->
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <!-- Title -->
                    <h5 class="card-title"><a> Notice </a></h5>
                    <!-- Text -->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <!-- Button -->
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>