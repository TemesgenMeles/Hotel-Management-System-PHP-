<?php

include ('connection.php');
session_start();
$emp_ID = $_SESSION['ID'];
echo @$_SESSION['checkin_msg'];
session_unset();
$_SESSION['ID'] = $emp_ID;

$sql_checkin = "SELECT ID,check_out_date,customer_ID , status_register from check_in ORDER BY check_in.ID DESC";
$excute_checkin = mysqli_query($db,$sql_checkin);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Lucy Hotel </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
        <link rel="stylesheet" href="navigation.css">
        <link rel="stylesheet" href="checkoutCustomers.css">
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
                    <li class="mymenu-item"><a href="registerForm.php" class="mymenu-link"><i class="fa-solid fa-address-card"></i>Register</a></li>
                    <li class="mymenu-item drop"><a href="reservaationRoom.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Reservation <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="reservaationRoom.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Rooms Reservation</a></li>
                            <li class="dropitem lastitem"><a href="reservationHall.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Meeting Hall</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-current drop"><a href="room.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-hotel"></i>Rooms<i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="room.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Manage Room</a></li>
                            <li class="dropitem"><a href="#" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Available Room</a></li>
                            <li class="dropitem"><a href="addRoom.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Room Rigistration</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-item"><a href="reservedCustomers.php" class="mymenu-link"><i class="fa-solid fa-users"></i>Customers</a></li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <section id="outbody">
        <div><!-- section -->
            <div class="row"><!-- row -->
                <div class="col-md-3"><!-- colomn -->
                    <div>
                        <nav>
                            <div>
                                <h4>Customers</h4>
                            </div>
                            <ul>
                                <li><a href="reservedCustomers.php">Reservation</a></li>
                                <li><a href="checkInCustomers.php">Checkin</a></li>
                                <li><a href="checkoutCustomers.php">Checkout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-9"><!-- colomn -->
                    <h4>Customers Which Check_In The Hotel Room</h4>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone_number</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php
                        $num = 0;
                        while ($checkin_row = mysqli_fetch_array($excute_checkin)) {
                            $num++;
                            $customer_ID = $checkin_row['customer_ID'];
                            $status = $checkin_row['status_register'];
                            if($status == 1){
                                $name = "customer_information";
                            }else{
                                $name = "registered_customer";
                            }

                            $sql_select = "SELECT * from $name where customer_ID = '$customer_ID'";
                            $select_result = mysqli_query($db,$sql_select);
                            $select_row = mysqli_fetch_array($select_result);

                            ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $select_row['first_name']; ?></td>
                                <td><?php echo $select_row['last_name']; ?></td>
                                <td><?php echo $select_row['email']; ?></td>
                                <td><?php echo $select_row['phone_number']; ?></td>
                                <form action="checkinView.php" method="POST">
                                    <input type="text" name="checkin_ID" value="<?php echo $checkin_row['ID']; ?>" hidden>
                                    <td><button type="submit" name="view" class="btn btn-primary"><i class="fa-solid fa-eye"></i>View</button></td>
                                </form>
                                <?php
                                $date = strtotime(date("m/d/y"));
                                $checkout = strtotime($checkin_row['check_out_date']);
                                if($date >= $checkout){
                                    ?>
                                <form action="checkoutCheckin.php" method="POST">
                                    <input type="text" name="checkin_ID" value="<?php echo $checkin_row['ID']; ?>" hidden>
                                    <td><button type="submit" onclick="aa()" name="checkout" class="btn btn-danger"><span>icon</span>Check out</button></td>
                                </form>
                                    <?php
                                }else{
                                    ?>
                                    <td><button type="button" class="btn btn-danger disabled">Check out</button></td>
                                    <?php
                                }
                                ?>
                                
                            </tr>
                            <?php
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
    <script>
        function aa(){
            var a = confirm('are you sure?');
            if(a == false){
                event.preventDefault();
            }
        }
    </script>
</html>