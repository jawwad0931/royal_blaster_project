<?php
session_start();
include 'config/conn.php';
include 'includes/header14.php';

if (isset ($_GET['update_ball_id'])) {
    $Id_update = $_GET['update_ball_id'];
    $sql = "SELECT * FROM `bowler_ranks` WHERE Id = $Id_update";
    $check_sql = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($check_sql)) {
        $Ranks = $row['Ranks'];
        $bowler_image = $row['bowler_image'];
        $Bowler_Name = $row['Bowler_Name'];
        $Rating = $row['Rating'];

    }
}


// for update data
if (isset ($_GET['update_ball_rank'])) {
    $id = $_GET['update_ball_rank'];
    $Ranks = $_POST['Ranks'];
    $Bowler_Name = $_POST['Bowler_Name'];
    $Rating = $_POST['Rating'];
    // Image Update code 
    $bowler_image = $_FILES['bowler_image']['name'];
    $temp_name = $_FILES['bowler_image']['tmp_name'];
    $folder = "images/" . $bowler_image;
    if (move_uploaded_file($temp_name, $folder)) {
        include 'config/conn.php';
        $batsman_rank_update = "UPDATE `bowler_ranks` SET `Ranks`='$Ranks',`bowler_image`='$folder',`Bowler_Name`='$Bowler_Name',`Rating`='$Rating' WHERE Id = $id";
        $check_query = mysqli_query($conn, $batsman_rank_update);
        if (!$check_query) {
            echo 'Error show';
        } else {
            $_SESSION['update'] = "Bowler Rank data has been updated";
            header("location: bowlerranking.php");
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
                <div class="w-100 px-4 py-5 border">
                <form action="update_ball_rank.php?update_ball_rank=<?php echo $Id_update ?>" method="post" id="passwordForm" onsubmit="return validateForm()"  enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Rank</label>
                        <input type="text" class="form-control" id="validationCustom01" value="<?php echo $Ranks ?>" name="Ranks" required>
                        <div class="invalid-feedback">
                            Please fill batsman rank.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom05" class="form-label">Bowler Image</label>
                        <input type="file" class="form-control" name="bowler_image" value="<?php echo $bowler_image ?>" id="validationCustom05" required>
                        <div class="invalid-feedback">
                            Please insert bowler image.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom05" class="form-label">Bowler Name</label>
                        <input type="text" class="form-control" name="Bowler_Name" value="<?php echo $Bowler_Name ?>" id="validationCustom05" required>
                        <div class="invalid-feedback">
                            Please fill batsman Name.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom06" class="form-label">Rating</label>
                        <input type="text" class="form-control" id="validationCustom06" value="<?php echo $Rating ?>" name="Rating" required>
                        <div class="invalid-feedback">
                            Please fill rating.
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" name="add_bowler_ranking" type="submit">Add Player</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    function validateForm() {
    return true;
    }
    </script>
</body>

</html>