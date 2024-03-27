<?php
session_start();
include 'config/conn.php';
?>
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// Check if the form is submitted
if (isset($_POST['signup'])) {
    // Check if the selected_option is set in the POST data
    if (isset($_POST["agree_terms"])) {
        // Get the selected option value
        $Name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirm_password'];
        $batting = $_POST['batting'];
        $balling = $_POST['balling'];
        $playing_role = $_POST['playing_role'];
        $address = $_POST['address'];
        $agree_terms = isset($_POST['agree_terms']) ? 1 : 0;


        // password & confirm password check
        if($password == $confirmpassword){
            // Prepare an SQL statement to insert data into your table (replace 'your_table' with your table name)
            $sql = "INSERT INTO `signup` (`Name`, `playing_role`, `age`, `sex`, `country`, `phone`, `password`, `batting`, `balling`, `address`,`agree_terms`) VALUES ('$Name', '$playing_role', '$age', '$sex', '$country', '$phone', '$password', '$batting', '$balling','$address',$agree_terms)";
            $checkquery = mysqli_query($conn, $sql);

            if($checkquery){
                header("location: user.php");
                exit(0);
            }
        }else{
            $_SESSION['pass_check'] = "Confirm password not match";
            header("location: sign.php");
            exit(0);
    }
    }else{
        header("location: sign.php");
        exit(0);
    }
}
// for edit user-profile
 // for edit player
        // AddPlayer
        if (isset($_POST['AddPlayer'])) {
            $Name = $_POST['Name'];
            $playing_role = $_POST['playing_role'];
            $age = $_POST['age'];
            $sex = $_POST['sex'];
            $country = $_POST['country'];
            $phone = $_POST['phone'];
            $password  = $_POST['password'];
            $matches  = $_POST['matches'];
            $Innings  = $_POST['Innings'];
            $runs  = $_POST['runs'];
            $wickets  = $_POST['wickets'];
            $highest_wickets  = $_POST['highest_wickets'];
            $average  = $_POST['average'];
            $strike_rate  = $_POST['strike_rate'];
            $economy  = $_POST['economy'];
            $highest_score  = $_POST['highest_score'];
            $batting  = $_POST['batting'];
            $balling  = $_POST['balling'];
            $address  = $_POST['address'];



    
            $sql = "INSERT INTO `signup`(`Name`, `playing_role`, `age`, `sex`, `country`, `phone`, `password`, `matches`,
            `Innings`, `runs`, `wickets`, `highest_wickets`, `average`, `strike_rate`, `economy`, `highest_score`,
            `batting`, `balling`, `address`)
             VALUES ('$Name','$playing_role','$age','$sex','$country','$phone','$password','$matches','$Innings',
             '$runs','$wickets','$highest_wickets','$average','$strike_rate','$economy','$highest_score','$batting',
             '$balling','$address')";

            
            $checkquery = mysqli_query($conn, $sql);
    
                if($checkquery){
                    header("location: members.php");
                    exit(0);
                }else{
                    echo "not connected";
                }
            }


// for adding batsman in modal
if (isset($_POST['AddBatsman'])) {
        $name = $_POST['name'];
        $matches_played = $_POST['matches_played'];
        $innings_batted = $_POST['innings_batted'];
        $runs_scored = $_POST['runs_scored'];
        $highest_score = $_POST['highest_score'];
        $average = $_POST['average'];
        $strike_rate = $_POST['strike_rate'];

        $batsmansql = "INSERT INTO `batsman_career` (`name`, `matches_played`, `innings_batted`, `runs_scored`, `highest_score`, `average`, `strike_rate`) VALUES ('$name', '$matches_played', '$innings_batted', '$runs_scored','$highest_score','$average','$strike_rate' )";
        
        $Batsmancheckquery = mysqli_query($conn, $batsmansql);

            if($Batsmancheckquery){
                header("location: batsman_career.php");
                exit(0);
            }
        }

// for adding bowler in modal
if (isset($_POST['AddBowler'])) {
        $NAMES = $_POST['NAMES'];
        $M = $_POST['M'];
        $INN = $_POST['INN'];
        $RUNS = $_POST['RUNS'];
        $WICKETS = $_POST['WICKETS'];
        $ECO = $_POST['ECO'];

        $bowlersql = "INSERT INTO `bowler_career`(`NAMES`, `M`, `INN`, `RUNS`, `WICKETS`, `ECO`) VALUES ('$NAMES','$M','$INN','$RUNS','$WICKETS','$ECO')";
        
        $Bowlercheckquery = mysqli_query($conn, $bowlersql);

            if($Bowlercheckquery){
                header("location: bowler_career.php");
                exit(0);
            }else{
                echo "not connected";
            }
        }


        // for adding a schedule
        if (isset($_POST['AddSchedule'])) {
                $date = $_POST['date'];
                $team1 = $_POST['team1'];
                $team2 = $_POST['team2'];
                $result = $_POST['result'];

                        
                $bowlersql = "INSERT INTO `schedule`(`date`, `team1`, `team2`,`result`) VALUES ('$date','$team1','$team2','$result')";
                
                $Schedulecheckquery = mysqli_query($conn, $bowlersql);
        
                    if($Schedulecheckquery){
                        $_SESSION['schedule']="Schedule Added";
                        header("location: schedule.php");
                        exit(0);
                    }else{
                        echo "not connected";
                    }
                }



        // for adding batsman ranking
        if(isset($_POST['add_batsman_ranking'])){
            $Ranks = $_POST['Ranks'];
            $Batsman_name = $_POST['Batsman_name'];
            $rating = $_POST['rating'];
            // uploading file code using super global file method
            $batsman_file_name = $_FILES['batsman_photo']['name'];
            $temp_name = $_FILES['batsman_photo']['tmp_name'];  // Corrected variable name
            $folder = "images/" . $batsman_file_name; // Corrected folder path

            if(move_uploaded_file($temp_name, $folder)){
                include 'config/conn.php'; // Assuming you're including database connection here

                // Check file size agar file size bara hoga matlab uska naam zyada bara hoga tou yeh condition lagoo hogi
                if ($_FILES["batsman_file_name"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            }
            $check_batsman_ranking_query = "INSERT INTO `batting_ranks`(`Ranks`, `batsman_photo`, `Batsman_name`, `rating`) VALUES ('$Ranks','$folder','$Batsman_name','$rating')";

            $batsman_ranking_check = mysqli_query($conn, $check_batsman_ranking_query);

            if($batsman_ranking_check){
                header("location: batsmanranking.php");
                exit(0);
            }
        }


        // for adding bowler ranking 
        if(isset($_POST['add_bowler_ranking'])){
            $Ranks = $_POST['Ranks'];
            $Bowler_Name = $_POST['Bowler_Name'];
            $Rating = $_POST['Rating'];
            // uploading file code using super global file method
            $bowler_file_name = $_FILES['bowler_image']['name'];
            $temp_names = $_FILES['bowler_image']['tmp_name'];  // Corrected variable name
            $folders = "images/" . $bowler_file_name; // Corrected folder path

            if(move_uploaded_file($temp_names, $folders)){
                include 'config/conn.php'; // Assuming you're including database connection here

                // Check file size agar file size bara hoga matlab uska naam zyada bara hoga tou yeh condition lagoo hogi
                if ($_FILES["bowler_file_name"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
            }
            $check_bowler_ranking_query = "INSERT INTO `bowler_ranks`(`Ranks`, `bowler_image`, `Bowler_Name`, `Rating`) VALUES ('$Ranks','$folders','$Bowler_Name','$Rating')";

            $bowler_ranking_check = mysqli_query($conn, $check_bowler_ranking_query);

            if($bowler_ranking_check){
                header("location: bowlerranking.php");
                exit(0);
            }
        }


        // for edit player
        // AddPlayer
        if (isset($_POST['AddPlayer'])) {
            $Matches = $_POST['Matches'];
            $Runs = $_POST['Runs'];
            $Wickets = $_POST['Wickets'];
            $Average = $_POST['Average'];
            $Highest_Wickets = $_POST['Highest_Wickets'];
            $Highest_Score = $_POST['Highest_Score'];
            $User_id_fk  = $_POST['User_id_fk'];

    
            $sql = "INSERT INTO `career_Status`(`Matches`, `Runs`, `Wickets`, `Average`, `Highest_Wickets`, `Highest_Score`,User_id_fk)
             VALUES ('$Matches','$Runs','$Wickets','$Average','$Highest_Wickets','$Highest_Score','$User_id_fk')";
            
            $checkquery = mysqli_query($conn, $sql);
    
                if($checkquery){
                    header("location: player-profile.php");
                    exit(0);
                }else{
                    echo "not connected";
                }
            }


?>


