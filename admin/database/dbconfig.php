<link href="css/sb-admin-2.min.css" rel="stylesheet">


<?php

$host = "localhost";
$user = "amit";
$password = "test123";
$database = "admin";

$conn = mysqli_connect($host, $user, $password);
$dbconfig = mysqli_select_db($conn, $database);

if($dbconfig)
{
    // echo "Database connected";
}
else
{
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-6 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-warning">Database conncetion failed</h1>
                            <h2 class="card-title">Database failure</h2>
                            <p class="card-text">Please check the database failure</p>
                            <a href="#" class="btn btn-primary">:(</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}

?>