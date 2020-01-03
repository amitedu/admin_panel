<?php
session_start();
include('../admin/database/dbconfig.php');


if(isset($_POST['eshop_signup']))
{
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $cpass = htmlspecialchars($_POST['cpass']);

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO shopping_user(name, email, password, cpass) VALUES('$name', '$email', '$hashed', '$cpass')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header('Location: login.php');
    }
    else
    {
        echo 'Data not saved';
    }

}



// Eshopping Login

if(isset($_POST['eshop_login']))
{
    $eshop_logging_email = mysqli_real_escape_string($conn, $_POST['email']);

    $eshop_logging_password = mysqli_real_escape_string($conn, $_POST['password']);


    $query = "SELECT * FROM shopping_user WHERE email='$eshop_logging_email'";

    $query_run = mysqli_query($conn, $query);

    $result_array = mysqli_fetch_assoc($query_run);

    

    if(password_verify($eshop_logging_password, $result_array['password']))
    {
        $_SESSION['eshop_logged_in'] = 1;
        header('Location: index.php');
    }
    else
    {
        echo 'The username and password is incorrect';
    }
}


// Eshop Logout

if(isset($_POST['eshop_logout']))
{
    session_unset();
    session_destroy();
    header('Location: index.php');
}










?>