<?php
 session_start();
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <!-- favicon -->
    <!-- ./ its mean outside the directory and then ./images it mean reach inside the images directory and access image -->
    <link rel="icon" href="./images/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin Boostrap 5</title>
    <!-- for Icon cdn path -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- google font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <!-- css link -->
    <link rel="stylesheet" href="Asset/style.css">
</head>
<style>
    body{
        font-family: "Buenard", serif;
        font-weight: 400;
        font-style: normal;
    }
</style>
<!-- if logout not to access -->
    <?php
        // echo"<h5 class='text-secondary fw-bold'>Admin " . $_SESSION['admin_auth']['admin_name'] . "</h5>";
        // yeh check kar raha hai ke agar user login nahi hai tou login walay page mai redirect kardou
        if(!isset($_SESSION['admin_auth']['admin_name'])){
            header("location: admin.php");
        }
    ?>
<body>
    <div class="wrapper" style="">
        <asside id="sidebar">
            <!-- content for sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                <img src="images/logo.png" class="rounded-circle" height="40px" width="40px" alt="">
                    <a href="#" class="text-secondary">Royal Blaster</a>
                </div><!--end logo  -->
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link text-secondary">
                            <!-- add icon here -->
                            Admin Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed text-secondary" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false">
                            Pages </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collpase" data-bs-target="#sidebar">
                            <li class="sidebar-item">
                                <a href="members.php" class="sidebar-link text-secondary">
                                    Users List
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="batsman_career.php" class="sidebar-link text-secondary">
                                    Batsman Career
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="bowler_career.php" class="sidebar-link text-secondary">
                                    Bowler Career
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="schedule.php" class="sidebar-link text-secondary">
                                    New Matches Schedule
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="batsmanranking.php" class="sidebar-link text-secondary">
                                    Batsman Ranking
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="bowlerranking.php" class="sidebar-link text-secondary">
                                    Bowler Ranking
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="admin_pass.php" class="sidebar-link text-secondary">
                                    Admin change pass
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </asside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-icon pe-md-0 text-decoration-none text-dark fs-5">
                                <?php
                                echo"<h5 class='text-secondary fw-bold'>Admin " . $_SESSION['admin_auth']['admin_name'] . "</h5>";
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item text-secondary">Profile</a>
                                <form action="adminCode.php" method="post">
                                    <button type="submit" name="Admin_logout" class="dropdown-item text-secondary">Logout</button>
                                </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4 class="text-secondary">Admin Dashboard</h4>
                    </div>
                    <div class="row">
                        <!-- <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <ul class="mb-2">
                                                <?php echo "<li> id: " . $_SESSION['admin_auth']['Id'] . "</li>"; ?>
                                                <?php echo "<li> Name: " . $_SESSION['admin_auth']['admin_name'] . "</li>" ?>
                                                <?php echo "<li> Age: " . $_SESSION['admin_auth']['admin_pass'] . "</li>" ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 rounded bg-dark illustration">
                                <button class="btn-close text-end z-1 position-absolute"
                                    onclick="closeCard(this)"></button>
                                <div class="card-body p-3 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col">
                                            <div class="p-3 m-1">
                                                <h4 class="text-secondary">Welcome Admin <?php echo $_SESSION['admin_auth']['admin_name'] ?></h4>
                                                <p class="mb-0 text-secondary">Admin Dashboard</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add component here -->
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-solid fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Github</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Email</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Linkedin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- script tag start -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!-- agar icon show nahi ho raha iska matlab net band hai -->
    <script src="https://kit.fontawesome.com/5f34f5e1d5.js" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <!-- script tag end -->
</body>

</html>