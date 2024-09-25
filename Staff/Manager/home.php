<?php

include('connection.php');
session_start();
//*** */
//from password change
echo @$_SESSION['success'];
unset($_SESSION['success']);
//----------------------------------------
$id = $_SESSION['ID'];
$sql = "SELECT * from employee_information where emp_ID = '$id'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$sex = $row['sex'];
if($sex == "Male"){
    $name = "Mr.";
}else{
    $name = "Ms.";
}

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
        <link rel="stylesheet" href="home.css">
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
                    <li class="mymenu-current"><a href="home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    
                    <li class="mymenu-item drop"><a href="userEmployee.php" class="mymenu-link"><i class="fa-solid fa-users"></i>User <i class="fa-solid fa-caret-down" id="last"></i></a>
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
    <section id="mybody">
        <div><!-- section -->
                <div class="user">
                    <h4>Wellcome <?php echo $name . " " . $row['first_name'] . " " . $row['last_name']; ?></h4>
                    <p>Manager of Lucy Hotel</p>
                </div>
                <div class="logo-body">
                    <img src="../../image/lucy-hotel_logo3.svg" alt=" lucy hotel logo">
                    <h1>Lucy Hotel</h1>
                    <h4>Cradle of Lexury</h4>
                </div>
            </div>
    </section>
        
        <div class="footer">
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div>
    </body>
</html>