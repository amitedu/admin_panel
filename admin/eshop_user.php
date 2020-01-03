<?php 

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>


<div class="container">
    <div class="row">
        <div class="col text-center py-5 my-3">
            <h2 class="text-uppercase text-dark font-weight-bold">eshop user list</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM shopping_user";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                    ?>

                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
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
<?php 

include('includes/scripts.php');
include('includes/footer.php'); 

?>