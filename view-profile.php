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
                            <a href="my-profile.php"  >Profile</a>
                        </li>
                        <li>
                        <a href="view-profile.php" class="text-danger">View Profile</a>
                    </li>
                  
                    </ul>
                </div>
            
            <div class="col-9">
                <div class="container">
                    <h6>My Profile</h6>
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

<div class="container mt-4">
    <div class="text-right">
      <a href="edit-profile.php?edit_user_id=<?php echo $result["id"] ?>"><i class="fas fa-edit"></i></a>
      <a href="edit-user.php?edit_user_id=<?php echo $result["id"] ?>"><i class="fas fa-add"></i></a>
    </div>
    <div class="text-center">
      <img src="<?php echo $result["profile_pic"] ?>" alt="Profile Picture" class="rounded-circle" style="width: 200px; height:200px">
      <h2 class="mt-3"><?php echo $result["name"] ?></h2>
      <p><i class="far fa-envelope"></i> <?php echo $result["email"] ?></p>
      <p><i class="fas fa-map-marker-alt"></i> <?php echo $result["location"] ?></p>
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
        $sql = "SELECT * FROM category WHERE id ='$id' ";
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
    </div>
</div>

<?php
//footer content
require './pages/footer-home.php'; ?>

</div>


<?php
//footer script
require "inc/footer.php";  ?>