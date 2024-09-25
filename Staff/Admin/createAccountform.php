<?php
session_start();
    echo @$_SESSION['msg'];
    unset($_SESSION['msg']);
        
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
                    <li class="mymenu-current drop"><a href="manageWorker.php" class="mymenu-link">User Account <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="manageWorker.php" class="mymenu-link">Manage Account</a></li>
                            <li class="dropitem lastitem"><a href="activateAccount.php" class="mymenu-link">Activate/Deactivate Account</a></li>
                            <li class="dropitem lastitem"><a href="createAccountform.php" class="mymenu-link">Create Account</a></li>
                        </ul>
                    </li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
        
        
        <div class="row" style="padding-top: 5px 20px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h4>User Registration Form</h4></center>
                </div>
                <form action="createAccount.php" method="post" name="myform" onsubmit="return validateform()">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="First_Name">First Name:</label>
                                    <input type="text" name="fName" class="form-control" placeholder="First Name" pattern="[A-Za-z]{3,20}"
                                    title="Name should only contain letters and should be greater than 3 and lessthan 20 e.g John" required>
                                </div>
                                <div class="form-group">
                                    <label for="Last_Name">Last Name:</label>
                                    <input type="text" name="lName" class="form-control" placeholder="Last Name" pattern="[A-Za-z]{3,20}"
                                    title="Name should only contain letters and should be greater than 3 and lessthan 20 e.g John" required>
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
                                <div class="form-group">
                                    <label for="Age">Age:</label>
                                    <input type="number" name="age" class="form-control" min="20" required>
                                </div>
                                <div class="form-group">
                                    <label for="Sex">Sex:</label><br>
                                    <input type="radio" name="sex" value="Male" checked>Male &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="sex" value="Female">Female
                                </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Date_of_Birth">Date Of Birth:</label>
                                    <input type="date" name="birthDate" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="City">City:</label>
                                    <select name="city" class="form-control" id="select2">
                                        <option value="noSelection">-- Your City --</option>
                                        <option value="Dessie">Dessie</option>
                                        <option value="Kombolcha">Kombolcha</option>
                                        <option value="Hayk">Hayk</option>
                                        <option value="Addis Abeba">Addis Abeba</option>
                                        <option value="Weldeya">Weldeya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="User_Name">User Name:</label>
                                    <input type="text" name="userName" class="form-control" placeholder="Example@123" required>
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password:</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="Confirm_Password">Confrim Password:</label>
                                    <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label for="City">Registred As:</label>
                                    <select name="type" class="form-control" id="select">
                                        <option class="selected" value="no_selection">Select User Type</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Reception">Reception</option>
                                        <option value="Chef">Chef</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="panel-footer">
                        <input type="reset" value="Cancel" class="btn btn-danger">
                        <input type="submit" value="Create" name="create" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        <div class="footer">
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div>
    </body>
</html>