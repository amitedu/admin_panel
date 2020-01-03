<?php
include('security.php');


if(isset($_POST['search_data']))
{
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE faculty2 SET visible='$visible' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

}



if(isset($_POST['deleteMultipleData']))
{
    $id = 1;

    $query = "DELETE FROM faculty2 WHERE visible='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Multiple Data Delete Succfully";
        header('Location: faculty.php');
    }
    else
    {
        $_SESSION['status'] = "Multiple Data can not Delete";
        header('Location: faculty.php');
        
    }
}



if(isset($_POST['save_faculty']))
{
    $name = $_POST['faculty_name'];
    $designation = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
    $images = $_FILES["faculty_image"]['name'];


    if(file_exists("upload/".$_FILES["faculty_image"]["name"]))
    {
        $_SESSION['status'] = "Image already exists . $images";
        header('Location: faculty.php');
    }
    else
    {
        $query = "INSERT INTO faculty2 (name, desig, descrip, images) VALUES ('$name', '$designation', '$description', '$images')";
        $query_run = mysqli_query($conn, $query);
        
        if($query_run)
        {
            move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/".$_FILES["faculty_image"]["name"]);
            $_SESSION['success'] = "Faculty added successfully";
            header('Location: faculty.php');
        }
        else
        {
            $_SESSION['status'] = "Faculty not added";
            header('Location: faculty.php');
        }
    }
}



if(isset($_POST['faculty_edit_btn']))
{
    $id = $_POST['faculty_edit_id'];
    $name = $_POST['faculty_edit_name'];
    $desig = $_POST['faculty_edit_desig'];
    $descrip = $_POST['faculty_edit_descrip'];
    $images = $_FILES["faculty_edit_file"]['name'];

    if(file_exists("upload/".$_FILES["faculty_edit_file"]["name"]))
    {
        $_SESSION['status'] = "Image already exists . $images";
        header('Location: faculty.php');
    }
    else
    {
        $query = "UPDATE faculty2 SET name='$name', desig='$desig', descrip='$descrip', images='$images' WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
            move_uploaded_file($_FILES["faculty_edit_file"]['tmp_name'], "upload/".$_FILES["faculty_edit_file"]["name"]);
            $_SESSION['success'] = "Faculty Edit Succfully";
            header('Location: faculty.php');      
        }
        else
        {
            $_SESSION['status'] = "Faculty edit unsccfully";
            header('Location: faculty.php');
        }
    }
}



if(isset($_POST['faculty_delete']))
{
    $id = $_POST['faculty_delete_id'];

    $query = "DELETE FROM faculty2 WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Record deleted Successfully";
        header('Location: faculty.php');
    }
    else
    {
        $_SESSION['status'] = "Record can not be deleted";
        header('Location: faculty.php');

    }
}



if(isset($_POST['registration']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO register2 (username, email, password, usertype) VALUES ('$username', '$email', '$password', '$usertype')";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['succses'] = "Added Succsesful";
            header('Location:register.php');
        }
        else
        {
            $_SESSION['status'] = "Added Unsuccsesful";
            header('Location:register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Password and Confirm password do not match";
        header('Location:register.php');
    }

    
}



if(isset($_POST['update_btn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['edit_usertype'];

    $query = "UPDATE register2 SET username = '$username', email = '$email', password = '$password', usertype = '$usertype' WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        $_SESSION['success'] = "Record updated successfully";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Record can not updated";
        header('Location: register.php');
    }
}



if(isset($_POST['reg_delete']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM register2 WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Record deleted successfully";
        header('Location:register.php');
    }
    else
    {
        $_SESSION['status'] = "Record can not be deleted";
        header('Location:register.php');
    }
}



if(isset($_POST['login_btn']))
{
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    $query = "SELECT * FROM register2 WHERE email='$login_email' AND password='$login_password'";
    $query_run = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_array($query_run);

    if($user_data['usertype'] == 'admin')
    {
        $_SESSION['username'] = $login_email;
        header('Location: index.php');
    }
    elseif($user_data['usertype'] == 'user')
    {
        //$_SESSION['username'] = $login_email;
        header('Location: ../blog.php');
    }
    else
    {
        $_SESSION['status'] = "Email and Password do not match";
        header('Location: login.php');
    }
}



if(isset($_POST['about_save']))
{
    $username = $_POST['username'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $query = "INSERT INTO abouts (username, subtitle, description, link) VALUES ('$username', '$subtitle', '$description', '$link')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        // $_SESSION['success'] = "Data saved successfully";
        echo "Data saved successfully";
        header('Location: aboutus.php');
    }
    else
    {
        echo "Data not saved";
        // $_SESSION['status'] = "Data not saved";
        header('Location: aboutus.php');

    }
}


if(isset($_POST['about_update_btn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $link = $_POST['edit_link'];

    $query = "UPDATE abouts SET username = '$username', subtitle = '$subtitle', description = '$description', link = '$link' WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['success'] = "Record updated successfully";
        header('Location: aboutus.php');
    }
    else
    {
        $_SESSION['status'] = "Record can not updated";
        header('Location: aboutus.php');
    }
}


if(isset($_POST['about_delete']))
{
    $id = $_POST['about_delete_id'];

    $query = "DELETE FROM abouts WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Record deleted successfully";
        header('Location: aboutus.php');
    }
    else
    {
        $_SESSION['status'] = "Record can not be deleted";
        header('Location: aboutus.php');
    }
}



if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}



// Shopping site Information

// Add Product function

function add_product($product, $file, $conn)
{

    $price = $product['price'];
    $discount = $product['discount'];
    $description = $product['description'];
    $section = $product['section'];


    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];


    $allowed = array('jpg', 'jpeg', 'png');

    $fileExt = explode('.', $fileName);

    $actualFileExt = strtolower(end($fileExt));

    if(in_array($actualFileExt, $allowed))
    {
        if($fileError === 0)
        {
            if($fileSize < 1000000)
            {
                $destination = "../eshopper/images/add_product/" . $section . "/" . $fileName;
                
                move_uploaded_file($fileTmp, $destination);
                
                $query = "INSERT INTO shopping_product (price, discount, description, images, section) VALUES ('$price', '$discount', '$description', '$destination', '$section')";
    
                $query_run = mysqli_query($conn, $query);

                if($query_run)
                {
                    return true;   //change this line for unlink a file from a folder
                }
                else
                {
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
            else
            {
                echo 'need less size';
            }
        }
        else
        {
            echo 'There is a problem in your file loading';
        }
    }
    else
    {
        echo 'Only .jpg, .jpeg or .png file type permitted.';
    }
}




if(isset($_POST['add_product_submit']))
{
    $price = mysqli_real_escape_string($conn, $_POST['add_product_price']);
    $discount = mysqli_real_escape_string($conn, $_POST['add_product_discount']);
    $description = mysqli_real_escape_string($conn, $_POST['add_product_description']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);

    $product = array('price' => $price, 'discount' => $discount, 'description' => $description, 'section' => $section);

    $file = $_FILES['add_product_image'];

    if(add_product($product, $file, $conn))
    {
        header('Location: add_product.php?addSuccess');
    }

}


// Delete List Product

if(isset($_POST['delete_list_product']))
{
    $id = $_POST['id'];

    $get_image_query = "SELECT images FROM shopping_product WHERE id = '$id'";
    $get_image_query_run = mysqli_query($conn, $get_image_query);

    if($get_image_query_run)
    {
        $image_path = mysqli_fetch_assoc($get_image_query_run);
        // echo $image_path['images'];
        if(!unlink($image_path['images']))
        {
            echo 'Error: Image can not be deleted from local directory';
        }
        else
        {
            $delete_query = "DELETE FROM shopping_product WHERE id = '$id'";
            $query_run = mysqli_query($conn, $delete_query);

            if($query_run)
            {
                header('Location: list_product.php?deleteSuccess');
            }
            else
            {
                echo "Delete Error: Item can not be deleted from database";
            }
        }
    }

}


// Edit List Product

if(isset($_POST['edit_product_submit']))
{
    $id = mysqli_real_escape_string($conn, $_POST['edit_id']);
    $section = mysqli_real_escape_string($conn, $_POST['edit_section']);
    $price = mysqli_real_escape_string($conn, $_POST['edit_product_price']);
    $discount = mysqli_real_escape_string($conn, $_POST['edit_product_discount']);
    $description = mysqli_real_escape_string($conn, $_POST['edit_product_description']);
    $old_image = mysqli_real_escape_string($conn, $_POST['existing_product_image']);
    
    $file = $_FILES['edit_product_image'];

    // print_r($file);

    // $product = array('price' => $price, 'discount' => $discount, 'description' => $description, 'section' => $section);

    
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmp = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    

    if(empty($file['name']))    // if file is not changed then update other info without file
    {
        $query = "UPDATE shopping_product SET price = '$price', discount = '$discount', description = '$description', section = '$section' WHERE id = '$id' ";
        
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            header('Location: list_product.php?editSuccessWithoutImage');
        }
        else
        {
            echo 'Error updating data without image';
        }

    }
    else // if file is changed then saved new file & delete old one
    {
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];


        $allowed = array('jpg', 'jpeg', 'png');

        $fileExt = explode('.', $fileName);

        $actualFileExt = strtolower(end($fileExt));

        if(in_array($actualFileExt, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 1000000)
                {
                    $destination = "../eshopper/images/add_product/" . $section . "/" . $fileName;
                    
                    move_uploaded_file($fileTmp, $destination);
                    
                    $query = "UPDATE shopping_product SET price = '$price', discount = '$discount', description = '$description', images = '$destination', section = '$section' WHERE id = '$id' ";
        
                    $query_run = mysqli_query($conn, $query);

                    if($query_run)
                    {
                        if(!unlink($old_image))
                        {
                            echo 'Error: file can not be deleted';
                        }
                        else
                        {
                            header('Location: list_product.php?editSuccess');
                        }
                    }
                    else
                    {
                        echo 'query error: ' . mysqli_error($conn);
                    }
                }
                else
                {
                    echo 'need less size';
                }
            }
            else
            {
                echo 'There is a problem in your file loading';
            }
        }
        else
        {
            echo 'Only .jpg, .jpeg or .png file type permitted.';
        }
    }

    
}




























?>