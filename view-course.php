<?php

session_start();

//check if user is not logged in
if (!isset($_SESSION["user"])) {
    header("location: login.php");
}


require "inc/process.php";
require "inc/header.php";
if (isset($_GET["course_id"]) && !empty($_GET["course_id"])) {
    $id = $_GET["course_id"];
    //sql & query
    $sql = "SELECT * FROM overview WHERE id ='$id' ";
    $query = mysqli_query($connection, $sql);
    //result
    $result = mysqli_fetch_assoc($query);
} else {
    header("location: index.php");
}
//session to store url
$_SESSION["url"] = $_GET["course_id"];
?>
<div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-8">
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
                <?php
                $cid = $result["course_id"];
                //sql & query to get course_id name
                $sql2 = "SELECT * FROM courses WHERE id='$cid' ";
                $query2 = mysqli_query($connection, $sql2);
                $result2 = mysqli_fetch_assoc($query2);
                ?>
                <div class="row justify-content-center align-items-center mx-5">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="color: #176B87" class="display-5"><?php echo $result["course_title"]; ?></h3>
                                <hr>
                                <h6>Programme: <?php echo $result2["name"]; ?></h6>
                                <h6>Course Code: <?php echo $result["course_code"]; ?></h6>
                                <h6>Level: <?php echo $result["level"]; ?></h6>
                                <h6>Credit Unit: <?php echo $result["credit_unit"]; ?></h6>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h3 class="display-6" style="color: #176B87">Course Description</h3>
                                <hr>
                                <h6> <?php echo $result["course_desc"]; ?></h6>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h3 class="display-6" style="color: #176B87">Course Overview</h3>
                                <hr>
                                <h6><?php echo $result["course_overview"]; ?></h6>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>

<?php
require "inc/footer.php";
?>