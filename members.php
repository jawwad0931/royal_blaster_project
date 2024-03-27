<?php
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
        width: 60%;
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
<?php
include "includes/header16.php";
?>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row d-flex align-items-center justify-content-end">
            <div class="col-lg-3 col-sm-12 col-md-12">
                <div class="card my-3 p-3">
                    <h6 class="">Profile Detail</h6>
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
                                            <input type="text" class="form-control" id="validationCustom01"
                                                name="Name" required>
                                            <div class="invalid-feedback">
                                                Please fill Name.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom02" class="form-label">Play Role</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="playing_role"
                                                required>
                                            <div class="invalid-feedback">
                                                Please fill Play Role.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom03" class="form-label">Age</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                name="age" required>
                                            <div class="invalid-feedback">
                                                Please fill Age.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Sex</label>
                                            <input type="text" class="form-control" id="validationCustom04"
                                                name="sex" required>
                                            <div class="invalid-feedback">
                                                Please fill.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="validationCustom04"
                                                name="country" required>
                                            <div class="invalid-feedback">
                                                Please fill Country.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please fill Phone.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please fill Password.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom06" class="form-label">Matches</label>
                                            <input type="text" class="form-control" name="matches"
                                                id="validationCustom06" required>
                                            <div class="invalid-feedback">
                                                Please fill Matches.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom07" class="form-label">Innings</label>
                                            <input type="text" class="form-control" name="Innings"
                                                id="validationCustom07" required>
                                            <div class="invalid-feedback">
                                                Please fill Innings.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom08" class="form-label">Runs</label>
                                            <input type="text" class="form-control" name="runs"
                                                id="validationCustom08" required>
                                            <div class="invalid-feedback">
                                                Please fill Runs.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom09" class="form-label">Wickets</label>
                                            <input type="text" class="form-control" name="wickets"
                                                id="validationCustom09" required>
                                            <div class="invalid-feedback">
                                                Please fill Wickets.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom10" class="form-label">Highest Wickets</label>
                                            <input type="text" class="form-control" name="highest_wickets"
                                                id="validationCustom10" required>
                                            <div class="invalid-feedback">
                                                Please fill Highest Wickets.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom11" class="form-label">Average</label>
                                            <input type="text" class="form-control" name="average"
                                                id="validationCustom11" required>
                                            <div class="invalid-feedback">
                                                Please fill Average.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom12" class="form-label">Strike Rate</label>
                                            <input type="text" class="form-control" name="strike_rate"
                                                id="validationCustom12" required>
                                            <div class="invalid-feedback">
                                                Please fill Strike Rate.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom13" class="form-label">Economy</label>
                                            <input type="text" class="form-control" name="economy"
                                                id="validationCustom13" required>
                                            <div class="invalid-feedback">
                                                Please fill Economy.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Highest Score</label>
                                            <input type="text" class="form-control" name="highest_score"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Highest Score.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Batting</label>
                                            <input type="text" class="form-control" name="batting"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Batting.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Bowlings</label>
                                            <input type="text" class="form-control" name="balling"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Bowlings.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Address.
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid gap-2">
                                                <input class="btn btn-primary" name="AddPlayer" type="submit" value="Add Player">
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
                <div class="table-responsive p-3">
                    <table id="mytable" class="display p-2">
                    <?php 
                         if (isset($_SESSION["member_update"])) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                            echo $_SESSION["member_update"];
                            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            echo '</div>';
                            unset($_SESSION['member_update']);
                        }
                    ?> 
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Play Role</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Country</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>matches</th>
                                <th>batting</th>
                                <th>balling</th>
                                <th>Innings</th>
                                <th>runs</th>
                                <th>wickets</th>
                                <th>highest_wickets</th>
                                <th>highest_score</th>
                                <th>average</th>
                                <th>strike_rate</th>
                                <th>economy</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        // SQL query with JOIN
                        $fetchingData = "SELECT * FROM signup";
                        $checking_data = mysqli_query($conn, $fetchingData);

                        ?>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($checking_data)) {
                                echo "<tr>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["playing_role"] . "</td>";
                                echo "<td>" . $row["age"] . "</td>";
                                echo "<td>" . $row["sex"] . "</td>";
                                echo "<td>" . $row["country"] . "</td>";
                                echo "<td>" . $row["phone"] . "</td>";
                                echo "<td>" . $row["password"] . "</td>";
                                echo "<td>" . $row["matches"] . "</td>";
                                echo "<td>" . $row["batting"] . "</td>";
                                echo "<td>" . $row["balling"] . "</td>";
                                echo "<td>" . $row["Innings"] . "</td>";
                                echo "<td>" . $row["runs"] . "</td>";
                                echo "<td>" . $row["wickets"] . "</td>";
                                echo "<td>" . $row["highest_wickets"] . "</td>";
                                echo "<td>" . $row["highest_score"] . "</td>";
                                echo "<td>" . $row["average"] . "</td>";
                                echo "<td>" . $row["strike_rate"] . "</td>";
                                echo "<td>" . $row["economy"] . "</td>";
                                echo "<td>" . $row["address"] . "</td>";
                                echo '<td>
                                <a href="memberupdate.php?member_updid=' . $row["id"] . '" class="p-1"><i class="ion-edit text-success fs-4"></i></a>
                                <a href="delete.php?member_Delete_id=' . $row["id"] . '" class=""><i class="ion-trash-b text-danger fs-4"></i></a>
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
            $('#mytable').DataTable();
        });
    </script>
</body>

</html>