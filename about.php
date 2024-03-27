
<?php 
    include "includes/header3.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #mycard1{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 83%;
        /* margin-left: 135px !important; */
    }
    #mycard2{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        width: 83%;
        /* margin-left: 135px !important; */
    }
    .cont_height{
    }
    #footer-wrapper {
    width: 100%;
    position: fixed; /* or absolute, depending on your preference */
    bottom: 0;
    }

    #footer {
        width: 100%;
        height: 100%;
    }
</style>
<body>
    <div class="container-fluid cont_height">
        <div class="row" class="row_margins">
            <div class="col-lg-10 col-md-12 col-sm-12 d-flex justify-content-center mt-4">
                <div class="card m-3 bg-light" id="mycard1">
                    <p class="m-3">International cricket matches implement highly sophisticated database management systems to record, analyse and manage the statistical data related to batting, bowling and fielding. But such database management is rarely used at the lower levels of cricket like Corporate Level, Cricket Camps and Inter-School tournaments due to the cost and complexity involved in maintaining such a system.</p>
                </div>
            </div>
        </div>
        <div class="row" class="row_margins">
            <div class="col-12 col-lg-10 col-md-12 col-sm-12 d-flex justify-content-center">
                <div class="card border m-3 bg-light" id="mycard2">
                      <p class="m-3">So we have implemented a similar, user-friendly and lighter version of such systems with barebone features that the target users will require. Using our management system called Royal BlasterTM, you can create new matches, update scores, register new players, access scorecards, get live feed of matches, see player profiles etc. We plan to add more features as time goes.</p>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
<!-- agar php ka footer bilkul end mai chahiye tou footer ki include file ko body se bahir type karo -->