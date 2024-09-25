<?php

include('connection.php');
$sql = "SELECT * from meal_order where deliver_type = 'Room' ORDER BY ID DESC";
$result = mysqli_query($db,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <title>Lucy Hotel</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="orderDelivery.css">
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
            <img src="../image/lucy-hotel_logo3.svg" alt="logo" class="my-logo-img">
            <a href="home.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>
                <ul class="mymenu">
                    <li class="mymenu-item"><a href="Home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    <li class="mymenu-item drop"><a href="manageMeal.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Meal <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="manageMeal.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Manage Meal</a></li>
                            <li class="dropitem lastitem"><a href="addMealform.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Add Meal</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-current"><a href="orderDelivery.php" class="mymenu-link"><i class="fa-solid fa-users"></i>Orders</a></li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <section id="mealOrder">
        <div><!-- section -->
            <div class="row"><!-- row -->
                <div class="col-md-3"><!-- colomn -->
                    <nav>
                        <ul>
                            <li><a href="orderDelivery.php">Deliver to Room</a></li>
                            <li><a href="bookTable.php">To a Table</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <h4>Delivery</h4>
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Room Number</th>
                            <th>Meal Item</th>
                            <th>Time</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php
                            $num = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $num++;

                                $cust_id = $row['customer_ID'];
                                $sqlS = "SELECT * from check_in where customer_ID = '$cust_id'";
                                $resultS = mysqli_query($db,$sqlS);
                                $rowS = mysqli_fetch_array($resultS);

                                //for fname and lname
                                $sqlS2 = "SELECT * from customer_information where customer_ID = '$cust_id'";
                                $resultS2 = mysqli_query($db,$sqlS2);
                                $rowS2 = mysqli_fetch_array($resultS2);
                                $fname = $rowS2['first_name'];
                                $lname = $rowS2['last_name'];
                                //---------------------------------------

                                $room_number = $rowS['room_number'];
                                ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $fname; ?></td>
                            <td><?php echo $lname; ?></td>
                            <td><?php echo $room_number; ?></td>
                            <td><?php echo $row['meal_name']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <?php 
                                if ($row['status'] == 0) {
                                    ?>
                                    <form action="acceptOrder.php" method="POST">
                                        <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                        <input type="text" name="type" value="<?php echo $row['deliver_type']; ?>" hidden>
                                        <td><button type="submit" name="accept" class="btn btn-success">Accept</button></td>
                                    </form>
                                    <?php
                                }else{
                                    ?>
                                    <td><button type="button" class="btn btn-success disabled">Accepted</button></td>
                                    <?php
                                }
                            ?>
                            <?php 
                            if ($row['status'] == 1) {
                                ?>
                                    <form action="acceptOrder.php" method="POST">
                                        <input type="text" name="id" value="<?php echo $row['ID']; ?>" hidden>
                                        <input type="text" name="cust_id" value="<?php echo $row['customer_ID']; ?>" hidden>
                                        <input type="text" name="fname" value="<?php echo $fname; ?>" hidden>
                                        <input type="text" name="lname" value="<?php echo $lname; ?>" hidden>
                                        <input type="text" name="meal" value="<?php echo $row['meal_name']; ?>" hidden>
                                        <input type="text" name="type" value="<?php echo $row['deliver_type']; ?>" hidden>
                                        <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" hidden>
                                        <input type="text" name="date" value="<?php echo $row['date']; ?>" hidden>
                                        <input type="text" name="price" value="<?php echo $row['total_price']; ?>" hidden>
                                        <td><button type="submit" name="deliver" class="btn btn-primary">Delivered</button></td>
                                    </form>
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
</html> 