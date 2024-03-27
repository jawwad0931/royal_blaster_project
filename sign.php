<?php
include "includes/header4.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #mycard1 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 600px;
        /* margin-left: 135px !important; */
    }

    #mycard2 {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 600px;
        /* margin-left: 135px !important; */
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row" class="row_margins">
            <div class="col-12 col-lg-7 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                <div class="card border m-2 bg-light" id="mycard2">
                    <div class="m-4">
                        <h2>Sign Up</h2>
                        <p class="tw-light">Please fill in this form to create an account.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" class="row_margins">
            <div class="col-12 col-lg-7 col-md-12 col-sm-12 d-flex justify-content-center">
                <div class="card border m-2 bg-light" id="mycard1">


                    <!-- this code check password and confirm password -->
                    <?php
                    session_start();
                    if (isset($_SESSION['pass_check'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['pass_check'] . '</div>';
                        unset($_SESSION['pass_check']);
                    }
                    ?>
                    <!-- End php code -->

                    <form action="signcode.php" method="post" class="row g-3 p-4 needs-validation" id="passwordForm" onsubmit="return validateForm()" novalidate>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Age</label>
                            <input type="number" class="form-control" id="validationCustom02" name="age" value=""
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Sex</label>
                            <select class="form-select" id="validationDefault03" name="sex" required>
                                <option selected disabled value="">Choose...</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" id="validationCustom05" required>
                            <div class="valid-feedback">
                                Please Enter a country name.
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                Please Enter a city name.
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <label for="validationCustom06" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" id="validationCustom06" required>
                            <div class="invalid-feedback">
                                Please Enter a Phone number.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <small id="passwordHelp" class="form-text text-muted">Password must be at least 8 characters
                                long.</small>
                            <div id="passwordError" class="invalid-feedback" style="display: none;">Password must be at
                                least 8 characters long.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom08" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="validationCustom08" name="confirm_password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom08" class="form-label">Batting style</label>
                            <select class="form-select" name="batting" id="validationDefault08" required>
                                <option selected disabled value="">Choose...</option>
                                <option>Right hand</option>
                                <option>Left hand</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom09" class="form-label">Bowling style</label>
                            <select class="form-select" name="balling" id="validationDefault09" required>
                                <option selected disabled value="">Choose...</option>
                                <option>Fast Bowling</option>
                                <option>Spin Bowling</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom13" class="form-label">Playing Role</label>
                            <select class="form-select" name="playing_role" id="validationDefault13" required>
                                <option selected disabled value="">Choose...</option>
                                <option>Batsman</option>
                                <option>Bowler</option>
                                <option>All Rounder</option>
                                <option>Keeper</option>
                                <option>Captain</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom10" class="form-label">Address</label>
                            <textarea type="text" class="form-control" name="address" id="validationCustom10"
                                required></textarea>
                            <div class="invalid-feedback">
                                Please Enter your address.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="agree_terms" value=""
                                    id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="user.php" class="text-decoration-none">login Account!</a>
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="signup" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- boostrap cdn path -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <!-- <script src="boostrap/js/bootstrap.min.js"></script> -->
    <!-- <script src="boostrap/js/jquery-3.7.0.js"></script> -->

    <!-- script for validation -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()

        // password validation
        // function validateForm() {
        //     var passwordInput = document.getElementById("password");
        //     var passwordError = document.getElementById("passwordError");
        //     var password = passwordInput.value;

        //     if (password.length < 8) {
        //         passwordInput.classList.add("is-invalid");
        //         passwordError.style.display = "block";
        //         return false;
        //     } else {
        //         passwordInput.classList.remove("is-invalid");
        //         passwordError.style.display = "none";
        //         return true;
        //     }
        // }
    </script>
</body>

</html>