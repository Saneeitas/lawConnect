<?php
session_start();

//check if user is not logged in
 if (!isset($_SESSION["user"])) {
     header("location: login.php");
 } 
//check if logged in as user
// if ($_SESSION["user"]["role"] == "user") {
//     header("location: index.php");
// }

//header links
require "inc/header.php"; ?>

<div class="container">

    <?php
    //header content
    require './pages/header-home.php';
    include 'inc/process.php';

     //if user click edit
     if (isset($_GET["edit_user_id"]) && !empty($_GET["edit_user_id"])) {
        $edit_user_id = $_GET["edit_user_id"];
        //sql
        $sql = "SELECT * FROM users WHERE id = '$edit_user_id'";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($query);
    } else {
        header("location: my-profile.php");
    }
  
    
    ?>

    <div class="container p-3">
        <div class="row">
        
           
            <div class="col-3" style="background-color:#3F2305; border-radius:5px;">
    <h5 class="text-muted my-2 mx-2">Profile Settings</h5>
    <ul style="list-style-type: none; padding-left: 0; margin-top: 10px;">
        <li style="margin-bottom: 10px;">
            <a href="my-profile.php" class=" text-muted mx-4" style="text-decoration: none;">
                <i class="fas fa-user-circle"></i> My Profile
            </a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="view-profile.php" style="text-decoration: none;" class="text-danger mx-4">
                <i class="fas fa-eye"></i> View Profile
            </a>
        </li>
    </ul>
</div>
            
            <div class="col-9">
                <div class="container">
                    <h6>Edit Profile</h6>
                    <?php
                    if (isset($error)) {
                    ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $error ?></strong>
                        </div>
                    <?php
                    } elseif (isset($success)) {
                    ?>
                        <div class="alert alert-success">
                            <strong><?php echo $success ?></strong>
                        </div>
                    <?php
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                    <img height="50px" src="<?php echo $result["profile_pic"] ?>" alt="">
                        <div class="form-group">
                            <label for="">Select  a Profile Pic</label>
                            <input type="file" name="thumbnail" id="" class="form-control">
                        </div>
                        <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                            <label for="">name</label>
                            <input type="text" name="name" placeholder="Enter name" value="<?php echo $result["name"] ?>" class="form-control" id="">
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="text" name="email" placeholder="Enter email" value="<?php echo $result["email"] ?>" class="form-control" id="">
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" placeholder="Enter phone number" value="<?php echo $result["phone"] ?>"class="form-control" id="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Practice Area</label>
                                    <select name="category_id" class="form-control" id="">
                                    <?php
                                        $sql = "SELECT * FROM category ORDER BY id DESC";
                                        $query = mysqli_query($connection, $sql);
                                        while ($result2 = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option value="<?php echo $result2["id"] ?>" <?php echo $result["category_id"] == $result2["id"] ? "selected" : "" ?>>
                                                <?php echo $result2["area"] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                            <label for="">Experience</label>
                            <input type="text" name="experience" placeholder="Enter years of experience" value="<?php echo $result["experience"] ?>" class="form-control" id="" >
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="location" placeholder="Enter your address" value="<?php echo $result["location"] ?>" class="form-control" id="" >
                        </div>
                        </div>
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" name="update_profile" style="background-color:#ffffc2;" class="btn btn-sm text-dark my-2">
                                Update Profile</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>


<?php
//footer script
require "inc/footer.php";  ?>