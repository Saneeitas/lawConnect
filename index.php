<?php
session_start();

require "inc/process.php";
require "inc/header.php";
?>

<div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-2">
        <div class="my-4 p-3">
            <form action="search.php" method="post">
                <div class="form-group d-flex justify-content-center align-items-center mx-5">
                    <div class="input-group" style="width: 80%; height: 39px;">
                        <input type="text" class="form-control border-white" name="search" placeholder="Input your search keyword" id="" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn text-dark" style="background-color:white; ">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <img class="d-block mx-auto my-4 mb-4" src="./img/e3.PNG" style="border-radius: 15px" alt="" width="1050" height="350">
        <div class="row">
            <div class="col-12">
                <div class="p-3 my-3 text-center">
                    <h3 class="display-5 " style="color: #176B87">Welcome to E-Learning Platform</h3>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">Discover a world of knowledge at your fingertips with our comprehensive online learning platform designed specifically for university students. Whether you're looking to explore new courses, enhance your existing skills, or delve into a subject that piques your curiosity, our platform is here to support your educational journey every step of the way.</p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class=" text-center">
                    <h3 class="display-5 " style="color: #176B87">Flexible Learning Environment</h3>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">We understand that today's students lead busy lives, juggling multiple commitments. That's why our platform offers flexible learning options that fit seamlessly into your schedule. Access course materials anytime, anywhere, and at your own pace. Whether you prefer to study in the comfort of your home or while on the go, our platform is accessible across various devices, ensuring that you have a consistent learning experience.</p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid my-3 " id="#question">
        <div class="row">
            <div class="col-12 ">
                <div class="row">
                    <h3 class="display-5 text-center" style="color: #176B87">Courses</h3>
                    <?php
                    //displaying the products from database
                    $sql = "SELECT * FROM overview ORDER BY id DESC";
                    $query = mysqli_query($connection, $sql);
                    while ($result = mysqli_fetch_assoc($query)) {
                        //Looping through the col for multiples product
                    ?>
                        <?php
                        while ($result = mysqli_fetch_assoc($query)) {
                            $id = $result["course_id"];
                            $sql = "SELECT * FROM courses WHERE id=$id";
                            $query2 = mysqli_query($connection, $sql);
                            $result2 = mysqli_fetch_assoc($query2);
                        ?>
                            <div class="col-4 mt-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $result["course_title"]; ?></h5>
                                        <p class="card-title"><?php echo $result2["name"]; ?></p>
                                        <p class="card-title"><?php echo $result["level"]; ?> Level</p>
                                        <a href="view-course.php?course_id=<?php echo $result["id"]; ?>" class="btn btn-sm text-light" style="background-color: #176B87;">
                                            <i class="fas fa-eye"></i> View Course
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php require './pages/footer-home.php'; ?>

</div>


<?php require "inc/footer.php"; ?>