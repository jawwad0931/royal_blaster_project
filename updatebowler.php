<?php
session_start();
include 'config/conn.php';
include 'includes/header10.php';

if (isset($_GET['upd_bowler_id'])) {
    $Id_update = $_GET['upd_bowler_id'];
    $sql = "SELECT * FROM `bowler_career` WHERE id = $Id_update";
    $check_sql = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($check_sql)) {
        $NAMES = $row['NAMES'];
        $M = $row['M'];
        $INN = $row['INN'];
        $RUNS = $row['RUNS'];
        $WICKETS = $row['WICKETS'];
        $ECO = $row['ECO'];
    }
}


// for update data
if(isset($_GET['updatebowler'])){
    $id = $_GET['updatebowler'];
    $NAMES = $_POST['NAMES'];
    $M = $_POST['M'];
    $INN = $_POST['INN'];
    $RUNS = $_POST['RUNS'];
    $WICKETS = $_POST['WICKETS'];
    $ECO = $_POST['ECO'];

    $bowler_update = "UPDATE `bowler_career` SET `NAMES`='$NAMES',`M`='$M',`INN`='$INN',`RUNS`='$RUNS',`WICKETS`='$WICKETS',`ECO`='$ECO' WHERE id = $id";

    $check_query = mysqli_query($conn, $bowler_update);

    if(!$check_query){
        echo 'Error show';
    }else{
        $_SESSION['bowler_update']="Bowler Data has been updated!!";
        header("location: bowler_career.php");
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
                <form action="updatebowler.php?updatebowler=<?php echo $Id_update ?>" method="post" class="row g-3 p-4 needs-validation" id="passwordForm"
                    onsubmit="return validateForm()" novalidate>
                    <h5 class="text-secondary">Update Bowler status</h5>
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom01" class="form-label">Name</label>
                        <input type="text" class="form-control" id="validationCustom01" value="<?php echo $NAMES ?>" name="NAMES" required>
                        <div class="invalid-feedback">
                            Please fill name.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom02" class="form-label">Matches</label>
                        <input type="text" class="form-control" id="validationCustom02" value="<?php echo $M ?>" name="M" required>
                        <div class="invalid-feedback">
                            Please fill innings.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom03" class="form-label">Innings</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo  $INN  ?>" name="INN" required>
                        <div class="invalid-feedback">
                            Please fill Score.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom04" class="form-label">Runs</label>
                        <input type="text" class="form-control" id="validationCustom04" value="<?php echo $RUNS  ?>" name="RUNS" required>
                        <div class="invalid-feedback">
                            Please fill Highest Score.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom05" class="form-label">Wickets</label>
                        <input type="text" class="form-control" name="WICKETS" id="validationCustom05" value="<?php echo $WICKETS ?>" required>
                        <div class="invalid-feedback">
                            Please fill average.
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <label for="validationCustom06" class="form-label">Economy</label>
                        <input type="text" class="form-control" id="validationCustom06" value="<?php echo $ECO ?>" name="ECO" required>
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