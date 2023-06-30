<?php

session_start();

 require "inc/process.php";
 require "inc/header.php";  
 if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
     $id = $_GET["user_id"];
     //sql & query
     $sql = "SELECT * FROM users WHERE id ='$id' ";
     $query = mysqli_query($connection,$sql);
     //result
     $result = mysqli_fetch_assoc($query);
 }else{
     header("location: index.php");
 }
 //session to store url
 $_SESSION["url"] = $_GET["user_id"];
?>

<div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-8">
                <?php 
         if(isset($error)) {
            ?>
                <div class="alert alert-danger">
                    <strong><?php echo $error ?></strong>
                </div>
                <?php
         }elseif (isset($success)) {
            ?>
                <div class="alert alert-success">
                    <strong><?php echo $success ?></strong>
                </div>
                <?php
        }
        ?>

<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <img src="<?php echo $result["profile_pic"] ?>" alt="Profile Picture" class="rounded-circle" style="width: 200px; height: 200px">
            <h2 class="mt-3"><?php echo $result["name"] ?></h2>
            <p><i class="far fa-envelope"></i> <?php echo $result["email"] ?></p>
            <p><i class="fas fa-map-marker-alt"></i> <?php echo $result["location"] ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <h6 class="mt-4">Experience</h6>
            <p><?php echo $result["experience"] ?></p>
        </div>
        <div class="col-4">
            <h6 class="mt-4">Area of Expertise</h6>
            <?php
            $id = $result["category_id"];
            $sql = "SELECT * FROM category WHERE id = '$id' ";
            $query = mysqli_query($connection, $sql);
            while ($result2 = mysqli_fetch_assoc($query)) {
            ?>
                <p><?php echo $result2["area"] ?></p>
            <?php
            }
            ?>
        </div>
        <div class="col-4">
            <h6 class="mt-4">Phone Number</h6>
            <p><?php echo $result["phone"] ?></p>
        </div>
    </div>
</div>

    </div>
</div>



<?php
 require "inc/footer.php"; 
 
 
 ?>