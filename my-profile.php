<?php
session_start();

//check if user is not logged in
// if (!isset($_SESSION["user"])) {
//     header("location: login.php");
// } 
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
   
        $user_id = $_SESSION["user"]["id"];
        //sql
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_fetch_assoc($query);
  
    
    ?>

    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4>Welcome <?php echo $_SESSION["user"]["name"]; ?></h4>
                    </div>
                </div>
            </div>
           
                <div class="col-3">
                    <h5>Navigations</h5>
                    <ul>
                        <li>
                            <a href="my-profile.php" class="text-danger" >Profile</a>
                        </li>
                        <li>
                        <a href="view-profile.php">View Profile</a>
                    </li>
                    </ul>
                </div>
            
            <div class="col-9">
                <div class="container">
                    <h6>Update Profile</h6>
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
                        <div class="form-group">
                            <label for="">Select  a Profile Pic</label>
                            <input type="file" name="thumbnail" id="" class="form-control">
                        </div>
                        <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                            <label for="">name</label>
                            <input type="text" name="name" placeholder="Enter name" value="<?php echo $result["name"] ?>" class="form-control" id="" disabled>
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="text" name="email" placeholder="Enter email" value="<?php echo $result["email"] ?>" class="form-control" id="" disabled>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" placeholder="Enter phone number" class="form-control" id="">
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
                                            <option value="<?php echo $result2["id"] ?>">
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
                            <input type="text" name="experience" placeholder="Enter years of experience"  class="form-control" id="" >
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="location" placeholder="Enter your address" class="form-control" id="" >
                        </div>
                        </div>
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" name="update_profile" style="background-color:#10597d;" class="btn btn-sm text-white my-2">
                                Update Profile</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
//footer content
require './pages/footer-home.php'; ?>

</div>


<?php
//footer script
require "inc/footer.php";  ?>