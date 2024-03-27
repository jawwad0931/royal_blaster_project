<?php
session_start();
include 'config/conn.php';
include 'includes/header10.php';

if (isset($_GET['updid'])) {
    $Id_update = $_GET['updid'];
    $sql = "SELECT * FROM `batsman_career` WHERE id = $Id_update";
    $check_sql = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($check_sql)) {
        $name = $row['name'];
        $matches_played = $row['matches_played'];
        $innings_batted = $row['innings_batted'];
        $runs_scored = $row['runs_scored'];
        $highest_score = $row['highest_score'];
        $average = $row['average'];
        $strike_rate = $row['strike_rate'];
    }
}


// for update data
if(isset($_GET['updatebatsman'])){
    $id = $_GET['updatebatsman'];
    $name = $_POST['name'];
    $matches_played = $_POST['matches_played'];
    $innings_batted = $_POST['innings_batted'];
    $runs_scored = $_POST['runs_scored'];
    $highest_score = $_POST['highest_score'];
    $average = $_POST['average'];
    $strike_rate = $_POST['strike_rate'];

    $batsman_update = "UPDATE `batsman_career` SET `name`='$name',`matches_played`='$matches_played',`innings_batted`='$innings_batted',`runs_scored`='$runs_scored',`highest_score`='$highest_score',`average`='$average',`strike_rate`='$strike_rate' WHERE id = $id";

    $check_query = mysqli_query($conn, $batsman_update);

    if(!$check_query){
        echo 'Error show';
    }else{
        $_SESSION['update']="Batsman data has been updated";
        header("location: batsman_career.php");
        exit(0);
    }





}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="updatebatsman.php?updatebatsman=<?php echo $Id_update ?>" method="post" class="row g-3 p-4 needs-validation" id="passwordForm"
                    onsubmit="return validateForm()" novalidate>
                    <h5 class="text-secondary">Update Batsman status</h5>
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control" id="validationCustom01" value="<?php echo $name ?>" name="name" required>
                        <div class="invalid-feedback">
                            Please fill name.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom02" class="form-label">Matches</label>
                        <input type="text" class="form-control" id="validationCustom02" value="<?php echo $matches_played ?>" name="matches_played" required>
                        <div class="invalid-feedback">
                            Please fill innings.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom03" class="form-label">Innings</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo  $innings_batted  ?>" name="innings_batted" required>
                        <div class="invalid-feedback">
                            Please fill Score.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom04" class="form-label">Run score</label>
                        <input type="text" class="form-control" id="validationCustom04" value="<?php echo $runs_scored  ?>" name="runs_scored" required>
                        <div class="invalid-feedback">
                            Please fill Runs Score.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom04" class="form-label">Highest score</label>
                        <input type="text" class="form-control" id="validationCustom04" value="<?php echo $highest_score  ?>" name="highest_score" required>
                        <div class="invalid-feedback">
                            Please fill Highest Score.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom05" class="form-label">Average</label>
                        <input type="text" class="form-control" name="average" id="validationCustom05" value="<?php echo $average ?>" required>
                        <div class="invalid-feedback">
                            Please fill average.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom06" class="form-label">Strike rate</label>
                        <input type="text" class="form-control" id="validationCustom06" value="<?php echo $strike_rate ?>" name="strike_rate" required>
                        <div class="invalid-feedback">
                            Please fill strike rate.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" name="AddBatsman" type="submit">Edit Player</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>