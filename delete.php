<?php 
    session_start();
    require "config/conn.php";
?>
<?php 
    // for batsman career
    if(isset($_GET["id"])){
        $batsman_dlt_id = $_GET["id"];
        // echo "<p>ID: $id</p>";
        $batsman_career_dlt = "DELETE FROM `batsman_career` WHERE id = $batsman_dlt_id";
        $result = mysqli_query($conn, $batsman_career_dlt);

        if($result){
            $_SESSION['delete_message']="You data has been successfully deleted";
            header("location: batsman_career.php");
            exit(0);
        }
    }


    // for bowler career
    if(isset($_GET["bowler_id"])){
        $bowler_dlt_id = $_GET["bowler_id"];
        $bowler_career_dlt = "DELETE FROM `bowler_career` WHERE id = $bowler_dlt_id";
        $bowler_dlt_result = mysqli_query($conn, $bowler_career_dlt);

        if($bowler_dlt_result){
            $_SESSION['delete_message']="You data has been successfully deleted";
            header("location: bowler_career.php");
            exit(0);
        }
    }


    // for schedule 
    if(isset($_GET["schedule_id"])){
        $schedule_id_getting = $_GET["schedule_id"];
        $schedule_dlt = "DELETE FROM `schedule` WHERE id = $schedule_id_getting";
        $schedule_result = mysqli_query($conn, $schedule_dlt);

        if($schedule_result){
            $_SESSION['schedule_ended']="Match schedule successfully removed";
            header("location: schedule.php");
            exit(0);
        }
    }



     // for batsman ranking delete
     if(isset($_GET["bat_ranking_id"])){
        $bat_ranking_id_getting = $_GET["bat_ranking_id"];
        $bat_rank_dlt = "DELETE FROM `batting_ranks` WHERE id = $bat_ranking_id_getting";
        $rank_result = mysqli_query($conn, $bat_rank_dlt);

        if($rank_result){
            $_SESSION['bat_ranking']="Batsman data successfully deleted";
            header("location: batsmanranking.php");
            exit(0);
        }
    }

    // for bowler ranking delete
    if(isset($_GET["bowler_ranking_id"])){
        $bowler_ranking_id_getting = $_GET["bowler_ranking_id"];
        $bowler_rank_dlt = "DELETE FROM `bowler_ranks` WHERE Id = $bowler_ranking_id_getting";
        $bowler_rank_result = mysqli_query($conn, $bowler_rank_dlt);

        if($bowler_rank_result){
            $_SESSION['ball_ranking']="Bowler data successfully deleted";
            header("location: bowlerranking.php");
            exit(0);
        }
    }


    // for delete the member
    if(isset($_GET["member_Delete_id"])){
        $members_id_getting = $_GET["member_Delete_id"];
        $members_dlt = "DELETE FROM `signup` WHERE id = $members_id_getting";
        $bowler_rank_result = mysqli_query($conn, $members_dlt);

        if($bowler_rank_result){
            $_SESSION['member']="Member Removed Successfully";
            header("location: members.php");
            exit(0);
        }
    }

?>