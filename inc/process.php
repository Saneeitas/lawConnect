<?php

require "connection.php";

if (isset($_POST["register"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $query_check = mysqli_query($connection, $sql_check);
    if (mysqli_fetch_assoc($query_check)) {
        //user exists
        $error = "User already exist";
    } else {
        //insert into DB
        $sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$encrypt_password')";
        $query = mysqli_query($connection, $sql) or die("Cant save data");
        $success = "Registration successfully";
    }
}

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check2 = "SELECT * FROM users WHERE email = '$email'";
    $query_check2 = mysqli_query($connection, $sql_check2);
    if (mysqli_fetch_assoc($query_check2)) {
        //check if email and password exist
        $sql_check = "SELECT * FROM users WHERE email = '$email' 
       AND password = '$encrypt_password'";
        $query_check = mysqli_query($connection, $sql_check);
        if ($result = mysqli_fetch_assoc($query_check)) {
            //Login to dashboard
            $_SESSION["user"] = $result;
            if ($result["role"] == "user") {
                if (isset($_SESSION["url"])) {
                    $course_id = $_SESSION["url"];
                    header("location: view-course.php?course_id=$course_id");
                }
            } else {
                header("location: dashboard.php");
            }
            $success = "User logged in";
        } else {
            //user password wrong
            $error = "User password wrong";
        }
    } else {
        //user not found
        $error = "User email not found";
    }
}

if (isset($_POST["add-course"])) {
    $name = $_POST["name"];
    //sql
    $sql = "INSERT INTO courses(name) VALUES('$name')";
    $query = mysqli_query($connection, $sql);

    if ($query) {
        $success = "Course added";
    } else {
        $error = "Unable to add Course";
    }
}

if (isset($_GET["delete_course"]) && !empty($_GET["delete_course"])) {
    $id = $_GET["delete_course"];
    //sql
    $sql = "DELETE FROM courses WHERE id = '$id'";
    $query = mysqli_query($connection, $sql);

    if ($query) {
        $success = "course deleted";
    } else {
        $error = "Unable to delete course";
    }
}

if (isset($_POST["edit_course"])) {
    $name = $_POST["name"];
    $edit_id = $_GET["edit_id"];
    //sql
    $sql = "UPDATE courses SET name = '$name' WHERE id = '$edit_id'";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        $success = "course updated";
    } else {
        $error = "Unable to update course";
    }
}


if (isset($_POST["new_course"])) {

    $course_title = $_POST["course_title"];
    $course_code = $_POST["course_code"];
    $credit_unit = $_POST["credit_unit"];
    $course_desc = $_POST["desc"];
    $course_overview = $_POST["overview"];
    $course_id = $_POST["course_id"];
    $level = $_POST["level"];

    //sql
    $sql = "INSERT INTO overview(course_title,course_code,credit_unit, course_desc,course_overview, course_id,level) 
                VALUES('$course_title','$course_code','$credit_unit', '$course_desc','$course_overview','$course_id','$level')";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        //success message
        $success = "Added Succesful";
    } else {
        $error = "Unable to add ";
    }
}

if (isset($_POST["edit_overview"])) {
    $id = $_GET["edit_overview_id"];

    //update to database
    //parameters 
    $course_title = $_POST["course_title"];
    $course_code = $_POST["course_code"];
    $credit_unit = $_POST["credit_unit"];
    $course_desc = $_POST["desc"];
    $course_overview = $_POST["overview"];
    $level = $_POST["level"];
    $course_id = $_POST["course_id"];
    //sql
    $sql = "UPDATE overview SET course_title ='$course_title', course_code='$course_code', 
                credit_unit='$credit_unit', course_desc='$course_desc', level='$level', course_overview='$course_overview', 
                course_id='$course_id' WHERE id='$id' ";
    $query = mysqli_query($connection, $sql);
    //check if
    if ($query) {
        $success = "Course updated";
    } else {
        $error = "Unable to update Course";
    }
}

if (isset($_GET["delete_overview"]) && !empty($_GET["delete_overview"])) {
    $id = $_GET["delete_overview"];
    //sql
    $sql = "DELETE FROM overview WHERE id = '$id'";
    $query = mysqli_query($connection, $sql);
    //check if
    if ($query) {
        $success = "Course deleted successfully";
    } else {
        $error = "Unable to delete Course";
    }
}
