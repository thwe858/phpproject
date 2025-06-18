<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <?php if(!isset($_SESSION['login'])):?>
                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])):?>
                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                <li class="nav-item"><a class="nav-link" onclick="return confirm('Are you sure to logout?')"
                        href="logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>