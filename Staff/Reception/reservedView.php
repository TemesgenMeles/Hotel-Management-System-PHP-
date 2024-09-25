<?php

include('connection.php');
if (isset($_POST['view'])) {
    $cust_ID = $_POST['cust_ID'];
    $res_ID = $_POST['rese_ID'];
    
    $sql_cust = "SELECT * from customer_information where customer_ID = '$cust_ID'";
    $cust_result = mysqli_query($db,$sql_cust);
    $cust_row = mysqli_fetch_array($cust_result);

    $sql_reserv = "SELECT * from room_reservation where ID = '$res_ID'";
    $resrev_result = mysqli_query($db,$sql_reserv);
    $resrev_row = mysqli_fetch_array($resrev_result);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>lucy hotel</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
            <div class="container" style=" margin-top: 20px ;">
                <div class="panel panel-success" style="width: 500px;">
                    <div class="panel-heading">
                        
                            
                                <center><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($cust_row['profile_photo']).'';?>" 
                                alt="pic" width="100px" height="100px" style="border-radius: 50%;" ></center> 
                            
                            
                        
                       
                    </div>
                    <div class="panel-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Customer Informatin</h3>
                                    <div style="line-height: 2em;"><b>First Name:</b> <?php echo $cust_row['first_name']; ?></div>
                                    <div style="line-height: 2em;"><b>last Name:</b> <?php echo $cust_row['last_name']; ?></div>
                                    <div style="line-height: 2em;"><b>Sex:</b> <?php echo $cust_row['sex']; ?></div>
                                    <div style="line-height: 2em;"><b>Email:</b> <?php echo $cust_row['email']; ?></div>
                                    <div style="line-height: 2em;"><b>Phone Number:</b> <?php echo $cust_row['phone_number']; ?></div>
                                    <div style="line-height: 2em;"><b>Country:</b> <?php echo $cust_row['country']; ?></div>
                                    <div style="line-height: 2em;"><b>City:</b> <?php echo $cust_row['city']; ?></div>
                                    <div style="line-height: 2em;"><b>Nationality:</b> <?php echo $cust_row['nationality']; ?></div>
                                    <div style="line-height: 2em;"><b>User Name:</b> <?php echo $cust_row['user_name']; ?></div>
                                </div>
                                <div class="col-md-6">
                                    <h3>Reservation Information</h3>
                                    <div style="line-height: 2em;"><b>Arrival Date:</b> <?php echo $resrev_row['check_in_date']; ?></div>
                                    <div style="line-height: 2em;"><b>Departure Date:</b> <?php echo $resrev_row['check_out_date']; ?></div>
                                    <div style="line-height: 2em;"><?php echo $resrev_row['number_of_person'] . " "; ?> <b>persons</b></div>
                                    <div style="line-height: 2em;"><b>Room Type:</b> <?php echo $resrev_row['room_type']; ?></div>
                                    <div style="line-height: 2em;"><?php echo $resrev_row['number_of_room'] . " "; ?> <b>Rooms</b></div>
                                    <div style="line-height: 2em;"><b>Total price:</b> <?php echo $resrev_row['total_price']; ?></div>
                                    <div style="line-height: 2em;"><?php echo $resrev_row['nights'] . " "; ?> <b>Nights</b> </div>
                                    
                                </div>
                            </div>                            
                        
                    </div>
                    <div class="panel-footer" style="float: right;">
                        <a href="../../Staff/Reception/reservedCustomers.php" class=" btn btn-primary" >< Back</a>
                    </div>
                    
                </div>
            </div>
    </body>
    </html>
    

<?php
}


?>