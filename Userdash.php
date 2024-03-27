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
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- css link -->
    <link rel="stylesheet" href="Asset/style.css">
</head>
<style>
    .img_store{
        height: 100px;
        width: 100px;
    }

    .img_store img{
        height: 100%;
        width: 100%;
        
    }
</style>
<body>
    <!-- when user is not login and you want to  -->
    <?php
        if(!isset($_SESSION['user_auth']['Name'])){
            header("location: user.php");
        }
    ?>
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
                            User Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed text-secondary" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false">
                            Pages </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collpase" data-bs-target="#sidebar">
                            <li class="sidebar-item">
                                <a href="player-profile.php" class="sidebar-link text-secondary">
                                    Player Profile
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="batsmanRecord.php" class="sidebar-link text-secondary">
                                    Batsman career status
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="bowlerRecord.php" class="sidebar-link text-secondary">
                                    Bowler career status
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="rankingsRecord2.php" class="sidebar-link text-secondary">
                                    Bowler ranking
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="rankingsRecord.php" class="sidebar-link text-secondary">
                                    Batsman ranking
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="scheduleRecord.php" class="sidebar-link text-secondary">
                                    Matches Schedule
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
                                <!-- <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                                    alt="" class="avatar"> -->
                                <?php
                                echo "<h5 class='text-secondary fw-bold'>" . $_SESSION['user_auth']['Name'] . "</h5>";
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item text-secondary">Profile</a>
                                <form action="usercode.php" method="post">
                                    <button type="submit" name="logout" class="dropdown-item text-secondary">Logout</button>
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
                        <h4 class="text-secondary">User Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 d-flex">
                                    <div class="card flex-fill border-0 rounded bg-light illustration">
                                        <div class="card-body p-3 d-flex flex-fill">
                                            <div class="row g-0 w-100">
                                                <div class="col">
                                                    <div class="p-3 m-1 d-flex align-items-center">
                                                        <div class="img_store">
                                                        <img src="images/cricket-player.png" alt="">
                                                        </div>
                                                        <div>
                                                            <a href="player-profile.php" class="text-decoration-none text-dark fs-3">Player Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <ul class="mb-2">
                                                <?php echo "<li> id: " . $_SESSION['user_auth']['id'] . "</li>"; ?>
                                                <?php echo "<li> Name: " . $_SESSION['user_auth']['Name'] . "</li>" ?>
                                                <?php echo "<li> Age: " . $_SESSION['user_auth']['age'] . "</li>" ?>
                                                <?php echo "<li> sex: " . $_SESSION['user_auth']['sex'] . "</li>" ?>
                                                <?php echo "<li> country: " . $_SESSION['user_auth']['country'] . "</li>" ?>
                                                <?php echo "<li> batting: " . $_SESSION['user_auth']['batting'] . "</li>" ?>
                                                <?php echo "<li> balling: " . $_SESSION['user_auth']['balling'] . "</li>" ?>
                                                <?php echo "<li> address: " . $_SESSION['user_auth']['address'] . "</li>" ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 rounded bg-light illustration">
                                <button class="btn-close text-end z-1 position-absolute"
                                    onclick="closeCard(this)"></button>
                                <div class="card-body p-3 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col">
                                            <div class="p-3 m-1">
                                                <h4 class="text-secondary">Welcome <?php echo $_SESSION['user_auth']['Name'] ?></h4>
                                                <p class="mb-0 text-secondary">User Dashboard</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 rounded bg-light illustration">
                                <div class="card-body p-3 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col">
                                            <div class="p-3 m-1 d-flex align-items-center">
                                                <div class="img_store">
                                                <img src="images/batsman.png" alt="">
                                                </div>
                                                <div>
                                                    <a href="batsmanRecord.php" class="text-decoration-none text-dark fs-3">Batsman Career list</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                                <div class="card flex-fill border-0 rounded bg-light illustration">
                                    <div class="card-body p-3 d-flex flex-fill">
                                        <div class="row g-0 w-100">
                                            <div class="col">
                                                <div class="p-3 m-1 d-flex align-items-center">
                                                    <div class="img_store">
                                                    <img src="images/bowler.png" alt="">
                                                    </div>
                                                    <div>
                                                        <a href="bowlerRecord.php" class="text-decoration-none text-dark fs-3">Bowlers Career list</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                                <div class="card flex-fill border-0 rounded bg-light illustration">
                                    <div class="card-body p-3 d-flex flex-fill">
                                        <div class="row g-0 w-100">
                                            <div class="col">
                                                <div class="p-3 m-1 d-flex align-items-center">
                                                    <div class="img_store">
                                                    <img src="images/cricket-ranking.png" alt="">
                                                    </div>
                                                    <div>
                                                        <a href="rankingsRecord.php" class="text-decoration-none text-dark fs-3">Batsman Ranking</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                                <div class="card flex-fill border-0 rounded bg-light illustration">
                                    <div class="card-body p-3 d-flex flex-fill">
                                        <div class="row g-0 w-100">
                                            <div class="col">
                                                <div class="p-3 m-1 d-flex align-items-center">
                                                    <div class="img_store">
                                                    <img src="images/cricket-ranking.png" alt="">
                                                    </div>
                                                    <div>
                                                        <a href="rankingsRecord2.php" class="text-decoration-none text-dark fs-3">Bowlers Ranking</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex">
                                <div class="card flex-fill border-0 rounded bg-light illustration">
                                    <div class="card-body p-3 d-flex flex-fill">
                                        <div class="row g-0 w-100">
                                            <div class="col">
                                                <div class="p-3 m-1 d-flex align-items-center">
                                                    <div class="img_store">
                                                    <img src="images/cricket-schedule.png" alt="">
                                                    </div>
                                                    <div>
                                                        <a href="scheduleRecord.php" class="text-decoration-none text-dark fs-3">Matches Schedule</a>
                                                    </div>
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