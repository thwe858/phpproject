<?php
include '../../dbconnect.php';


$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
$i=1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student List</title>
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
                <a href=""><i class="fa-solid fa-table-list text-success"> </i> Student List</a>
                <a href="#"><i class="fa-regular fa-gear text-success"></i> Settings</a>
            </div>

            <!-- Main content -->
            <div class="col-md-10">
                <!-- Navbar -->
                <nav class="navbar navbar-light bg-white border-bottom shadow-sm px-4">
                    <span class="navbar-brand mb-0 h4">Student List</span>
                    <img src="images/admin.png" alt="Login" class="profile-img">
                </nav>

                <!-- Table Area -->
                <div class="container mt-5">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">All Registered Students</h5>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($students as $stu): ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= htmlspecialchars($stu['name']) ?></td>
                                        <td><?= htmlspecialchars($stu['age']) ?></td>
                                        <td><?= htmlspecialchars($stu['phone']) ?></td>
                                        <td><?= htmlspecialchars($stu['gender']) ?></td>
                                        <td><?= htmlspecialchars($stu['address']) ?></td>
                                        <td>
                                            <a href="stuedit.php?id=<?= $stu['id'] ?>" class="btn btn-primary"> Edit</a>
                                            <a href="studelete.php?id=<?= $stu['id'] ?>"
                                                onclick="return confirm('Are you sure you want to delete?')"
                                                class="btn btn-danger"> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- End Main Content -->

        </div> <!-- End Row -->
    </div> <!-- End Container -->

    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>