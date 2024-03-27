<?php
session_start();
include 'config/conn.php';
include 'includes/header13.php';

if (isset ($_GET['bat_update_id'])) {
    $Id_update = $_GET['bat_update_id'];
    $sql = "SELECT * FROM `batting_ranks` WHERE Id = $Id_update";
    $check_sql = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($check_sql)) {
        $Ranks = $row['Ranks'];
        $batsman_photo = $row['batsman_photo'];
        $Batsman_name = $row['Batsman_name'];
        $rating = $row['rating'];

    }
}


// for update data
if (isset ($_GET['update_rank'])) {
    $id = $_GET['update_rank'];
    echo $id;
    $Ranks = $_POST['Ranks'];
    $Batsman_name = $_POST['Batsman_name'];
    $rating = $_POST['rating'];
    // Image Update code 
    $batsman_photo = $_FILES['batsman_photo']['name'];
    $temp_name = $_FILES['batsman_photo']['tmp_name'];
    $folder = "images/" . $batsman_photo;
    if (move_uploaded_file($temp_name, $folder)) {
        include 'config/conn.php';
        $batsman_rank_update = "UPDATE `batting_ranks` SET `Ranks`='$Ranks',`batsman_photo`='$folder',`Batsman_name`='$Batsman_name',`rating`='$rating' WHERE Id = $id";
        $check_query = mysqli_query($conn, $batsman_rank_update);
        if (!$check_query) {
            echo 'Error show';
        } else {
            header("location: batsmanranking.php");
            $_SESSION['update'] = "Batsman Rank data has been updated";
            exit (0);
        }
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
                <form action="update_bat_rank.php?update_rank=<?php echo $Id_update ?>" method="post"
                    class="row g-3 p-4 needs-validation" id="passwordForm" onsubmit="return validateForm()" novalidate enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Rank</label>
                        <input type="text" class="form-control" id="validationCustom01" value="<?php echo $Ranks ?>" name="Ranks" required>
                        <div class="invalid-feedback">
                            Please fill batsman rank.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom05" class="form-label">Batsman Image</label>
                        <input type="file" class="form-control" name="batsman_photo" value="<?php echo $batsman_photo ?>" id="validationCustom05" required>
                        <div class="invalid-feedback">
                            Please insert batsman image.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom05" class="form-label">Batsman Name</label>
                        <input type="text" class="form-control" name="Batsman_name" value="<?php echo $Batsman_name ?>" id="validationCustom05" required>
                        <div class="invalid-feedback">
                            Please fill batsman Name.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom06" class="form-label">Rating</label>
                        <input type="text" class="form-control" id="validationCustom06" value="<?php echo $rating ?>" name="rating" required>
                        <div class="invalid-feedback">
                            Please fill rating.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" name="add_batsman_ranking" type="submit">Add Player</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>