<?php
session_start();
include 'config/conn.php';
include 'includes/header10.php';

if (isset($_GET['updid'])) {
    $Id_update = $_GET['updid'];
    $sql = "SELECT * FROM `schedule` WHERE id = $Id_update";
    $check_sql = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($check_sql)) {
        $date = $row['date'];
        $team1 = $row['team1'];
        $team2 = $row['team2'];
        $result = $row['result'];
    }
}


// for update data
if(isset($_GET['updateSchedule'])){
    $id = $_GET['updateSchedule'];
    $date = $_POST['date'];
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];
    $result = $_POST['result'];

    $schedule_update = "UPDATE `schedule` SET `date`='$date',`team1`='$team1',`team2`='$team2',`result`='$result' WHERE id = $id";

    $check_query = mysqli_query($conn, $schedule_update);

    if(!$check_query){
        echo 'Error show';
    }else{
        $_SESSION['Schedule_update']="Schedule has been updated!!";
        header("location: schedule.php");
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
                <form action="UpdateSchedule.php?updateSchedule=<?php echo $Id_update ?>" method="post" class="row g-3 p-4 needs-validation" id="passwordForm"
                    onsubmit="return validateForm()" novalidate>
                    <h5 class="text-secondary">Update Schedule</h5>
                    <hr>
                    <?php
                if (isset ($_SESSION["schedule"])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"">';
                    echo $_SESSION["schedule"];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '</div>';
                    unset($_SESSION['schedule']);
                }
                ?>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Date</label>
                    <input type="date" class="form-control" id="validationCustom01" value="<?php echo $date ?>" name="date" required>
                    <div class="invalid-feedback">
                        Please fill date.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Team 1</label>
                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $team1 ?>" name="team1" required>
                    <div class="invalid-feedback">
                        Please fill team1 name.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Team 2</label>
                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $team2 ?>" name="team2" required>
                    <div class="invalid-feedback">
                        Please fill team2 name.
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Result</label>
                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $result ?>" name="result" required>
                    <div class="invalid-feedback">
                        Please fill Result.
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary my-2" name="AddSchedule" type="submit">New Schedule</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>