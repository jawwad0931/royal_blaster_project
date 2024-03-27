<?php
session_start();
include "config/conn.php";
include "includes/header15.php";
?>
<?php
// for getting data in input field
error_reporting(0);
if (isset ($_GET['update_admin_data'])) {
    $update_id = $_GET['update_admin_data'];
    $admin_name = $_POST['admin_name'];
    $admin_pass = $_POST['admin_pass'];

    $update_admin_query = "SELECT * FROM `admin` WHERE Id = $update_id";
    $admin_update_query = mysqli_query($conn, $update_admin_query);
    if ($row = mysqli_fetch_assoc($admin_update_query)) {
        $admin_name = $row['admin_name'];
        $admin_pass = $row['admin_pass'];
    }
}

// for update data
if(isset($_GET['update_admin'])){
    $id = $_GET['update_admin'];
    $admin_name = $_POST['admin_name'];
    $admin_pass = $_POST['admin_pass'];

    $admin_update = "UPDATE `admin` SET `admin_name`='$admin_name',`admin_pass`='$admin_pass' WHERE Id = $id";

    $check_query = mysqli_query($conn, $admin_update);

    if(!$check_query){
        echo 'Error show';
    }else{
        $_SESSION['admin_change']="Change Data updated!!";
        header("location: admin_pass.php");
        exit(0);
    }
}
?>

<style>
    @media only screen and (min-width: 320px) and (max-width: 767px) {
    
}
</style>

<div class="container-fluid">
    <div class="row d-flex align-items-center justify-content-start py-5 w-100">
            <div class="col-lg-6 col-md-12 d-flex justify-content-center col-sm-12">
                <div class="w-75">
                <form action="update_admin.php?update_admin=<?php echo $update_id ?>" method="post" class="row g-3 p-4 needs-validation" id="passwordForm"
                    onsubmit="return validateForm()" novalidate enctype="multipart/form-data">
                    <h3 class="text-secondary">Admin Update</h3>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="admin_name">Admin Name:</label>
                            <input type="text" class="form-control w-100" id="admin_name" name="admin_name" value="<?php echo $admin_name ?>" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="admin_pass">Password:</label>
                            <input type="password" class="form-control w-100" id="admin_pass" value="<?php echo $admin_pass ?>" name="admin_pass" required>
                        </div>
                    </div>
                    <div class="col-12">
                            <button class="btn btn-primary" name="" type="submit">change</button>
                    </div>
                </form>
                </div>
            </div>
    </div>
</div>