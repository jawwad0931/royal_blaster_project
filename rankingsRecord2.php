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
        <div class="row mt-5 d-flex align-items-center justify-content-center shadow-div">
            <div class="col-lg-11 col-sm-12 p-2 bg">
                        <?php
                        if (isset($_SESSION["ball_ranking"])) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"">';
                            echo $_SESSION["ball_ranking"];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                            unset($_SESSION['ball_ranking']);
                        }
                        ?>
                    <div class="table-responsive p-3">
                    <table id="record2table" class="display m-3 p-2">
                    <h3 class="text-secondary">Bowlers Rank</h3>
                    <hr>
                    <thead>
                        <tr>
                            <th>Ranks</th>
                            <th>Bowler Name</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <?php
                    $fetchingbowlerrank = "SELECT * FROM `bowler_ranks`";
                    $checking_bowler_rank = mysqli_query($conn, $fetchingbowlerrank);
                    ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($checking_bowler_rank)) {
                            echo "<tr>";
                            echo "<td>" . $row["Ranks"] . "</td>";
                            echo "<td class='d-flex align-items-center justify-content-start'>";
                            echo "<img src='" . $row["bowler_image"]. "' class='rounded-circle' height='50px' width='50px' >" . "<h6 class='my-3 mx-4'>" . $row['Bowler_Name'] . "</h6>";
                            echo "</td>";
                            echo "<td>" . $row["Rating"] . "</td>";
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
            $('#record2table').DataTable();
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