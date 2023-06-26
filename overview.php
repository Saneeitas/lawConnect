<?php
session_start();

//check if user is not logged in
if (!isset($_SESSION["user"])) {
    header("location: login.php");
} //check if logged in as user
if ($_SESSION["user"]["role"] == "user") {
    header("location: index.php");
}
//header links
require "inc/header.php"; ?>

<div class="container">

    <?php
    //header content
    require './pages/header-home.php';
    include 'inc/process.php'; ?>

    <div class="container p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h4 style="color:#176B87;">DASHBOARD</h4>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <ul class="list-group">
                    <div>
                        <li class="list-group-item" style="color:#176B87;">
                            <a href="course.php" class="btn">
                                <i class="fas fa-grip-vertical" style="color:#176B87;"></i> Department</a>
                        </li>
                        <li class="list-group-item">
                            <a href="overview.php" class="btn text-danger">
                                <i class="fas fa-boxes" style="color:#176B87;"></i> Course Overview</a>
                        </li class="list-group-item">
                        <li class="list-group-item">
                            <a href="dashboard.php" class="btn">
                                <i class="fas fa-plus" style="color:#176B87;"></i> Add Course </a>
                        </li>
                    </div>
                </ul>
            </div>
            <div class="col-9">
                <div class="container">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Credit Unit</th>
                                <th scope="col">Level</th>
                                <th scope="col">Description</th>
                                <th scope="col">Overview</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM overview";
                            $query = mysqli_query($connection, $sql);
                            $counter = 1;
                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr class="table-active">
                                    <td scope="row"><?php echo $counter; ?></td>
                                    <td scope="row">
                                        <?php echo $result["course_title"]; ?>
                                    </td>
                                    <?php
                                    $id = $result["course_id"];
                                    $sql2 = "SELECT * FROM courses WHERE id='$id'";
                                    $query2 = mysqli_query($connection, $sql2);
                                    $result2 = mysqli_fetch_assoc($query2);
                                    ?>
                                    <td><?php echo $result["course_code"]; ?></td>
                                    <td><?php echo $result["credit_unit"]; ?></td>
                                    <td><?php echo $result["level"]; ?></td>
                                    <td><?php echo $result["course_desc"]; ?></td>
                                    <td><?php echo $result["course_overview"]; ?></td>
                                    <td>
                                        <a href="edit-overview.php?edit_overview_id=<?php echo $result["id"] ?>">
                                            <i class="fas fa-edit"></i></a>
                                        |
                                        <a href="?delete_overview=<?php echo $result["id"]; ?>">
                                            <i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $counter++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <label for="">Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter title" id="" required>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-primary" name="category">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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