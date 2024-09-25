<?php

include('connection.php');
session_start();
if(isset($_POST['view'])){
    $id = $_POST['id'];
    $link_type = $_POST['reser'];
    //---------------------------------------------------------------------
    if($link_type == "reservation"){
        $register = 1;
        $link = "../../Staff/Manager/reservationView.php";
        $name = "customer_information";
        //--------------------------------------------------------------------

    }elseif($link_type == "checkin"){
        $link = "../../Staff/Manager/checkinView.php";
        $sql_checkin = "SELECT * from check_in where customer_ID = '$id'";
        $result_checkin = mysqli_query($db,$sql_checkin);
        $row_checkin = mysqli_fetch_array($result_checkin);
        $register = $row_checkin['status_register'];
            if($register == 1){
                $name = "customer_information";
            }else{
                $name = "registered_customer";
            }
        //-------------------------------------------------------------------------

    }elseif($link_type == "checkout"){
        $link = "../../Staff/Manager/checkoutView.php";
        $sql_checkout ="SELECT * from check_out where customer_ID = '$id'";
        $result_checkout = mysqli_query($db,$sql_checkout);
        $row_checkout = mysqli_fetch_array($result_checkout);
        $register = $row_checkout['register_status'];
            if($register == 1){
                $name = "customer_information";
            }else{
                $name = "registered_customer";
            }
    }elseif($link_type == "system"){
        $register = 1;
        $link = "../../Staff/Manager/systemView.php";
        $name = "customer_information";
    }else{
        $register = 0;
        $link = "../../Staff/Manager/registerView.php";
        $name = "registered_customer";
    }
    

    $sql = "SELECT * from $name where customer_ID = '$id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lucy hotel</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="panel panel-primary" style="width: 500px;">
            <div class="panel-heading">
                <div class="row">
                    <?php
                        if($register == 1){
                            ?>
                     <div class="col-sm-3">
                        <center><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['profile_photo']).'';?>" 
                        alt="pic" width="100px" height="100px" style="border-radius: 50%;" ></center> 
                    </div>        
                            <?php
                        }
                    ?>
                   
                    <div class="col-sm-9">
                        <center>
                            <div class="row">
                                <div class=" col-sm-6" style="padding-top: 4px;">
                                    <div style="padding-top: 4px; font-size:18px; font-weight: bold; color:black">
                                        <?php echo $row['first_name']." ".$row['last_name'];?>
                                    </div>
                                    <div style="padding-top: 6px; font-size:15px; font-weight: bold; color:black">
                                        <?php echo $row['email'];?>
                                    </div>
                                </div>
                                <div class="col-sm-1" style="padding-top: 4px; font-weight:bold;">
                                    <p>Customer</p>
                                </div>
                            </div>
                        </center>
                    </div>
                    
                </div>
            </div>
            <div class="panel-body">
                <div class="container">
                    <div style="line-height: 2em;"><b>First Name:</b> <?php echo $row['first_name']; ?></div>
                    <div style="line-height: 2em;"><b>last Name:</b> <?php echo $row['last_name']; ?></div>
                    <div style="line-height: 2em;"><b>Email:</b> <?php echo $row['email']; ?></div>
                    <div style="line-height: 2em;"><b>Phone Number:</b> <?php echo $row['phone_number']; ?></div>
                    <div style="line-height: 2em;"><b>Country:</b> <?php echo $row['country']; ?></div>
                    <div style="line-height: 2em;"><b>City:</b> <?php echo $row['city']; ?></div>
                    <div style="line-height: 2em;"><b>Nationality:</b> <?php echo $row['nationality']; ?></div>                          
                </div>
            </div>
            <div class="panel-footer" style="float: right;">
                <a href="<?php echo $link; ?>" class=" btn btn-primary" >< Back</a>
            </div>
        </div>
    </div>
</body>
</html>


<?php
}

?>