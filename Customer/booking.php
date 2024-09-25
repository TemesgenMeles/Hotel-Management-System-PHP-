<?php
include ('connection.php');
session_start();
$constant_stand = 0;
$constant_delux = 0;
$constant_presd = 0;

$checkin = $_SESSION['check_in'];
$checkout = $_SESSION['check_out']; 
$person = $_SESSION['person'];

$standared_book = "SELECT * from standared_room where status='1'";
$standared_result = mysqli_query($db,$standared_book);
$standared_numrow = mysqli_num_rows($standared_result);

$deluxe_book = "SELECT * from deluxe_room where status='1'";
$deluxe_result = mysqli_query($db,$deluxe_book);
$deluxe_numrow = mysqli_num_rows($deluxe_result);

$presdential_book = "SELECT * from presidential_room where status='1'";
$presdential_result = mysqli_query($db,$presdential_book);
$presdential_numrow = mysqli_num_rows($presdential_result);
//for standared room
if(isset($_POST['booking_standared'])){
    $_SESSION['room-type'] = "Standared";
    

    $book = "SELECT * from standared_room where status='1'";
    $result = mysqli_query($db,$book);
    $numrow = mysqli_num_rows($result);
    

    $sql = "SELECT * from room_reservation where room_type = 'Standared'";
    $result = mysqli_query($db,$sql);
    $num = 0;
    while ($row = mysqli_fetch_array($result)) {
        if($checkin < $row['check_in_date']){
            if($checkout > $row['check_in_date']){
                if($row['number_of_room'] == 1){
                   $num++; 
                }
                elseif($row['number_of_room'] == 2){
                    $num = $num + 2;
                }
                else{
                    $num = $num + 3;
                }
                
            }
        }
        elseif ($checkin > $row['check_in_date']) {
            if ($checkin <= $row['check_out_date']) {
                if($row['number_of_room'] == 1){
                    $num++; 
                 }
                 elseif($row['number_of_room'] == 2){
                     $num = $num + 2;
                 }
                 else{
                     $num = $num + 3;
                 }
            }
        }else{
            if($row['number_of_room'] == 1){
                $num++; 
             }
             elseif($row['number_of_room'] == 2){
                 $num = $num + 2;
             }
             else{
                 $num = $num + 3;
             }
        }
    }

    if ($num < $numrow) {
        header("Location: http://localhost/lucy hotel/Customer/home.php");
    }
    else{
        $msg = "sorry we are out of standared room";
        $constant_stand = 1;
    }
}
//for deluxe room
if(isset($_POST['booking_deluxe'])){
    $_SESSION['room-type'] = "Deluxe";

    $book = "SELECT * from deluxe_room where status='1'";
    $result = mysqli_query($db,$book);
    $numrow = mysqli_num_rows($result);
    

    $sql = "SELECT * from room_reservation where room_type = 'Deluxe'";
    $result = mysqli_query($db,$sql);
    $num = 0;
    while ($row = mysqli_fetch_array($result)) {
        if($checkin < $row['check_in_date']){
            if($checkout > $row['check_in_date']){
                if($row['number_of_room'] == 1){
                   $num++; 
                }
                elseif($row['number_of_room'] == 2){
                    $num = $num + 2;
                }
                else{
                    $num = $num + 3;
                }
                
            }
        }
        elseif ($checkin > $row['check_in_date']) {
            if ($checkin <= $row['check_out_date']) {
                if($row['number_of_room'] == 1){
                    $num++; 
                 }
                 elseif($row['number_of_room'] == 2){
                     $num = $num + 2;
                 }
                 else{
                     $num = $num + 3;
                 }
            }
        }else{
            if($row['number_of_room'] == 1){
                $num++; 
             }
             elseif($row['number_of_room'] == 2){
                 $num = $num + 2;
             }
             else{
                 $num = $num + 3;
             }
        }
    }

    if ($num < $numrow) {
        header("Location: http://localhost/lucy hotel/Customer/home.php");
    }
    else{
        $msg = "sorry we are out of Deluxe room";
        $constant_delux = 1;
    }
}
//for presdential room
if(isset($_POST['booking_presdential'])){
    $_SESSION['room-type'] = "Presdential";

    $book = "SELECT * from presidential_room where status='1'";
    $result = mysqli_query($db,$book);
    $numrow = mysqli_num_rows($result);
    

    $sql = "SELECT * from room_reservation where room_type = 'Presdential'";
    $result = mysqli_query($db,$sql);
    $num = 0;
    while ($row = mysqli_fetch_array($result)) {
        if($checkin < $row['check_in_date']){
            if($checkout > $row['check_in_date']){
                if($row['number_of_room'] == 1){
                   $num++; 
                }
                elseif($row['number_of_room'] == 2){
                    $num = $num + 2;
                }
                else{
                    $num = $num + 3;
                }
                
            }
        }
        elseif ($checkin > $row['check_in_date']) {
            if ($checkin <= $row['check_out_date']) {
                if($row['number_of_room'] == 1){
                    $num++; 
                 }
                 elseif($row['number_of_room'] == 2){
                     $num = $num + 2;
                 }
                 else{
                     $num = $num + 3;
                 }
            }
        }else{
            if($row['number_of_room'] == 1){
                $num++; 
             }
             elseif($row['number_of_room'] == 2){
                 $num = $num + 2;
             }
             else{
                 $num = $num + 3;
             }
        }
    }

    if ($num < $numrow) {
        header("Location: http://localhost/lucy hotel/Customer/home.php");
    }
    else{
        $msg = "sorry we are out of presdential room";
        $constant_presd = 1;
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
    <link rel="stylesheet" href="mystyle.scss">
    <link rel="stylesheet" href="booking.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

</head>
<body>
<header>
    <nav>
        <img src="image/lucy-hotel_logo3.png" alt="logo" class="my-logo-img">
            <a href="index.php" class="mylogo">lucy hotel<span>cradle of lexury</span></a>    
            <ul class="mymenu">
                <li class="mymenu-item"><a href="home.php" class="mymenu-link"><i class="fa-solid fa-caret-left"></i>Back</a></li>
            </ul> 
    </nav>
</header>
    <div class="mycontainer">
        <div class="info">
            <p>Check_in Date: <?php echo $checkin; ?></p>
            <p>Check_out Date: <?php echo $checkout; ?></p>
            <p>Person: <?php echo $person; ?></p>
        </div>
        <div class="row">
                <!-- standared room -->
                <?php 
                echo @$msg;
                    if ($constant_stand == 0) {
                ?>
                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="http://localhost/lucy hotel/image/standared room.jpg" alt="Standared Room" width="100%" height="200px">
                        </div>
                        <div class="panel-body">
                            <h2>Standared Rooms</h2>
                            <?php 
                            $row_stand = mysqli_fetch_array($standared_result);
                            ?>
                            <p><span><?php echo $row_stand['price']; ?></span> birr / perDay <span class="right"><?php echo $standared_numrow; ?> total rooms</span></p>
                        </div>
                        <div class="panel-footer">
                            <form action="booking.php" method="POST">
                                <button type="submit" name="booking_standared" class="button"><i class="fa-sharp fa-solid fa-list-check"></i>Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                    <?php
                }
                ?>
                <?php 
                    if ($constant_presd == 0) {
                ?>
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="http://localhost/lucy hotel/image/presdential room2.jpg" alt="presidential Room" width="100%" height="200px">
                        </div>
                        <div class="panel-body">
                            <h2>Presdential Rooms</h2>
                            <?php 
                            $row_pres = mysqli_fetch_array($presdential_result);
                            ?>
                            <p><span><?php echo $row_pres['price']; ?></span> birr / perDay <span class="right"><?php echo $presdential_numrow; ?> total rooms</span></p>
                        </div>
                        <div class="panel-footer">
                            <form action="booking.php" method="POST">
                                <button type="submit" name="booking_presdential" class="button"><i class="fa-sharp fa-solid fa-list-check"></i>Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                    <?php
                }
                ?>
                <!-- deluxe room -->
                <?php 
                    if ($constant_delux == 0) {
                ?>
                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="http://localhost/lucy hotel/image/deluxe room.jpg" alt="Deluxe Room" width="100%" height="200px">
                        </div>
                        <div class="panel-body">
                            <h2>Deluxe Rooms</h2>
                            <?php 
                            $row_delu = mysqli_fetch_array($deluxe_result);
                            ?>
                            <p><span><?php echo $row_delu['price']; ?></span> birr / perDay <span class="right"><?php echo $deluxe_numrow; ?> total rooms</span></p>
                        </div>
                        <div class="panel-footer">
                            <form action="booking.php" method="POST">
                                <button type="submit" name="booking_deluxe" class="button"><i class="fa-sharp fa-solid fa-list-check"></i>Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                
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