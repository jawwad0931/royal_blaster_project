<?php
include "includes/header9.php";
session_start();
include "config/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Asset/datatables.min.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <!-- google font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
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

<body class="bg-light">
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-end">
            <div class="col-lg-3 col-sm-12 col-md-12">
                <div class="card my-3 p-3">
                    <h6 class="">Add New Bowler</h6>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add <i class="ion-plus-circled"></i>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Player</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="signcode.php" method="post" class="row g-3 p-4 needs-validation"
                                        id="passwordForm" onsubmit="return validateForm()" novalidate>
                                        <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="NAMES"
                                                required>
                                            <div class="invalid-feedback">
                                                Please fill name.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom02" class="form-label">Matches</label>
                                            <input type="text" class="form-control" id="validationCustom02"
                                                name="M" required>
                                            <div class="invalid-feedback">
                                                Please fill innings.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom03" class="form-label">Innings</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                name="INN" required>
                                            <div class="invalid-feedback">
                                                Please fill Score.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Runs</label>
                                            <input type="text" class="form-control" id="validationCustom04"
                                                name="RUNS" required>
                                            <div class="invalid-feedback">
                                                Please fill Highest Score.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label">Wickets</label>
                                            <input type="text" class="form-control" name="WICKETS"
                                                id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please fill wickets.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom06" class="form-label">Economy</label>
                                            <input type="number" class="form-control" id="validationCustom06"
                                                name="ECO" required>
                                            <div class="invalid-feedback">
                                                Please fill strike rate.
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2">
                                                <button class="btn btn-primary" name="AddBowler" type="submit">Add
                                                    Player</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 d-flex align-items-center justify-content-end shadow-div">
            <div class="col-lg-11 col-sm-12 p-2 bg">
                <!-- here show session message -->
                <?php
                if (isset($_SESSION["delete_message"])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"">';
                    echo $_SESSION["delete_message"];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                    unset($_SESSION['delete_message']);
                }
                if (isset($_SESSION['bowler_update'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"">';
                    echo $_SESSION['bowler_update'];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                    unset($_SESSION['bowler_update']);
                }
                ?>
                <div class="table-responsive p-3">
                <table id="bowler_table" class="display p-2">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Matches</th>
                            <th>Innings</th>
                            <th>Runs Score</th>
                            <th>Wickets</th>
                            <th>Economy</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    $fetchingbowlerData = "SELECT * FROM `bowler_career`";
                    $checking_bowler_data = mysqli_query($conn, $fetchingbowlerData);
                    ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($checking_bowler_data)) {
                            echo "<tr>";
                            echo "<td>" . $row["NAMES"] . "</td>";
                            echo "<td>" . $row["M"] . "</td>";
                            echo "<td>" . $row["INN"] . "</td>";
                            echo "<td>" . $row["RUNS"] . "</td>";
                            echo "<td>" . $row["WICKETS"] . "</td>";
                            echo "<td>" . $row["ECO"] . "</td>";
                            echo '<td>
                            <a href="delete.php?bowler_id=' . $row["id"] . '" class="p-1"><i class="ion-trash-b text-danger fs-3"></i></a>
                            <a href="updatebowler.php?upd_bowler_id=' . $row["id"] . '" class="p-1"><i class="ion-edit text-success fs-4"></i></a>
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
    //
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
            $('#bowler_table').DataTable();
        });
    </script>
</body>

</html>