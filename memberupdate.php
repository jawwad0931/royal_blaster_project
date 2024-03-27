<?php
session_start();
include 'config/conn.php';
include 'includes/header10.php';

if (isset($_GET['member_updid'])) {
    $Id_update = $_GET['member_updid'];
    $sql = "SELECT * FROM `signup` WHERE id = $Id_update";
    $check_sql = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($check_sql)) {
        $Name = $row['Name'];
        $playing_role = $row['playing_role'];
        $age = $row['age'];
        $sex = $row['sex'];
        $country = $row['country'];
        $phone = $row['phone'];
        $password = $row['password'];
        $matches = $row['matches'];
        $Innings = $row['Innings'];
        $runs = $row['runs'];
        $wickets = $row['wickets'];
        $highest_wickets = $row['highest_wickets'];
        $average = $row['average'];
        $strike_rate = $row['strike_rate'];
        $economy = $row['economy'];
        $highest_score = $row['highest_score'];
        $batting = $row['batting'];
        $balling = $row['balling'];
        $address = $row['address'];


    }
}


// for update data
if(isset($_GET['updatemember_id'])){
    $id = $_GET['updatemember_id'];
    $Name = $_POST['Name'];
    $playing_role = $_POST['playing_role'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $matches = $_POST['matches'];
    $Innings = $_POST['Innings'];
    $runs = $_POST['runs'];
    $wickets = $_POST['wickets'];
    $highest_wickets = $_POST['highest_wickets'];
    $average = $_POST['average'];
    $strike_rate = $_POST['strike_rate'];
    $economy = $_POST['economy'];
    $highest_score = $_POST['hi$highest_score'];
    $batting = $_POST['batting'];
    $balling = $_POST['balling'];
    $address = $_POST['address'];



    $member_update = "UPDATE `signup` SET `Name`='$Name',`playing_role`='$playing_role',
    `age`='$age',`sex`='$sex',`country`='$country',`phone`='$phone',`password`='$password',
    `matches`='$matches',`Innings`='$Innings',`runs`='$runs',`wickets`='$wickets',
    `highest_wickets`='$highest_wickets',`average`='$average',`strike_rate`='$strike_rate',`economy`='$economy',
    `highest_score`='$highest_score',`batting`='$batting',`balling`='$balling',`address`='$address'
    WHERE id = $id";

    $check_query = mysqli_query($conn, $member_update);

    if(!$check_query){
        echo 'Error show';
    }else{
        $_SESSION['member_update']="Member Data has been updated!!";
        header("location: members.php");
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
                <form action="memberupdate.php?updatemember_id=<?php echo $Id_update ?>" method="post" class="row g-3 p-4 needs-validation" id="passwordForm"
                    onsubmit="return validateForm()" novalidate>
                    <h5 class="text-secondary">Update Users Details</h5>
                    <hr>
                    <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $Name ?>" id="validationCustom01"
                                                name="Name" required>
                                            <div class="invalid-feedback">
                                                Please fill Name.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom02" class="form-label">Play Role</label>
                                            <input type="text" class="form-control" value="<?php echo $playing_role ?>" id="validationCustom02" name="playing_role"
                                                required>
                                            <div class="invalid-feedback">
                                                Please fill Play Role.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom03" class="form-label">Age</label>
                                            <input type="text" class="form-control" value="<?php echo $age ?>" id="validationCustom03"
                                                name="age" required>
                                            <div class="invalid-feedback">
                                                Please fill Age.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Sex</label>
                                            <input type="text" class="form-control" value="<?php echo $sex ?>" id="validationCustom04"
                                                name="sex" required>
                                            <div class="invalid-feedback">
                                                Please fill.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Country</label>
                                            <input type="text" class="form-control" value="<?php echo $country ?>" id="validationCustom04"
                                                name="country" required>
                                            <div class="invalid-feedback">
                                                Please fill Country.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label">Phone</label>
                                            <input type="text" class="form-control" value="<?php echo $phone ?>" name="phone"
                                                id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please fill Phone.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom05" class="form-label">Password</label>
                                            <input type="text" class="form-control" value="<?php echo $password ?>" name="password"
                                                id="validationCustom05" required>
                                            <div class="invalid-feedback">
                                                Please fill Password.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom06" class="form-label">Matches</label>
                                            <input type="text" class="form-control" value="<?php echo $matches ?>" name="matches"
                                                id="validationCustom06" required>
                                            <div class="invalid-feedback">
                                                Please fill Matches.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom07" class="form-label">Innings</label>
                                            <input type="text" class="form-control" value="<?php echo $Innings ?>" name="Innings"
                                                id="validationCustom07" required>
                                            <div class="invalid-feedback">
                                                Please fill Innings.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom08" class="form-label">Runs</label>
                                            <input type="text" class="form-control" value="<?php echo $runs ?>" name="runs"
                                                id="validationCustom08" required>
                                            <div class="invalid-feedback">
                                                Please fill Runs.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom09" class="form-label">Wickets</label>
                                            <input type="text" class="form-control" value="<?php echo $wickets ?>" name="wickets"
                                                id="validationCustom09" required>
                                            <div class="invalid-feedback">
                                                Please fill Wickets.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom10" class="form-label">Highest Wickets</label>
                                            <input type="text" class="form-control" value="<?php echo $highest_wickets ?>" name="highest_wickets"
                                                id="validationCustom10" required>
                                            <div class="invalid-feedback">
                                                Please fill Highest Wickets.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom11" class="form-label">Average</label>
                                            <input type="text" class="form-control" value="<?php echo $average ?>" name="average"
                                                id="validationCustom11" required>
                                            <div class="invalid-feedback">
                                                Please fill Average.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom12" class="form-label">Strike Rate</label>
                                            <input type="text" class="form-control" value="<?php echo $strike_rate ?>" name="strike_rate"
                                                id="validationCustom12" required>
                                            <div class="invalid-feedback">
                                                Please fill Strike Rate.
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                            <label for="validationCustom13" class="form-label">Economy</label>
                                            <input type="text" class="form-control" value="<?php echo $economy ?>" name="economy"
                                                id="validationCustom13" required>
                                            <div class="invalid-feedback">
                                                Please fill Economy.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Highest Score</label>
                                            <input type="text" class="form-control" value="<?php echo $highest_score ?>" name="highest_score"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Highest Score.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Batting</label>
                                            <input type="text" class="form-control" value="<?php echo $batting ?>" name="batting"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Batting.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Bowlings</label>
                                            <input type="text" class="form-control" value="<?php echo $balling ?>" name="balling"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Bowlings.
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom14" class="form-label">Address</label>
                                            <input type="text" class="form-control" value="<?php echo $address ?>" name="address"
                                                id="validationCustom14" required>
                                            <div class="invalid-feedback">
                                                Please fill Address.
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