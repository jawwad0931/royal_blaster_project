<?php
session_start();
include "config/conn.php";
include "includes/header5.php";
?>

<head>
   <style>
       body {
    background-image: url('images/stadium.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-color: rgba(0, 0, 0, 0.5);
  }
   </style>
</head>

<body>
<!-- <body style="background-image: url('images/cricket.jpg');"> -->


<!-- Php Code for retrieving data from career status table -->
<?php 
   $user_id = $_SESSION['user_auth']['id'];
   // Retrieve user profile information
   $query = "SELECT * FROM career_Status WHERE User_id_fk = $user_id";
   $result = mysqli_query($conn, $query);
   $user_profile = mysqli_fetch_assoc($result);

   if (!$user_profile) {
      echo "No profile found for the user.";
      exit();
   }
?>



<!--for practice purposes Display user profile information -->
<div class="container-fluid mt-5">
   <div class="row">
      <div class="col-4">
      <a href="userdash.php" class="btn btn-outline-light">Back to Dashboard</a>
      </div>
   </div>
    <div class="row m-4 d-flex align-items-center justify-content-end">
        <div class="col-lg-4 col-md-12 col-sm-12 d-flex align-items-end justify-content-end mt-3">
            <div class="row career_Section">
               <div class="col-8 p-4">
                <h1 class="text-start text-light"><?php echo $_SESSION['user_auth']['Name']; ?></h1><span class="text-light fw-bold"><?php echo $_SESSION['user_auth']['playing_role']; ?></span><br>
                <h3 class="text-start text-light">Update Profile</h3>
            </div>
            <div class="col-4 d-flex align-items-center">
                <img src="images/kallis.webp" class="border border-light rounded-circle" height="65%" width="70%" alt="">
            </div>
                    <div class="d-flex m-2">
                       <div class="w-75 border bg-success text-light p-2 fw-bold">Matches</div>
                       <span class="w-25 border text-center bg-primary text-light p-2"><?php echo $user_profile ['Matches'] ?></span>
                    </div> 
                    <div class="d-flex m-2">
                       <div class="w-75 border bg-success text-light p-2 fw-bold">Runs</div>
                       <span class="w-25 border text-center bg-primary text-light p-2"><?php echo $user_profile ['Runs'] ?></span>
                    </div> 
                    <div class="d-flex m-2">
                       <div class="w-75 border bg-success text-light p-2 fw-bold">Wicket</div>
                       <span class="w-25 border text-center bg-primary text-light p-2"><?php echo $user_profile ['Wickets'] ?></span>
                    </div> 
                    <div class="d-flex m-2">
                       <div class="w-75 border bg-success text-light p-2 fw-bold">Average</div>
                       <span class="w-25 border text-center bg-primary text-light p-2"><?php echo $user_profile ['Average'] ?></span>
                    </div> 
                    <div class="d-flex m-2">
                       <div class="w-75 border bg-success text-light p-2 fw-bold">Highest Score</div>
                       <span class="w-25 border text-center bg-primary text-light p-2"><?php echo $user_profile ['Highest_Score'] ?></span>
                    </div> 
                    <div class="d-flex m-2">
                       <div class="w-75 border bg-success text-light p-2 fw-bold">Highest Wicket</div>
                       <span class="w-25 border text-center bg-primary text-light p-2"><?php echo $user_profile ['Highest_Wickets'] ?></span>
                    </div> 
            </div>
        </div>
    </div>
</div>
</body>



<?php
echo '<div class="">';
include "includes/footer.php";
echo '</div>';
?>