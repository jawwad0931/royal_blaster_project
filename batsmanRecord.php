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

    .bg {
        background-color: white;
        opacity: 0.8;
    }

    .table-responsive {
    overflow-x: auto;
    max-width: 100%;
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
        <div class="row mt-3 p-2 d-flex align-items-center justify-content-center shadow-div">
            <div class="col-lg-11 col-sm-12 p-2 bg">
                        <?php
                        if (isset($_SESSION["delete_message"])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"">';
                            echo $_SESSION["delete_message"];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                            unset($_SESSION['delete_message']);
                        }
                        if (isset($_SESSION['update'])) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert"">';
                            echo $_SESSION['update'];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                            unset($_SESSION['update']);
                        }
                        ?>
                    <div class="table-responsive p-3">
                    <table id="batsman_table" class="display m-3 p-3">
                    <h3 class="text-secondary">Batsman Career lists</h3>
                    <hr>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Matches</th>
                            <th>Innings</th>
                            <th>Runs Score</th>
                            <th>Highest Score</th>
                            <th>Average</th>
                            <th>Strike Rate</th>
                        </tr>
                    </thead>
                    <?php
                    $fetchingBatsmanData = "SELECT * FROM `batsman_career`";
                    $checking_batsman_data = mysqli_query($conn, $fetchingBatsmanData);
                    ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($checking_batsman_data)) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["matches_played"] . "</td>";
                            echo "<td>" . $row["innings_batted"] . "</td>";
                            echo "<td>" . $row["runs_scored"] . "</td>";
                            echo "<td>" . $row["highest_score"] . "</td>";
                            echo "<td>" . $row["average"] . "</td>";
                            echo "<td>" . $row["strike_rate"] . "</td>";
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
        $(document).ready(function () {
            $('#batsman_table').DataTable();
        });


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