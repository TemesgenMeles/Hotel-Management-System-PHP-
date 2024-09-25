<?php

include ('connection.php');

$sql_stand = "SELECT * from standared_room";
$stand_res = mysqli_query($db,$sql_stand);


$sql_delu = "SELECT * from deluxe_room";
$delu_res = mysqli_query($db,$sql_delu);


$sql_presd = "SELECT * from presidential_room";
$presd_res = mysqli_query($db,$sql_presd);


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
        <link rel="stylesheet" href="room.css">
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
    <section id="manageroom">
        <div class="row"><!-- row -->
                <div class="col-md-3"><!-- colomn -->
                    <nav>
                        <ul>
                            <li><a href="room.php">Manage Room</a></li>
                            <li><a href="#">Available Room</a></li>
                            <li><a href="addRoom.php">Add Room</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9"><!-- colomn 2 -->
                    <h4>Manage Room</h4>
                    <div><!-- table -->
                        <table class="table">
                            <tr>
                                <th>Room Number</th>
                                <th>Room Type</th>
                                <th>Price</th>
                                <th colspan="3">Action</th>
                            </tr>
                            <?php
                                while ($stand_row = mysqli_fetch_array($stand_res)) {
                                    ?>
                            <tr>
                                <td><?php echo $stand_row['room_number']; ?></td>
                                <td><?php echo $stand_row['room_type']; ?></td>
                                <td><?php echo $stand_row['price']; ?></td>
                                <form action="editRoom.php" method="POST">
                                    <input type="text" name="room_ID" value="<?php echo $stand_row['room_number']; ?>" hidden>
                                    <input type="text" name="room_type" value="<?php echo $stand_row['room_type']; ?>" hidden>
                                    <td><button type="submit" name="edit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></td>
                                </form>
                                <?php if ($stand_row['status'] == 1) {
                                    ?>
                                <form action="disableRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $stand_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $stand_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="disable" class="btn btn-danger"><i class="fa-solid fa-bed"></i> Disable</button></td>
                                </form>
                                    <?php
                                }else{
                                    ?>
                                <form action="enableRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $stand_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $stand_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="enable" class="btn btn-success"><i class="fa-solid fa-bed"></i> Enable</button></td>
                                </form>
                                    <?php
                                } ?>
                                <form action="deleteRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $stand_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $stand_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="delete" onclick="alert('are you sure')" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i> Delete</button></td>
                                </form>
                            </tr>
                                    <?php
                                }
                            
                                while ($delu_row = mysqli_fetch_array($delu_res)) {
                                    ?>
                            <tr>
                                <td><?php echo $delu_row['room_number']; ?></td>
                                <td><?php echo $delu_row['room_type']; ?></td>
                                <td><?php echo $delu_row['price']; ?></td>
                                <form action="editRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $delu_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $delu_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="edit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></td>
                                </form>
                                <?php if ($delu_row['status'] == 1) {
                                    ?>
                                <form action="disableRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $delu_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $delu_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="disable" class="btn btn-danger"><i class="fa-solid fa-bed"></i> Disable</button></td>
                                </form>
                                    <?php
                                }else{
                                    ?>
                                <form action="enableRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $delu_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $delu_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="enable" class="btn btn-success"><i class="fa-solid fa-bed"></i> Enable</button></td>
                                </form>
                                    <?php
                                } ?>
                                <form action="deleteRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $delu_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $delu_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="delete" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i> Delete</button></td>
                                </form>
                            </tr>
                                    <?php
                                }
                            
                                while ($presd_row = mysqli_fetch_array($presd_res)) {
                                    ?>
                            <tr>
                                <td><?php echo $presd_row['room_number']; ?></td>
                                <td><?php echo $presd_row['room_type']; ?></td>
                                <td><?php echo $presd_row['price']; ?></td>
                                <form action="editRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $presd_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $presd_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="edit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button></td>
                                </form>
                                <?php if ($presd_row['status'] == 1) {
                                    ?>
                                <form action="disableRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $presd_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $presd_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="disable" class="btn btn-danger"><i class="fa-solid fa-bed"></i> Disable</button></td>
                                </form>
                                    <?php
                                }else{
                                    ?>
                                <form action="enableRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $presd_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $presd_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="enable" class="btn btn-success"><i class="fa-solid fa-bed"></i> Enable</button></td>
                                </form>
                                    <?php
                                } ?>
                                
                                
                                <form action="deleteRoom.php" method="POST">
                                    <input type="text" name="room_type" value="<?php echo $presd_row['room_type']; ?>" hidden>
                                    <input type="text" name="room_ID" value="<?php echo $presd_row['room_number']; ?>" hidden>
                                    <td><button type="submit" name="delete" onclick="alert('are you sure')" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i> Delete</button></td>
                                </form>
                            </tr>
                                    <?php
                                }
                            ?>
                            
                        </table>
                    </div>
                </div>
            </div>
    </section>
        
        <div>
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div>
    </body>
</html>