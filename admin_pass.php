<?php 
    session_start();
    include 'config/conn.php';
    include 'includes/header15.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Asset/datatables.min.css">
     <!-- google font family -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="boostrap/css/bootstrap.min.css"> -->
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
        font-family: "Buenard", serif;
        font-weight: 400;
        font-style: normal;
    }

    .bg {
        background-color: white;
        opacity: 0.8;
    }

    .shadow-div{
        width: 500px;
        margin: 100px;
    }

    .table-responsive {
    overflow-x: auto;
    max-width: 100%;
    }
    @media (max-width: 576px) {
    .table-responsive {
        max-height: 500px;
        width: 300px;
    }
    .shadow-div{
        width: 300px;
        margin: 12px;
    }
}
</style>
<!-- style end -->

<body class="">
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-start shadow-div">
            <div class="col-lg-11 col-sm-12 bg">
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
                    <table class="table table-striped table-bordered m-3 p-2">
                    <thead>
                        <tr>
                            <th>Change Admin Name</th>
                            <th>Change Admin Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $fetch_admin_data = "SELECT * FROM `admin`";
                    $checking_admin = mysqli_query($conn, $fetch_admin_data);
                    ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($checking_admin)) {
                            echo "<tr>";
                            echo "<td>" . $row["admin_name"] . "</td>";
                            echo "<td>" . $row["admin_pass"] . "</td>";
                            echo '<td class="">
                                <a href="update_admin.php?update_admin_data=' . $row["Id"] . '" class="p-1"><i class="ion-edit text-success fs-4"></i></a>
                            </td>';
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