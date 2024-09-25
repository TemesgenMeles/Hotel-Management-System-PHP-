<?php

include ('connection.php');
if(isset($_POST['submit'])){
    $room_num = $_POST['roomNumber'];
    $room_type = $_POST['roomType'];
    $price = $_POST['price'];

    if($room_type == "Standared"){
        $name = "standared_room";
    }elseif ($room_type == "Deluxe") {
        $name = "deluxe_room";
    }else{
        $name = "presidential_room";
    }

    $sql = "INSERT INTO $name values('$room_num' , '$room_type' , '$price' , 1 , 0)";
    $result = mysqli_query($db,$sql);
    if($result){
        echo "<script>alert ('room successfully added');</script>";
    }else{
        echo "<script>alert ('Room number can not be duplicate');</script>";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Lucy Hotel </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
        <link rel="stylesheet" href="navigation.css">
        <link rel="stylesheet" href="addroom.css">
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
    <section id="addroom">
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
            <div class="col-md-8"><!-- colomn -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4>Room Add Form</h4>
                    </div>
                    <form action="addRoom.php" class="form-horizontal" method="POST">
                        <div class="panel-body">    
                            <div class="form-group">
                                <label for="Room number" class="control-label col-sm-3">Room Number:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="roomNumber" class="form-control">
                                </div>
                            </div>   
                            <div class="form-group">
                                <label for="Room type" class="control-label col-sm-3">Room Type:</label>
                                <div class="col-sm-4">
                                    <select name="roomType" class="form-control">
                                        <option value="Presdential">Presdential</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="Standared">Standared</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label for="Price" class="control-label col-sm-3">Price:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="price" class="form-control">
                                </div>
                            </div>     
                        </div>
                        <div class="panel-footer">
                            <center><input type="submit" name="submit" value="Add" class="btn btn-success"></center>  
                        </div>
                    </form>
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