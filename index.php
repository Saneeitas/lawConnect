<?php

session_start();

 require "inc/process.php";
 require "inc/header.php";   
 // require "body.php"; 

 ?>
<div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-3">
    <div class="row">
    <div  class="col-12">
    <img class="d-block mx-auto mb-4" src="./images/l1.PNG" style="border-radius: 15px" alt="" width="950" height="450">
    </div>
    </div>
    
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <?php
              //displ+aying the users from database
              $sql = "SELECT * FROM users ORDER BY id DESC";
              $query = mysqli_query($connection,$sql);
               while($result = mysqli_fetch_assoc($query)) { 
                //Looping through the col for multiples user
                ?>   
                    <div class="col-4 mt-2">
                        <div class="card ">
                        <div class="text-center mt-4">
                        <img src="<?php echo $result["profile_pic"] ?>" alt="Profile Picture" class="rounded-circle" style="width: 100px; height:100px">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $result["name"]; ?></h6>
                                <?php 
                                      $id = $result["category_id"];
                                      $sql2 = "SELECT * FROM category WHERE id='$id'";
                                      $query2 = mysqli_query($connection,$sql2);
                                      $result2 = mysqli_fetch_assoc($query2);
                                  ?>
                                <p><i class="far fa-envelope"></i> <?php echo $result2["area"] ?></p>
                                <a href="view-user.php?user_id=<?php echo $result["id"]; ?>" class="btn text-dark"
                                    style="background-color:#ffffc2;">Connect</a>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php
            }
          ?>
                </div>
            </div>
            <div class="col-4">
                <!--Side bar--->
                <div class="border p-3">
                    <form action="search.php" method="post">
                        <div class="form-group">
                        <h5>Search a profile</h5>
                            <input type="text" class="form-control" name="search" placeholder="Enter a Search keyword " id=""
                                required>
                        </div>
                        <button type="submit" class="btn text-dark mt-2"
                            style="background-color:#ffffc2;">Search</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>

 <?php 
 require "inc/footer.php"; 
 ?>
