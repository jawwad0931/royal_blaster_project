<!DOCTYPE html>
<html lang="en">

<head>
    <!-- favicon -->
    <!-- ./ its mean outside the directory and then ./images it mean reach inside the images directory and access image -->
    <link rel="icon" href="./images/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
     <!-- for icon cdn path -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="">
    <!-- google font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">
    <title>Document</title>
</head>


<style>
    body{
        font-family: "Buenard", serif;
        font-weight: 400;
        font-style: normal;
    }
    #mySidenav a {
        position: absolute;
        left: -80px;
        transition: 0.3s;
        padding: 10px;
        width: 100px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
    }
    #mySidenav a:hover {
        left: 0;
    }
    #back {
        top: 33px;
    }
    #user_login{
        background-color: black;
    }
</style>


<body>
    <!-- header section -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-end" id="First_row">
            <div class="col-1 p-3" id="mySidenav">
                    <a href="admindash.php" class="btn btn-primary" id="back"><i class="ion-android-arrow-back"></i></a>
            </div>
            <div class="col-11 d-flex align-items-center p-4" id="user_login">
            <a href="index.php" class="text-light text-decoration-none fs-3">Users lists</a>
            </div>
        </div>
</body>

</html>