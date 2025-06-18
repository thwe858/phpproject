<?php
session_start(); 
if(!isset($_SESSION['login'])){
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <?php include 'navbar.php';?>

    <!-- Page content-->
    <div class="container">
        <div class="row mt-5">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <h2>Porfile Page</h2>
                <a href="createPost.php" class="btn btn-primary">Create new post</a>

            </div>
            <!-- Side widgets-->
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
    <!-- Footer-->
    <?php include 'footer.php'; ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>