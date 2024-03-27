<?php
// include "includes/header8.php";
session_start();
include "config/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Asset/datatables.min.css">
    <!-- <link rel="stylesheet" href="boostrap/css/bootstrap.min.css"> -->
    <!-- for icon cdn path -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<!-- style start -->
<style>
    body {
        /* Set the background image  */
        background-image: url('images/stadium2.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }

    .profile_margin {
        margin-left: 10px;
    }

    .bg {
        background-color: white;
        opacity: 0.8;
    }

    .table-responsive {
        overflow-x: auto;
        max-width: 100%;
    }

    body {
        background-color: #f8f9fa;
        /* Light gray background */
    }

    .card {
        background-color: #fff;
        /* White card background */
        border: 1px solid #dee2e6;
        /* Light border */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Shadow */
    }

    .card-title {
        color: #007bff;
        /* Blue title text */
        margin-bottom: 1.5rem;
        /* Bottom margin */
    }

    .glow {
        animation: glow-animation 1s infinite alternate;
        /* Animation */
    }

    @keyframes glow-animation {
        0% {
            text-shadow: 0 0 10px #007bff;
            /* Initial shadow */
        }

        100% {
            text-shadow: 0 0 20px #007bff;
            /* Final shadow */
        }
    }

    .form-control-static {
        border: none;
        /* No border */
        background-color: transparent;
        /* Transparent background */
        font-weight: bold;
        /* Bold text */
        color: #343a40;
        /* Dark text color */
    }

    .form-control-static span {
        color: #6c757d;
        /* Dark gray text for span */
    }

    @media (max-width: 576px) {
        .table-responsive {
            max-height: 500px;
        }
    }
</style>
<!-- style end -->

<body class="">
    <div class="container-fluid">
        <div class="col-12 p-3" id="mySidenav">
            <a href="userdash.php" class="btn btn-primary" id="back"><i class="ion-android-arrow-back"></i></a>
        </div>
        <div class="row mt-5 d-flex justify-content-start shadow-div m-5 p-5">
            <!-- user profile code here -->
            <div class="col-lg-3 col-sm-12">
                <!-- here show session message -->
                <?php
                if (isset ($_SESSION["delete_message"])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"">';
                    echo $_SESSION["delete_message"];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                    unset($_SESSION['delete_message']);
                }
                if (isset ($_SESSION['bowler_update'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"">';
                    echo $_SESSION['bowler_update'];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                    unset($_SESSION['bowler_update']);
                }
                ?>

                <div class="card bg w-100">
                    <div class="card-body">
                        <?php
                        // SQL query with JOIN
                        $user_check_id = $_SESSION['user_auth']['id'];
                        $slt = "SELECT * from signup WHERE signup.Id = $user_check_id";
                        $checkquer = mysqli_query($conn, $slt);
                        if ($row = mysqli_fetch_assoc(($checkquer))) {
                            $Name = $row['Name'];
                            $playing_role = $row['playing_role'];
                            $age = $row['age'];
                            $sex = $row['sex'];
                            $country = $row['country'];
                            $phone = $row['phone'];
                            $batting = $row['batting'];
                            $balling = $row['balling'];
                            $address = $row['address'];
                        }
                        ?>
                        <h4 class="card-title">
                            <span class="glow">Player Profile</span>
                        </h4>
                        <div class="form-group row">
                            <label for="name" class="col-sm-6 col-form-label">Name:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="name" class="form-control-static">
                                    <span class="glow">
                                        <?php echo $Name ?>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="team" class="col-sm-6 col-form-label">Playing Role:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="team" class="form-control-static">
                                    <?php echo $playing_role ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="matches" class="col-sm-6 col-form-label">Age:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="matches" class="form-control-static">
                                    <?php echo $age ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="runs" class="col-sm-6 col-form-label">Sex:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="runs" class="form-control-static">
                                    <?php echo $sex ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wickets" class="col-sm-6 col-form-label">Country:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="wickets" class="form-control-static">
                                    <?php echo $country ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wickets" class="col-sm-6 col-form-label">Phone:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="wickets" class="form-control-static">
                                    <?php echo $phone ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wickets" class="col-sm-6 col-form-label">Batting Style:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="wickets" class="form-control-static">
                                    <?php echo $batting ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wickets" class="col-sm-6 col-form-label">Bowling Style:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="wickets" class="form-control-static">
                                    <?php echo $balling ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wickets" class="col-sm-6 col-form-label">Address:</label>
                            <div class="col-sm-6 mt-1">
                                <label id="wickets" class="form-control-static">
                                    <?php echo $address ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- user career status here -->
            <div class="col-lg-9 bg card">
            <div class="table-responsive p-3">
                    <table id="mytable" class="table table-striped table-hover">
                        <h4 class="glow text-primary">Player Career Status</h4>
                        <thead>
                            <tr>
                                <th>Matches</th>
                                <th>Innings</th>
                                <th>Runs Score</th>
                                <th>Wickets</th>
                                <th>Highest Wickets</th>
                                <th>Average</th>
                                <th>Strike Rate</th>
                                <th>Economy</th>
                                <th>Highest Score</th>
                            </tr>
                        </thead>
                        <?php
                        // SQL query with JOIN
                        $user_check_id = $_SESSION['user_auth']['id'];
                        $slt = "SELECT * from signup WHERE signup.Id = $user_check_id";
                        $checkquer = mysqli_query($conn, $slt);

                        ?>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($checkquer)) {
                                echo "<tr>";
                                echo "<td>" . $row["matches"] . "</td>";
                                echo "<td>" . $row["Innings"] . "</td>";
                                echo "<td>" . $row["runs"] . "</td>";
                                echo "<td>" . $row["wickets"] . "</td>";
                                echo "<td>" . $row["highest_wickets"] . "</td>";
                                echo "<td>" . $row["average"] . "</td>";
                                echo "<td>" . $row["strike_rate"] . "</td>";
                                echo "<td>" . $row["economy"] . "</td>";
                                echo "<td>" . $row["highest_score"] . "</td>";
                                // echo '<td>
                                // <a href="delete.php?member_Delete_id=' . $row["id"] . '" class=""><i class="ion-trash-b text-danger fs-4"></i></a>
                                // </td>';
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- DataTables JavaScript -->
    <script src="Asset/datatables.min.js"></script>
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!-- DataTable initialization -->
    <script>


        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        // password validation
        function validateForm() {
            var passwordInput = document.getElementById("password");
            var passwordError = document.getElementById("passwordError");
            var password = passwordInput.value;

            if (password.length < 8) {
                passwordInput.classList.add("is-invalid");
                passwordError.style.display = "block";
                return false;
            } else {
                passwordInput.classList.remove("is-invalid");
                passwordError.style.display = "none";
                return true;
            }
        }
    </script>
</body>

</html>