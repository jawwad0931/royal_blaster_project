
<?php 
    session_start();
    include 'config/conn.php';
	// Check if id is set or not, if true, 
	// toggle else simply go back to the page 
	if (isset($_GET['deactivateId'])){ 

		// Store the value from get to 
		// a local variable "course_id" 
		$course_id=$_GET['deactivateId']; 

		// SQL query that sets the status to 
		// 0 to indicate deactivation. 
		$sql="UPDATE `schedule` SET 
			`status`=0 WHERE id='$course_id'"; 

		// Execute the query 
		mysqli_query($conn,$sql); 
	} 

	// Go back to course-page.php 
    $_SESSION['Incomplete']="Match complete";
	header('location: schedule.php'); 
    exit(0);
?>
