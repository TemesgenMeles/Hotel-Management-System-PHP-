<?php
include ('connection.php');
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
    <link rel="stylesheet" href="vieworder.css">
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
                    <li class="mymenu-item drop"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Reservation <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Room Reservation</a></li>
                            <li class="dropitem lastitem"><a href="meetingHall.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Meeting Hall</a></li>
                        </ul>
                    </li>
                    <li class="mymenu-current drop"><a href="resturantHome.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-hotel"></i>Resturant<i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="resturantHome.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Home</a></li>
                            <li class="dropitem"><a href="resturantHome.php#my_specials" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Specials</a></li>
                            <li class="dropitem"><a href="resturantHome.php#id2" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Menus</a></li>
                            <li class="dropitem lastitem current"><a href="viewOrder.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Orders</a></li>
                        </ul>
                    </li>
                    <li class="logout_button"><a href="logout.php" class="logout-link"><button type="button" class="mymenu-button"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Logout</button></a></li>
                </ul>
        </nav>
    </header>
    <header id="header_resturant">
        <nav>
            <h1><a href="resturantHome.php#" class="resturantlogo">Resturant</a></h1>
                <ul class="resturant_menu">
                    <li class="rest_item"><a href="resturantHome.php#" class="rest_link">Home</a></li>
                    <li class="rest_item"><a href="resturantHome.php#my_specials" class="rest_link">Specials</a></li>
                    <li class="rest_item"><a href="resturantHome.php#id2" class="rest_link">Menu</a></li>
                    <li class="rest_curent_item"><a href="viewOrder.php" class="rest_link">Order</a></li>
                    <li class="rest_item"><a href="resturantHome.php#book_a_table" class="rest_button"><button>Book A Table</button></a></li>
                </ul>
        </nav>
    </header>
    <div class="row">
    <?php echo @$_SESSION['msg'];
    session_unset();
   $_SESSION['ID'] = $ID;
   ?>
        <div>
            <h4>My Orders</h4>
            <?php  
            $name_sql = "SELECT * from customer_information where customer_ID  = '$ID'";
            $name_result = mysqli_query($db,$name_sql);
            $name_row = mysqli_fetch_array($name_result);

            $fname = $name_row['first_name'];
            $lname = $name_row['last_name'];
            $sex = $name_row['sex'];
            // to identify mr and ms
            if($sex == "Male"){
                $name = "Mr.";
            }else{
                $name = "Ms.";
            }

            $sql = "SELECT * from meal_order where customer_ID = '$ID'";
            $result = mysqli_query($db,$sql);
            $numrow = mysqli_num_rows($result);
            if($numrow == 0){
            ?>
            <p>There is no order here</p>
            <a href="resturantHome.php#id2"><button>Order Now</button></a>
            <?php
            }
            elseif($numrow == 1){
                $row = mysqli_fetch_array($result);

            $mname = $row['meal_name'];
            $quantity = $row['quantity'];
            $total_price = $row['total_price'];
            $delivery = $row['deliver_type'];
            if($delivery == "Room"){
                $del_msg = "to your room. We will deliver it to your room shortly.";
            }
            else{
                $del_msg = "to the table. We will waiting you in the resturant.";
            }
                ?>
                <p><?php echo $name." ". $fname." ". $lname." ";?>you order<?php echo " ".$quantity." ".$mname." ".$del_msg;?></p>
                <p>Total price: <?php echo $total_price; ?> birr</p>
            
            
                <?php
            } else{
                ?>
                <p><?php echo $name." ". $fname." ". $lname." ";?>you order<?php
                $total_price = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $mname = $row['meal_name'];
                    $quantity = $row['quantity'];
                    $total_price = $total_price + $row['total_price'];
                    echo " ".$quantity." ".$mname.", ";
                }?> we deliver it to you shortly</p>
                <p>Total price: <?php echo $total_price; ?> birr</p>
                
                <?php
            } 
            ?>
        </div>
    </div>
    <div class="footer">
        <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
        <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
    </div>
</body>
</html>