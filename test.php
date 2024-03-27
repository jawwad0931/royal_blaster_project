<?php 
    if(isset($_POST['btn'])){
        $image = $_FILES['image'];
        echo "<pre>";
        var_dump($image);
        echo "</pre>";
    }
    ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit" name="btn">Submit</button>
</form>


<?php
// $sql = "SELECT signup.*, career_status.*
// FROM user_profile
// JOIN signup ON user_profile.sign_id = signup.id
// JOIN career_status ON user_profile.career_id = career_status.id";

// // Execute query
// $result = $conn->query($sql);

// // Check if any rows were returned
// if ($result->num_rows > 0) {
//     // Output data of each row
//     while ($row = $result->fetch_assoc()) {
//         $Name = $row['Name'];
//         $User_id_fk = $row['$User_id_fk'];
//     }
// } else {
//     echo "0 results";
// }

// // Close connection
// $conn->close();
?>



--  $fetchingData = "SELECT signup.*, career_status.*
                    --  FROM signup
                    --  INNER JOIN career_status ON signup.id = career_status.User_id_fk";  
                    --  $checking_data = mysqli_query($conn, $fetchingData);