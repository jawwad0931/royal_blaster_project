
<?php 
    session_start();
    include ('config/conn.php');
?>

<?php 
    if(isset($_POST['Admin_login'])){
        $admin_name = $_POST['admin_name'];
        $admin_pass = $_POST['admin_pass'];

        $selecting = "SELECT * FROM `admin` WHERE admin_name = '$admin_name' AND admin_pass = '$admin_pass' Limit 1";

        $check_admin_result = mysqli_query($conn, $selecting);

        if(mysqli_num_rows($check_admin_result) > 0){
            // Here we can retrieve data from database
            foreach($check_admin_result as $row){
                $Id = $row['Id'];
                $admin_name = $row['admin_name'];
                $admin_pass = $row['admin_pass'];
            }

            // here we can check our authentication
            $_SESSION['admin_auth']=[
                'Id' => $Id,
                'admin_name' => $admin_name,
                'admin_pass' => $admin_pass,


            ];
            header("location: admindash.php");
            }else{
            header("location: admin.php");
            $_SESSION['invalid_user'] = "Access Denied Admin Name and Password not match";
        }
    }



    // ---------------------------------------------------------------Code for logout--------------------------------------------------------
    if(isset($_POST['Admin_logout'])){
        session_destroy();
        unset ($_SESSION['admin_auth']);

        header("location: admin.php");
        exit(0);
    }
?>