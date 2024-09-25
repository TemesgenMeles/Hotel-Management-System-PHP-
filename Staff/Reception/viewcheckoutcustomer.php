<?php

include('connection.php');
if(isset($_POST['view'])){
    $checkout_id = $_POST['checkout_id'];

    $sql = "SELECT * from check_out where ID = '$checkout_id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    
    $cust_id = $row['customer_ID'];
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $sex = $row['sex'];
    $email = $row['email'];
    $mobile = $row['phone_number'];
    $checkin = $row['check_in_date'];
    $checkout = $row['check_out_date'];
    $roomtype = $row['room_type'];
    $totalPrice = $row['price'];
    $person = $row['persons'];
    $status = $row['register_status'];

    if($status == 1){
        $account_sql = "SELECT * from customer_information where customer_ID = '$cust_id'";
        $account_result = mysqli_query($db,$account_sql);
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
            <div class="container" style=" margin-top: 20px ;">
                <div class="panel panel-success" style="width: 500px;">
                    <div class="panel-heading">
                        <?php 
                        
                        if($account_result){
                            $account_row = mysqli_fetch_array($account_result);
                        ?>
                            
                                <center><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($account_row['profile_photo']).'';?>" 
                                alt="pic" width="100px" height="100px" style="border-radius: 50%;" ></center> 
                                <?php
                            if($account_row['sex'] == "Male"){
                                $name = "Mr.";
                            }else{
                                $name = "Ms.";
                            }
                        ?>
                        <h4><?php echo $name . " " . $account_row['first_name'] . " " . $account_row['last_name']; ?></h4>
                            
                        
                       
                    </div>
                    <div class="panel-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Customer Informatin</h3>
                                    <div style="line-height: 2em;"><b>First Name:</b> <?php echo $account_row['first_name']; ?></div>
                                    <div style="line-height: 2em;"><b>last Name:</b> <?php echo $account_row['last_name']; ?></div>
                                    <div style="line-height: 2em;"><b>Sex:</b> <?php echo $account_row['sex']; ?></div>
                                    <div style="line-height: 2em;"><b>Email:</b> <?php echo $account_row['email']; ?></div>
                                    <div style="line-height: 2em;"><b>Phone Number:</b> <?php echo $account_row['phone_number']; ?></div>
                                    <div style="line-height: 2em;"><b>Country:</b> <?php echo $account_row['country']; ?></div>
                                    <div style="line-height: 2em;"><b>City:</b> <?php echo $account_row['city']; ?></div>
                                    <div style="line-height: 2em;"><b>Nationality:</b> <?php echo $account_row['nationality']; ?></div>
                                    <div style="line-height: 2em;"><b>User Name:</b> <?php echo $account_row['user_name']; ?></div>
                                </div>
                                <?php
                        }else{
                            ?>
                            
                                <?php
                            if($sex == "Male"){
                                $name = "Mr.";
                            }else{
                                $name = "Ms.";
                            }
                        ?>
                        <h4><?php echo $name . " " . $fname . " " . $lname; ?></h4>
                            
                        
                       
                    </div>
                    <div class="panel-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Customer Informatin</h3>
                                    <div style="line-height: 2em;"><b>First Name:</b> <?php echo $fname; ?></div>
                                    <div style="line-height: 2em;"><b>last Name:</b> <?php echo $lname; ?></div>
                                    <div style="line-height: 2em;"><b>Sex:</b> <?php echo $sex; ?></div>
                                    <div style="line-height: 2em;"><b>Email:</b> <?php echo $email; ?></div>
                                    <div style="line-height: 2em;"><b>Phone Number:</b> <?php echo $mobile; ?></div>
                                </div>
                            <?php
                        }
                             ?>   <div class="col-md-6">
                                    <h3>Room Information</h3>
                                    <div style="line-height: 2em;"><b>Arrival Date:</b> <?php echo $checkin; ?></div>
                                    <div style="line-height: 2em;"><b>Departure Date:</b> <?php echo $checkout; ?></div>
                                    <div style="line-height: 2em;"><?php echo $person . " "; ?> <b>persons</b></div>
                                    <div style="line-height: 2em;"><b>Room Type:</b> <?php echo $roomtype; ?></div>
                                    <div style="line-height: 2em;"><b>Total price:</b> <?php echo $totalPrice; ?></div>
                                    
                                    
                                </div>
                            </div>                            
                        
                    </div>
                    <div class="panel-footer" style="float: right;">
                        <a href="../../Staff/Reception/checkoutCustomers.php" class=" btn btn-primary" >< Back</a>
                    </div>
                    
                </div>
            </div>
    </body>
    </html>
    
<?php
    }
    else{
        $account_sql = "SELECT * from registered_customer where customer_ID = '$cust_id'";
        $account_result = mysqli_query($db,$account_sql);
        $account_row = mysqli_fetch_array($account_result);
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
                            
                        <?php
                            if($account_row['sex'] == "Male"){
                                $name = "Mr.";
                            }else{
                                $name = "Ms.";
                            }
                        ?>
                        <h4><?php echo $name . " " . $account_row['first_name'] . " " . $account_row['last_name']; ?></h4>

                        </div>
                        <div class="panel-body">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Customer Informatin</h3>
                                        <div style="line-height: 2em;"><b>First Name:</b> <?php echo $account_row['first_name']; ?></div>
                                        <div style="line-height: 2em;"><b>last Name:</b> <?php echo $account_row['last_name']; ?></div>
                                        <div style="line-height: 2em;"><b>Sex:</b> <?php echo $account_row['sex']; ?></div>
                                        <div style="line-height: 2em;"><b>Email:</b> <?php echo $account_row['email']; ?></div>
                                        <div style="line-height: 2em;"><b>Phone Number:</b> <?php echo $account_row['phone_number']; ?></div>
                                        <div style="line-height: 2em;"><b>Country:</b> <?php echo $account_row['country']; ?></div>
                                        <div style="line-height: 2em;"><b>City:</b> <?php echo $account_row['city']; ?></div>
                                        <div style="line-height: 2em;"><b>Nationality:</b> <?php echo $account_row['nationality']; ?></div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Room Information</h3>
                                        <div style="line-height: 2em;"><b>Arrival Date:</b> <?php echo $checkin; ?></div>
                                        <div style="line-height: 2em;"><b>Departure Date:</b> <?php echo $checkout; ?></div>
                                        <div style="line-height: 2em;"><?php echo $person . " "; ?> <b>persons</b></div>
                                        <div style="line-height: 2em;"><b>Room Type:</b> <?php echo $roomtype; ?></div>
                                        <div style="line-height: 2em;"><b>Total price:</b> <?php echo $totalPrice; ?></div>
    
                                        
                                    </div>
                                </div>                            
                            
                        </div>
                        <div class="panel-footer" style="float: right;">
                            <a href="../../Staff/Reception/checkoutCustomers.php" class=" btn btn-primary" >< Back</a>
                        </div>
                        
                    </div>
                </div>
        </body>
        </html>
        
    <?php  
    }
}

?>