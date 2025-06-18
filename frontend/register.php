<?php
 include "../dbconnect.php";
 session_start();
 if(isset($_SESSION['login'])){
    header('Location:profile.php');
    exit();
    
}
 
 $error=[];
 

 if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
    $name=htmlspecialchars($_POST['userName']);
    $email=htmlspecialchars($_POST['userEmail']);
    $password=htmlspecialchars($_POST['userPassword']);
    $comfirmPassword=htmlspecialchars($_POST['userConfirmPassword']);

    // echo $name .','. $email .','. $password .','. $comfirmPassword;
    
    
    $stmt=$pdo->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute([
        'email'=>$email

    ]);
    $user=$stmt->fetch();
    
    if($password != $comfirmPassword){
        $error['password']='passwrod not match';
        // header('Location: register.php');
        // exit();
    }
    else if($user){
         $error['$email']='Email already exits';
        // header('Location: register.php');
        // var_dump($error);
        // exit();
    }
    else{
       $hashPassword=password_hash($password,PASSWORD_DEFAULT);
        //echo $hashPassword;
        $stmt=$pdo->prepare("INSERT INTo users(name,email,password) VALUE (:name,:email,:password)");
        $stmt->execute([
            'name'=>$name,
            'email'=>$email,
            'password'=>$hashPassword
            
        ]);
        header('Location: register.php');
    }
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
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container py-5">
        <div class="row justify-content-md-center">
            <!-- Blog entries-->
            <div class="col-lg-6">
                <h3>Register</h3>
                <form action="" method="post" class="p-4 p-md-5 border rounded-3 bg-light">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInputName" placeholder="Mg Mg"
                            name="userName">
                        <label for="floatingInputNmae">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                            name='userEmail'>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="text-danger">
                        <?php if(isset($error['email'])) {echo $error['email'];} ?>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="userPassword">
                        <label for="floatingPassword">Password</label>
                    </div>



                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingConfirmPassword"
                            placeholder="ConfirmPassword" name="userConfirmPassword">
                        <label for="floatingConfirmPassword">Confirm Password</label>
                    </div>
                    <div class="text-danger">
                        <?php if(isset($error['password'])) {echo $error['password'];} ?>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <!-- Side widgets-->

        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>