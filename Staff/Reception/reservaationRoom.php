<?php

include ('connection.php');
session_start();

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
        <link rel="stylesheet" href="reservaationRoom.css">
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
                    <li class="mymenu-current drop"><a href="reservaationRoom.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Reservation <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="reservaationRoom.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Rooms Reservation</a></li>
                            <li class="dropitem lastitem"><a href="reservationHall.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Meeting Hall</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-item drop"><a href="room.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-hotel"></i>Rooms<i class="fa-solid fa-caret-down" id="last"></i></a>
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
    <section id="roomreservation">
        <div><!-- section -->
                <div class="row"><!-- row -->
                <?php echo @$_SESSION['bank_msg']; ?>
                    <div class="col-md-3"><!-- colomn -->
                        <div><!-- vertical navigation -->
                            <nav>
                                <ul>
                                    <li><a href="#">Room Resrvation</a></li>
                                    <li><a href="#">Hall Resrvation</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h3>Room Reservation</h3>
                        <div><!-- table -->
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>User Name</th>
                                    <th>Transaction</th><!-- OR -->
                                    <th colspan="2">Action</th><!-- OR --> 
                                </tr>
                                <?php

                                $sql = "SELECT * from room_reservation where register_status = '1' ORDER BY room_reservation.ID DESC";
                                $result = mysqli_query($db,$sql);
                                $num = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $num = $num + 1;
                                    $cust_id = $row['customer_ID'];
                                    $user_info = "SELECT * from customer_information where customer_ID = '$cust_id'";
                                    $user_result = mysqli_query($db,$user_info);
                                    $user_row = mysqli_fetch_array($user_result);
                                    ?>
                                    <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $user_row['first_name']; ?></td>
                                        <td><?php echo $user_row['last_name']; ?></td>
                                        <td><?php echo $user_row['email']; ?></td>
                                        <td><?php echo $user_row['phone_number']; ?></td>
                                        <td><?php echo $user_row['user_name']; ?></td>
                                        <form action="check.php" method="post">
                                            <input type="text" name="reserv_id" value="<?php echo $row['ID']; ?>" hidden>
                                            <?php 
                                                if ($row['check_status'] == 0) {
                                                    ?>
                                                    <td><input type="button" class="btn btn-secondary disabled" value="Check"></td>
                                                    <?php
                                                }elseif ($row['check_status'] == 1) {
                                                    if ($row['bank_check'] == 1 && $row['transaction'] == null) {
                                                        ?>
                                                        <td><input type="button" class="btn btn-secondary disabled" value="Check"></td> 
                                                        <?php
                                                    }else{ 
                                                    ?>
                                                    <td><input type="submit" name="check" class="btn btn-primary active" value="Check"></td>
                                                    <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <td><input type="button"  class="btn btn-primary disabled" value="Checked"></td>
                                                    <?php
                                                }
                                            ?>
                                        </form>

                                        <form action="acceptReservation.php" method="POST">
                                            <input type="text" name="reserv_id" value="<?php echo $row['ID']; ?>" hidden>
                                            <?php
                                            if ($row['check_status'] != 2) {
                                                ?>
                                                <td><input type="button" class="btn btn-success disabled" value="Accept"></td>
                                                <?php
                                            }else{
                                                if ($row['accept_status'] == 1) {
                                                    ?>
                                                    <td><input type="button" class="btn btn-success disabled" value="Accepted"></td>
                                                    <?php
                                                }
                                                else{
                                                ?>
                                                <td><input type="submit" name="accept" class="btn btn-success active" value="Accept"></td>
                                                <?php
                                                }
                                            }
                                            ?>
                                            
                                            <!-- OR -->
                                        </form>
                                        <form action="deletereservation.php" method="POST">
                                            <input type="text" name="reserv_id" value="<?php echo $row['ID']; ?>" hidden>
                                            <?php
                                            $arrival_date = strtotime($row['check_in_date']);
                                            $departure_date = strtotime($row['check_out_date']);
                                            $dbdate = strtotime($row['now_date']);
                                            $cdate = strtotime(date("m/d/y"));
                                            $day = ($cdate - $dbdate)/86400;
                                            if ($row['accept_status'] == 0) {
                                            if($day <= 3){
                                                ?>
                                                <td><input type="button" class="btn btn-danger disabled" value="Drop"></td>
                                                <?php
                                            }else{
                                                ?>
                                                <td><input type="submit" name="drop" class="btn btn-danger active" value="Drop"></td>
                                                <?php
                                            } 
                                            }else{
                                                if ($row['checkin_status'] == 0) {
                                                if($departure_date < $cdate ){
                                                    ?>
                                                        <td><input type="submit" name="drop" class="btn btn-danger active" value="Drop"></td>
                                                    <?php
                                                    } 
                                                }
                                                
                                            }
                                            
                                            ?>  
                                        </form>
                                    </tr>
                                    <?php
                                }
                                ?>
                                
                            </table>
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