<?php
include('authentication.php');

if(isset($_POST['post_delete_btn']))
{
    $post_id = $_POST['post_delete_btn'];

    $check_img_query = "SELECT * FROM post WHERE id='$post_id' LIMIT 1";
    $img_res = mysqli_query($con, $check_img_query);
    $res_data = mysqli_fetch_array($img_res);
    $image = $res_data['image'];

    $query = "DELETE FROM post WHERE id='$post_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        if(file_exists('../uploads/posts/'.$image)){
            unlink("../uploads/posts/".$image);
        }
    
        $_SESSION['message'] = "Post Deleted Sucessfully";
        header('Location: post-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: post-view.php');
        exit(0);
    }
}

if(isset($_POST['post_update']))
{
    $post_id = $_POST['post_update'];

    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Remove all Special Character
    $final_string = preg_replace('/-+/','-', $string);
    $slug = $final_string;
    
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description']; 
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    //Rename this image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $query = "UPDATE post SET category_id='$category_id',name='$name', slug='$slug', description='$description',image='$update_filename', 
            meta_title='$meta_title',meta_description='$meta_description', meta_keyword='$meta_keyword',
            status='$status' WHERE id='$post_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
       
        $_SESSION['message'] = "Post Updated Sucessfully";
        header('Location: post-edit.php?id='.$post_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: post-edit.php?id='.$post_id);
        exit(0);
    }

}


if(isset($_POST['post_add']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Remove all Special Character
    $final_string = preg_replace('/-+/','-', $string);
    $slug = $final_string;
    
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description']; 
    $meta_description = mysqli_real_escape_string($con,$meta_description);
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    //Rename this image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $status = $_POST['status'] == true ? '1':'0'; 
    
    $query = "INSERT INTO post (category_id,name,slug,description,image,meta_title,meta_description,meta_keyword,status) VALUES 
            ('$category_id','$name','$slug','$description','$filename','$meta_title','$meta_description','$meta_keyword','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        $_SESSION['message'] = "Post Created Sucessfully";
        header('Location: post-add.php');
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Something Went Wrong!";
        $_SESSION['message'] = mysqli_error($con);
        header('Location: post-add.php');
        exit(0);
    }
}

if(isset($_POST['category_update']))
{
    if($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "../uploads/images/";
        $fileName = intval(microtime(true) * 1000) . "." . pathinfo($_FILES["image"]["name"])["extension"];
        $targetPath = $targetDir . $fileName;
        move_uploaded_file($_FILES["image"]["tmp_name"],$targetPath);
        
        $name = $_POST['name'];
        
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Remove all Special Character
        $final_string = preg_replace('/-+/','-', $string);
        $slug = $final_string;
        
        $description = $_POST['description'];
    
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description']; 
        $meta_keyword = $_POST['meta_keyword'];
    
        $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
        $status = $_POST['status'] == true ? '1':'0';
    
        $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title',
        meta_description='$meta_description', meta_keyword='$meta_keyword', navbar_status='$navbar_status',
        status='$status', image='$fileName' WHERE category_id='$category_id' ";
    
        $query_run = mysqli_query($con,$query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Category Updated Sucessfully";
            header('Location: category-edit.php');
            exit(0);
        }
        else
        {
            // $_SESSION['message'] = "Something Went Wrong!";
            $_SESSION['message'] = mysqli_error($con);
            header('Location: category-edit.php');
            exit(0);
        }
    }
}

if(isset($_POST['category_add'])) 
{
    if($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "../uploads/images/";
        $fileName = intval(microtime(true) * 1000) . "." . pathinfo($_FILES["image"]["name"])["extension"];
        $targetPath = $targetDir . $fileName;
        move_uploaded_file($_FILES["image"]["tmp_name"],$targetPath);
        
        $name = $_POST['name'];
        
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']); //Remove all Special Character
        $final_string = preg_replace('/-+/','-', $string);
        $slug = $final_string;
        
        $description = $_POST['description'];
    
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description']; 
        $meta_keyword = $_POST['meta_keyword'];
    
        $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
        $status = $_POST['status'] == true ? '1':'0';
    
        $query = "INSERT INTO categories(name,slug,description,meta_title,meta_description,meta_keyword,navbar_status,status, image) VALUES
                ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status','$fileName')";
    
        $query_run = mysqli_query($con,$query);
    
        if($query_run)
        {
            $_SESSION['message'] = "Category Added Sucessfully";
            header('Location: category-add.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Something Went Wrong!";
            header('Location: category-add.php');
            exit(0);
        }
    }
}

if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM user WHERE id='$user_id' ";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Deleted Sucessfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: view-register.php');
        exit(0);
    }
}

if(isset($_POST['add_user']))
{
    $fname = $_POST['fname']; 
    $lname = $_POST['lname']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO user (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Added Sucessfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: view-register.php');
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE user SET fname='$fname',lname='$lname',email='$email',password='$password',role_as='$role_as',status='$status'
                 WHERE id= '$user_id' ";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Sucessfully";
        header('Location: view-register.php');
        exit(0);
    }
}
?>