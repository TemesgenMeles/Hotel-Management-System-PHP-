<?php

include('connection.php');
//*****************************for reservation********************************************
$sql_reservation = "SELECT * from room_reservation where register_status = '1' AND checkin_status = '0'";
$result_reservation = mysqli_query($db,$sql_reservation);
$numrow_reservation = mysqli_num_rows($result_reservation);
//----------------------------------------------------------------------------------------
//*****************************for checkin customers ************************************* */
$sql_checkin = "SELECT * from check_in";
$result_checkin = mysqli_query($db,$sql_checkin);
$numrow_checkin = mysqli_num_rows($result_checkin);
//-------------------------------------------------------------------------------------------
//******************************for check out customers********************************** */
$sql_checkout ="SELECT * from check_out";
$result_checkout = mysqli_query($db,$sql_checkout);
$numrow_checkout = 0;
$date =strtotime(date("m/d/y")) ;

while($row = mysqli_fetch_array($result_checkout)){
    $checkout = strtotime($row['check_out_date']);
    $result = $date - $checkout;
    if($result <= 7){
        $numrow_checkout++;
    }
}
//---------------------------------------------------------------------------------------------
//*********************************for system users**************************************** */
$sql_system = "SELECT * from customer_information";
$result_system = mysqli_query($db,$sql_system);
$numrow_system = mysqli_num_rows($result_system);
//--------------------------------------------------------------------------------------------
//*********************************for registered customers********************************* */
$sql_registerd = "SELECT * from registered_customer";
$result_registered = mysqli_query($db,$sql_registerd);
$numrow_registered = mysqli_num_rows($result_registered);
//------------------------------------------------------------------------------------------------

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Lucy Hotel </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="navigation.css">
        <link rel="stylesheet" href="checkinview.css">
    </head>
    <body>
    <header class="topmenu">
        <nav>
            <ul>
                <li class="topitem"><i class="fa-solid fa-user"></i><i class="fa-solid fa-caret-down"></i>
                    <ul class="topdropdown">
                        <li class="topdownitem"><a href="viewAccount.php"><i class="fa-solid fa-eye"></i>View Account</a></li>
                        <li class="topdownitem"><a href="changePassword.php"><i class="fa-solid fa-key"></i>Change password</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <header class="mainmenu">
        <nav>
            <img src="../../image/lucy-hotel_logo3.svg" alt="logo" class="my-logo-img">
            <a href="home.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                <ul class="mymenu">
                    <li class="mymenu-item"><a href="home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    
                    <li class="mymenu-current drop"><a href="userEmployee.php" class="mymenu-link"><i class="fa-solid fa-users"></i>User <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="userEmployee.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Employee</a></li>
                            <li class="dropitem lastitem"><a href="userCustomer.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Customer</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-item"><a href="report.html" class="mymenu-link"><i class="fa-sharp fa-solid fa-list-check"></i>Report</a></li>
                    <li class="mymenu-item"><a href="newComment.php" class="mymenu-link"><i class="fa-solid fa-comment"></i>Message</a></li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <section id="view">
<div><!-- section -->
            <div class="row"><!-- row -->
                <div class="col-md-2""><!-- colomn -->
                    <nav>
                        <ul>
                            <li><a href="userEmployee.php">Employee</a></li>
                            <li><a href="userCustomer.php">Customer</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-10"><!-- colomn -->
                <div class="row" style="display: flex; justify-content: space-around;">
                    <div class="col-sm-4" style="display: flex; background-color: red; width: 200px; height: 230px; border-radius: 50%; align-items: center; justify-content: center;">
                        <div style="color: white; text-align: center;">
                            <h4>Reservation</h4>Customers which <br>Reserve a Room<br>
                            <p><?php echo $numrow_reservation; ?> Customers</p>
                            <a href="../../Staff/Manager/reservationView.php" class="btn btn-default">View</a>
                        </div>
                    </div>
                    <div class="col-sm-4" style="display: flex; background-color: green; width: 200px; height: 230px; border-radius: 50%; align-items: center; justify-content: center;">
                        <div style="color: white; text-align: center;">
                            <h4>Check In</h4>Customers which <br>Checkin to the Hotel<br>
                            <p><?php echo $numrow_checkin; ?> Customers</p>
                            <a href="../../Staff/Manager/checkinView.php" class="btn btn-default">View</a>
                        </div>
                    </div>
                    <div class="col-sm-4" style="display: flex; background-color: blue; width: 200px; height: 230px; border-radius: 50%; align-items: center; justify-content: center;">
                        <div style="color: white; text-align: center;">
                            <h4>Check Out</h4>Customers which <br>Checkout from the Hotel in <br>the last 7 days<br>
                            <p><?php echo $numrow_checkout; ?> Customers</p>
                            <a href="../../Staff/Manager/checkoutView.php" class="btn btn-default">View</a>
                        </div>
                    </div>
                </div>
                
                <div class="row" style="display: flex; justify-content: space-around;">
                    <div class="col-sm-4" style="display: flex; background-color: pink; width: 200px; height: 230px; border-radius: 50%; align-items: center; justify-content: center;">
                        <div style="color: gray; text-align: center;">
                            <h4>The System</h4>All Customers which are Using<br>the System<br>
                            <p><?php echo $numrow_system; ?> Customers</p>
                            <a href="../../Staff/Manager/systemView.php" class="btn btn-default">View</a>
                        </div>
                    </div>
                    <div class="col-sm-4" style="display: flex; background-color: cyan; width: 200px; height: 230px; border-radius: 50%; align-items: center; justify-content: center;">
                        <div style="color: gray; text-align: center;">
                            <h4>Registerd</h4>All Customers which are registerd<br>in The Hotel<br>
                            <p><?php echo $numrow_registered; ?> Customers</p>
                            <a href="../../Staff/Manager/registerView.php" class="btn btn-default">View</a>
                        </div>
                    </div>
                </div>
                </div>   
            </div>
        </div>
    </section>
        
        <div class="footer">
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div>
    </body>
</html>