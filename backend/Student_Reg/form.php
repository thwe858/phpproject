<?php 
include '../../dbconnect.php';

if (isset($_SERVER['REQUEST_METHOD'])&&$_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentName = htmlspecialchars($_POST['studentName']);
    $age = htmlspecialchars($_POST['age']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);

    $stmt = $pdo->prepare("INSERT INTO students (name, age, phone, gender, address) VALUES (:name, :age, :phone, :gender, :address)");
    $stmt->execute([
        'name' => $studentName,
        'age' => $age,
        'phone' => $phone,
        'gender' => $gender,
        'address' => $address
    ]);
     header('Location: stulist.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome-free-6.7.2-web/css/all.min.css">

    <style>
    body {
        background-color: #f8f9fa;
    }

    .sidebar {
        height: 100vh;
        background-color: #343a40;
        color: white;
        padding-top: 20px;
    }

    .sidebar a {
        color: white;
        display: block;
        padding: 10px 20px;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #495057;
    }

    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h4 class="text-center mb-4">My Panel</h4>
                <a href="#"><i class="fa-solid fa-house text-success"></i> Dashboard</a>
                <a href="#"><i class="fa-solid fa-plus text-success"></i> Register Student</a>
                <a href="stulist.php"><i class="fa-solid fa-table-list text-success"> </i> Student List</a>
                <a href="#"><i class="fa-regular fa-gear text-success"></i> Settings</a>
            </div>

            <!-- Main content -->
            <div class="col-md-10">
                <!-- Navbar -->
                <nav class="navbar navbar-light bg-white border-bottom shadow-sm px-4">
                    <span class="navbar-brand mb-0 h4">Student Registration</span>
                    <img src="images/admin.png" alt="Login" class="profile-img">
                </nav>

                <!-- Form Area -->
                <div class="container mt-5">
                    <div class="card mx-auto shadow-sm" style="max-width: 600px;">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">Register New Student</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="studentName" class="form-label">Name</label>
                                    <input type="text" name="studentName" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Male"
                                            required>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Female">
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" value="Other">
                                        <label class="form-check-label">Other</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" rows="3" class="form-control" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-success w-100">Register</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- End Main Content -->

        </div> <!-- End Row -->
    </div> <!-- End Container -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>