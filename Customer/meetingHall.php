<?php
session_start();
include ("connection.php");
$ID = $_SESSION['ID'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lucy Hotel </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="http://localhost/lucy hotel/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="meetinghall.css">
    <style>
        table{
            border-collapse: collapse; 
            border: black 1px solid;
        }
        th,td{
            border: 1px black solid;
        }
    </style>
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
            <img src="http://localhost/lucy hotel/image/lucy-hotel_logo3.svg" alt="logo" class="my-logo-img">
            <a href="home.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                <ul class="mymenu">
                    <li class="mymenu-item"><a href="home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    <li class="mymenu-current drop"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Reservation <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Room Reservation</a></li>
                            <li class="dropitem lastitem current"><a href="meetingHall.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Meeting Hall</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-item drop"><a href="resturantHome.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-hotel"></i>Resturant<i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="resturantHome.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Home</a></li>
                            <li class="dropitem"><a href="resturantHome.php#my_specials" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Specials</a></li>
                            <li class="dropitem"><a href="resturantHome.php#id2" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Menus</a></li>
                            <li class="dropitem lastitem"><a href="viewOrder.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Orders</a></li>
                        </ul>
                    </li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <section id="body">
        <div class="container">
                    <div class="row">
                <center><p><?php echo @$_SESSION['msg'];  
                            session_unset();
                            $_SESSION['ID'] = $ID;
                ?></p></center>
                
                <div class="col-md-3 side">
                    <ul>
                        <li><a href="roomReservation.php"><i class="fa-solid fa-caret-right"></i>Room Reservation</a></li>
                        <li><a href="meetingHall.php"><i class="fa-solid fa-caret-right"></i>Meeting Hall</a></li>
                    </ul>
                </div>

                <?php
            // to know the name of the persone email and phone number
                    $sql = "SELECT first_name,last_name,sex,email,phone_number from customer_information where 
                    customer_ID = '$ID'";
                    $query = mysqli_query($db,$sql);
                    $re = mysqli_fetch_array($query);
                    $fname = $re['first_name'];
                    $lname = $re['last_name'];
                    $email = $re['email'];
                    $mobile = $re['phone_number'];
                    $sex = $re['sex'];
                    // to identify mr and ms
                    if($sex == "Male"){
                        $name = "Mr.";
                    }else{
                        $name = "Ms.";
                    }
                    // to now the number of days left
                    $room_sql = "SELECT * from hall_reservation where customer_ID = '$ID'";
                    $result = mysqli_query($db,$room_sql);

                    //for choosing what is displaing in the page
                    $numrow = mysqli_num_rows($result);
                    //--------------------------------------------------
                    if ($numrow != 0){
                        $row = mysqli_fetch_array($result);
                        $arival = $row['check_in_date'];
                        $scdate = $row['now_date'];
                        $cdate = date("m/d/y");
                            //change in to second
                            $sarival = strtotime($arival);
                            $sscdate = strtotime($scdate);
                            $sCurdate = strtotime($cdate);
                        // if condition for days
                        if ((($sarival - $sscdate)/86400) >=3) {
                            if ((($sCurdate - $sscdate)/86400) == 0) {
                                $msg = "in the next 2 days";
                            }
                            elseif ((($sCurdate - $sscdate)/86400) == 1) {
                                $msg = "until tommorow";
                            }
                            elseif ((($sCurdate - $sscdate)/86400) == 2) {
                                $msg = "today";
                            }
                            else{
                                $msg = ", but your time is up.";
                            }

                        }
                        elseif ((($sarival - $sscdate)/86400) == 2) {
                            if ((($sCurdate - $sscdate)/86400) == 0) {
                                $msg = "until tommorow";
                            }
                            elseif ((($sCurdate - $sscdate)/86400) == 1) {
                                $msg = "today";
                            }
                            else{
                                $msg = ", but your time is up.";
                            }
                        }
                        elseif ((($sarival - $sscdate)/86400) == 1) {
                            if ((($sCurdate - $sscdate)/86400) == 0) {
                                $msg = "today";
                            }
                            else{
                                $msg = ", but your time is up.";
                            }
                        }
                        // for the table
                        $event = $row['event'];
                        $days = $row['number_of_days'];
                        $price = $row['price'];
                        $total = $row['total_price'];
                        
                    }
                    
                    
                ?>
                <!-- choosing what is displaying -->
                <?php if($numrow == 1){
                    if($row['transaction'] == null && $row['check_status'] == 0){
                        ?>
                
                <div class="col-md-8"><!--colomn 2-->
                    <h4>Hall Reservation</h4>
                    <div class="row"><!--row1-->
                        <div class="col-md-6">
                            <p>Name: <?php echo $fname . " " . $lname; ?></p>
                            <p>Email: <?php echo $email; ?></p>
                            <p>Phone Number: <?php echo $mobile; ?></p>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <h4>Transaction</h4>
                                <p><?php echo $name . " " . $fname . " " . $lname . " "; ?>you must pay the money <?php echo $msg; ?> 
                                atleast 50% of the the money with the following account numbers:</p>
                                <p>CBE - 10001234567890 OR</p>
                                <p>Amhara Bank- 1345678900987 OR</p>
                                <p>Abay Bank - 543215678997667 OR</p>
                                <p>Abissiniya Bank - 543215678997667</p> 
                                <p>Warnning: you must pay by going to in the bank and take a picture of transaction paper upload it
                                    in the space down below.
                                </p>                     
                                <form action="uploadTransactionHall.php" method="post" enctype="multipart/form-data">
                                    <input type="file" name="transaction"><br>
                                    <input type="submit" name="upload" value="Upload">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th>Hall</th>
                                <th>Event</th>
                                <th>Arrival Date</th>
                                <th>Price per Day</th>
                                <th>Days</th>
                                <th rowspan="2"><button type="button">Update<br>Reservation</button></th>
                            </tr>
                            <tr>
                                <td>Lucy Hotel</td>
                                <td><?php echo $event; ?></td>
                                <td><?php echo $arival; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $days; ?></td>
                            </tr>
                            <tr>
                                <td colspan="8">Total: <?php echo $total; ?> birr</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <?php
                }
                else{
                    ?>
                
                <!--**********************************OR*************************************************-->
                
                <div class="col-md-8"><!--colomn 2-->
                    <h4>Hall Reservation</h4>
                    <div class="row"><!--row1-->
                        <div class="col-md-6">
                            <p>Name: <?php echo $fname . " " . $lname; ?></p>
                            <p>Email: <?php echo $email; ?></p>
                            <p>Phone Number: <?php echo $mobile; ?></p>
                        </div>
                        <!-- for after checking transaction in bank table -->
                        <div class="col-md-6">
                            <p><?php echo @$_SESSION['success']; 
                                session_unset();
                                $_SESSION['ID'] = $ID;
                            ?></p>
                            <?php if ($row['bank_check'] == 1 && $row['accept_status'] == 0 && $row['transaction'] == null)  {
                            ?>
                            <p><?php echo $name . " " . $fname . " " . $lname . " "; ?>the payment image you send is used before. So, your action is
                            a kind of cheating so you should not try it again if not we drop the reservation. Now you can upload the transaction image <?php echo $msg; ?> 
                            in the form below.</p>
                            <form action="uploadTransactionHall.php" method="POST" enctype="multipart/form-data">
                                <input type="file" name="transaction"><br>
                                <input type="submit" name="upload" value="Upload">
                            </form>  
                            <?php
                            } elseif($row['bank_check'] == 1 && $row['accept_status'] == 1){
                            ?>   
                            <p><?php echo $name . " " . $fname . " " . $lname . " "; ?>the hotel accept your reservation successfully 
                            we will wait you at the hotel in <?php echo $arival . " "; ?>have a good time.</p>  
                            <?php 
                            }?>
                        </div>


                    </div>
                    <div class="row">
                        <table class="table">
                            <tr>
                                <th>Hall</th>
                                <th>Event</th>
                                <th>Arrival Date</th>
                                <th>Price per Day</th>
                                <th>Days</th>
                                <th rowspan="2"><button type="button">Update<br>Reservation</button></th>
                            </tr>
                            <tr>
                                <td>Lucy Hotel</td>
                                <td><?php echo $event; ?></td>
                                <td><?php echo $arival; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $days; ?></td>
                            </tr>
                            <tr>
                                <td colspan="8">Total: <?php echo $total; ?> birr</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php
                }
                } else{
                ?>
            
                <!--********************************OR***************************************************-->
                <div class="col-md-8"><!--colomn2-->
                    <h4>Hall Reservation</h4>
                    <p>There is no hall reserved</p>
                    <a href="hallReservation.php"><button class="button">Reserve now</button></a>
                </div>
                <style>
                .button{
                background-color: transparent;
                color: #ffce14;
                font-weight: bold;
                border: 2px solid #ffce14;
                padding: 5px 20px;
            }
            .button:hover{
                background-color: #ffce14;
                color: #0f2453;
            }
        </style>
                <?php
                }?>
                <!--********************************OR***************************************************-->
            </div>
            </div>
        </div>
    
    </section>
    
    <section id="information">
            <div class="row">
                <div class="col-md-4 address">
                    <h3>Lucy Hotel</h3>
                    <p><i class="fa-solid fa-location-dot"></i> Menafesha, Buanbuha <br>
                         Wollo, Dessie<br>
                          Ethiopia <br><br>
                        <i class="fa-solid fa-phone"></i> +251 333 119107<br>
                        <i class="fa-solid fa-envelope"></i> <a href="">lucyHotel@gmail.com</a><br></p>
                </div>
                <div class="col-md-4 mylinks">
                    <h4>Useful links</h4>
                    <ul>
                        <li><a href="home.php"><i class="fa-solid fa-caret-right"></i> Home</a></li>
                        <li><a href="about.html"><i class="fa-solid fa-caret-right"></i> About us</a></li>
                        <li><a href="services.html"><i class="fa-solid fa-caret-right"></i> Services</a></li>
                        <li><a href="#"><i class="fa-solid fa-caret-right"></i> Term of Service</a></li>
                        <li><a href="#"><i class="fa-solid fa-caret-right"></i> privacy policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mywebs">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i> twitter.com</a></li>
                        <li><a href="https://www.facebook.com/lucyhoteldessie/"><i class="fa-brands fa-facebook"></i> facebook.com</a></li>
                        <li><a href="https://www.instagram.com/lucy_hoteldessie/"><i class="fa-brands fa-instagram"></i> instagram.com</a></li>
                    </ul>
                </div>
            </div>
            
        </section>
        
        <div class="footer">
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div>
</body>
</html>