<?php
session_start();
$ID = $_SESSION['ID'];
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
        <link rel="stylesheet" href="rigisterForm.css">
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
                    <li class="mymenu-current"><a href="registerForm.php" class="mymenu-link"><i class="fa-solid fa-address-card"></i>Register</a></li>
                    <li class="mymenu-item drop"><a href="reservaationRoom.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Reservation <i class="fa-solid fa-caret-down" id="last"></i></a>
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
    <section id="form">
        <div><!-- section -->
                <div class="row">
                    <?php echo @$_SESSION['register_msg']; 
                        unset($_SESSION['register_msg']);
                    ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading ">
                            <center><h4>Customers Registration Form</h4></center>
                        </div>
                        <form action="register.php" method="post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="First_Name">First Name:</label>
                                            <input type="text" name="fName" class="form-control" placeholder="First Name" pattern="[A-Za-z]{3,20}"
                                            title="Name should only contain letters and should be greater than 3 and lessthan 20 e.g John" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="Last_Name">Last Name:</label>
                                            <input type="text" name="lName" class="form-control" placeholder="Last Name" pattern="[A-Za-z]{3,20}"
                                            title="Name should only contain letters and should be greater than 3 and lessthan 20 e.g John" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Sex" class="col-md-1">Sex:</label><br>
                                            <div class="col-md-6">
                                                <input type="radio" name="sex" value="Male" checked> Male &nbsp;&nbsp;&nbsp;&nbsp;<br>
                                                <input type="radio" name="sex" value="Male"> Female
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="Email">Email:</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email" pattern='^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,
                                        ;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$'
                                         title="email should be in correct format e.g example@gmail.com" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Phone_Number">Phone Number:</label>
                                            <input type="text" name="PhoneNum" class="form-control" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Country">Country:</label>
                                            <input type="text" name="country" class="form-control" pattern="[A-Za-z]{2,20}"
                                            title="only contain letters and should be greater than 3 and lessthan 20 character e.g Ethiopia" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="City">City:</label>
                                            <input type="text" name="city" class="form-control" placeholder="Your City" pattern="[A-Za-z]{2,15}"
                                            title="e.g Dessie" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Nationality">Nationality:</label>
                                            <input type="text" name="nationality" class="form-control" pattern="[A-Za-z]{2,20}"
                                         title="only contain letters and should be greater than 3 and lessthan 20 character e.g Ethiopia" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Checkout">Checkout Date:</label>
                                            <input type="date" name="checkout" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Room">Room:</label>
                                            <select name="room" class="form-control">
                                                <option value="Standared">Standared</option>
                                                <option value="Presidential">Presidential</option>
                                                <option value="Deluxe">Deluxe</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="persons">Persons:</label>
                                            <input type="number" name="persons" min="1" max="5" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            <div class="panel-footer">
                                <button type="submit" name="register" class="btn btn-primary form-control">Register</button>
                                <button type="reset" name="cancel" class="btn btn-danger form-control">Cancel</button>
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