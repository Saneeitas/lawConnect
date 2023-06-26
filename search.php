<?php
session_start();
require "inc/process.php";
require "inc/header.php";

if (isset($_POST["search"])) {
    $search = $_POST["search"];
} else {
    $search = '';
}
?>

<div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class=" p-3">
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
            </div>
            <div class="col-8">
                <div class="row">
                    <?php
                    //displaying the search posts from database
                    $searchterm = $_POST["search"];
                    $sql = "SELECT * FROM overview WHERE course_title LIKE '%$searchterm%' ORDER BY id DESC";
                    $query = mysqli_query($connection, $sql);
                    while ($result = mysqli_fetch_assoc($query)) {
                        //Looping through the col for multiples post
                    ?>
                        <div class="col-4 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $result["course_title"]; ?></h5>
                                    <!-- <p class="card-title"><?php echo $result2["name"]; ?></p> -->
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
                </div>
            </div>

        </div>
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>

<?php
require "inc/footer.php";
?>