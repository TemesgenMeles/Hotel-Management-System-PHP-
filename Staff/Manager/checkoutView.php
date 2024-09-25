<?php

include('connection.php');
$sql_checkout ="SELECT * from check_out";
$result_checkout = mysqli_query($db,$sql_checkout);
$date =strtotime(date("m/d/y")) ;


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
                <div class="col-md-3"><!-- colomn -->
                    <nav>
                        <ul>
                            <li><a href="#">Employee</a></li>
                            <li><a href="#">Customer</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-10">
                            <h4>CheckOut</h4>
                            <p>Customers which Checkout from the Hotel in the last 7 days</p>
                        </div>
                        <div class="col-md-2">
                            <a href="../../Staff/Manager/userCustomer.php" class="btn btn-primary">< Back</a>
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $num = 0;
                            while ($row_checkout = mysqli_fetch_array($result_checkout)) {
                                $checkout = strtotime($row_checkout['check_out_date']);
                                $result = $date - $checkout;
                                if($result <= 7){
                                    $num++;
                                    $id = $row_checkout['customer_ID'];
                                    $register = $row_checkout['register_status'];
                                    if($register == 1){
                                        $name = "customer_information";
                                    }else{
                                        $name = "registered_customer";
                                    }
                                    $sql = "SELECT * from $name where customer_ID = '$id'";
                                    $result = mysqli_query($db,$sql);
                                    $row = mysqli_fetch_array($result); 
                                
                                
                                ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <form action="viewCustomer.php" method="POST">
                                <input type="text" name="reser" value="<?php echo 'checkout'; ?>" hidden>
                                <input type="text" name="id" value="<?php echo $row['customer_ID']; ?>" hidden>
                                <td><button type="submit" name="view" class="btn btn-primary"><span class="">icon View</span></button></td>
                            </form>
                        </tr>
                                <?php
                                }
                            }
                        ?>
                    </table>
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