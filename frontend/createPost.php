<?php
session_start(); 
if(!isset($_SESSION['login'])){
    header('Location: login.php');
    exit();
}
include '../dbconnect.php';
$stmt=$pdo->query("SELECT * FROM categories ORDER BY id DESC");
$categories=$stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
    $title=htmlspecialchars($_POST['title']);
    $category=htmlspecialchars($_POST['category']);
    $content=htmlspecialchars($_POST['content']);
    $stmt=$pdo->prepare('INSERT INTO posts (title,category_id,content,author_id,status)VALUES(:title,:category,:content,:author_id,:status)');
    $stmt->execute([
        'title'=>$title,
        'category'=>$category,
        'content'=>$content,
        'author_id'=>$_SESSION['user']['id'],
        'status'=>'created'
    ]);
    header('Location:profile.php');
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
    <div class="container mt-5">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <h2>Create post Page</h2>
                <form action="#" method="post">
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">

                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Category</label>
                        <select name="category" id="category" calss="form-control">
                            <?php foreach($categories as $category):?>
                            <option value="<?=$category['id'] ?>"><?=$category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <div class="form-group mb-3">
                        <label for="content">content</label>
                        <textarea name="content" id="content"></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
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