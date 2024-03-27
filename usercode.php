
<?php 
    session_start();
    include ('config/conn.php');
?>

<?php 
    if(isset($_POST['login'])){
        $name = $_POST['name'];
        $password = $_POST['password'];

        $selecting = "SELECT * FROM `signup` WHERE Name = '$name' AND password = '$password' Limit 1";

        $check_result = mysqli_query($conn, $selecting);

        if(mysqli_num_rows($check_result) > 0){
            // Here we can retrieve data from database
            foreach($check_result as $row){
                $id = $row['id'];
                $Name = $row['Name'];
                $playing_role = $row['playing_role'];
                $age = $row['age'];
                $sex = $row['sex'];
                $country = $row['country'];
                $batting = $row['batting'];
                $balling = $row['balling'];
                $address = $row['address'];
                $agree_terms = $row['$agree_terms'];
            }

            // here we can check our authentication
            $_SESSION['user_auth']=[
                'id' => $id,
                'Name' => $Name,
                'playing_role' => $playing_role,
                'age' => $age,
                'sex' => $sex,
                'country' => $country,
                'batting' => $batting,
                'balling' => $balling,
                'address' => $address,
                'agree_ters' => $agree_terms,

            ];
            header("location: Userdash.php");
            }else{
            header("location: user.php");
            $_SESSION['invalid_user'] = "Access Denied User Name and Paassword not match";
        }
    }



    // ---------------------------------------------------------------Code for logout--------------------------------------------------------
    if(isset($_POST['logout'])){
        session_destroy();
        unset ($_SESSION['user_auth']);

        header("location: user.php");
        exit(0);
    }
?>