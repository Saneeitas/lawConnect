<?php

require "connection.php";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(isset($_POST["register"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $query_check = mysqli_query($connection,$sql_check);
    if(mysqli_fetch_assoc($query_check)){
        //user exists
        $error = "User already exist";
    }else{
         //insert into DB
        $sql = "INSERT INTO users(name,email,password) 
               VALUES('$name','$email','$encrypt_password')";
        $query = mysqli_query($connection,$sql) or die("Cant save data");
        $success = "Registration successfully";
    }  
}

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check2 = "SELECT * FROM users WHERE email = '$email'";
    $query_check2 = mysqli_query($connection,$sql_check2);
    if(mysqli_fetch_assoc($query_check2)){
       //check if email and password exist
       $sql_check = "SELECT * FROM users WHERE email = '$email' AND password = '$encrypt_password'";
       $query_check = mysqli_query($connection,$sql_check);
       if($result = mysqli_fetch_assoc($query_check)){
       //Login to dashboard
       $_SESSION["user"] = $result;
    
        header("location: my-profile.php");
       $success = "User logged in";       
     }else{ 
    //user password wrong
    $error = "User password wrong";
}  
       }else{
        //user not found
        $error = "User email not found";
  } 
}

if(isset($_POST["category"])){
    $name = $_POST["name"];
    //sql
    $sql = "INSERT INTO category(name) VALUES('$name')";
    $query = mysqli_query($connection,$sql);
    
    if($query){
        $success = "Category added";
    }else{
        $error = "Unable to add category";
    }
}


if(isset($_POST["update_profile"])){
    $user_id = $_SESSION["user"]["id"];
    if($_FILES["thumbnail"]["name"] != ""){
        //upload image
        $target_dir = "uploads/";
        $url = $target_dir.basename($_FILES["thumbnail"]["name"]);
        //move uploaded file
        if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"],$url)){
            //update to database
             //parameters 
            $phone = $_POST["phone"];
            $location = $_POST["location"];
            $experience = $_POST["experience"];
            $category_id = $_POST["category_id"];
            $thumbnail = $url;    
            //sql
            $sql = "UPDATE users SET phone ='$phone', location='$location', 
                    experience='$experience', category_id='$category_id', profile_pic='$thumbnail'
                    WHERE id='$user_id' ";
            $query = mysqli_query($connection,$sql);
            //check if
            if($query){
                $success = "Profile updated";
            }else{
                $error = "Unable to update profile";
            }
        }
    }
}


if(isset($_POST["update_profile"])){
    $id = $_SESSION["user"]["id"];
    if($_FILES["thumbnail"]["name"] != ""){
        //upload image
        $target_dir = "uploads/";
        $url = $target_dir.basename($_FILES["thumbnail"]["name"]);
        //move uploaded file
        if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"],$url)){
            //update to database
             //parameters 
             $phone = $_POST["phone"];
             $location = $_POST["location"];
             $experience = $_POST["experience"];
             $category_id = $_POST["category_id"];
             $thumbnail = $url;    
            //sql
            $sql = "UPDATE users SET phone ='$phone', location='$location', 
                    experience='$experience', category_id='$category_id', profile_pic='$thumbnail'
                    WHERE id='$id' ";
            $query = mysqli_query($connection,$sql);
            //check if
            if($query){
                $success = "Profile Updated";
            }else{
                $error = "Unable to update profile";
            }
        }
    }else{
        //leave the upload image and
        //update to database
        //parameters 
        $phone = $_POST["phone"];
        $location = $_POST["location"];
        $experience = $_POST["experience"];
        $category_id = $_POST["category_id"];   
        //sql
        $sql = "UPDATE users SET phone ='$phone', location='$location', 
                    experience='$experience', category_id='$category_id'
                    WHERE id='$id' ";
        $query = mysqli_query($connection,$sql);
        //check if
        if($query){
        $success = "Profile updated";
        }else{
        $error = "Unable to update Profile";
        }

    }
}


if(isset($_POST["edit_user"])){
    //check if change password is click
    if(isset($_POST["change_password"]) && $_POST["change_password"] == "on"){
       //update the user with change_password
       $id = $_GET["edit_user_id"];
       $name = $_POST["name"];
       $email = $_POST["email"];
       $password = md5($_POST["password"]);  
       //sql and query
       $sql = "UPDATE users SET name='$name', email='$email',
               password='$password' WHERE id = '$id' ";
       $query = mysqli_query($connection,$sql);
       //check if
       if($query){
           $success = "User data updated";
       }else{
           $error = "Unable to update data";
       }

    }else{
        //update the data only
        $id = $_GET["edit_user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];  
        //sql and query
        $sql = "UPDATE users SET name='$name', email='$email'
                WHERE id = '$id' ";
        $query = mysqli_query($connection,$sql);
        //check if
        if($query){
            $success = "User data updated";
        }else{
            $error = "Unable to update data";
        }
    }
}


?>