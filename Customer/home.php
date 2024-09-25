
<?php
include('connection.php');
session_start();
$ID = $_SESSION['ID'];
    $sql = "SELECT * from replay_msg where customer_ID = '$ID'";
    $result = mysqli_query($db,$sql);
    $num = mysqli_num_rows($result);
echo @$_SESSION['comment_msg'];
unset($_SESSION['comment_msg']);
if(@$_SESSION['check_in'] && @$_SESSION['room-type']){
    header("Location: http://localhost/lucy hotel/Customer/roomReservationInsert.php");
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
    <div><?php  echo @$_SESSION['success']; unset($_SESSION['success']); ?></div> 
    <header class="topmenu">
        <nav>
            <ul>
                <li class="topitem" style="padding-right: 20px;"><a href="messages.php"><i class="fa-solid fa-comment"></i><span class="badge" style="background-color:darkred;color:white"><?php echo $num; ?></span></a></li>
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
                    <li class="mymenu-current"><a href="home.php" class="mymenu-link"><i class="fa-sharp fa-solid fa-house-chimney"></i>Home</a></li>
                    <li class="mymenu-item drop"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-file-circle-check"></i>Reservation <i class="fa-solid fa-caret-down" id="last"></i></a>
                        <ul class="mydropdown">
                            <li class="dropitem"><a href="roomReservation.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Room Reservation</a></li>
                            <li class="dropitem lastitem"><a href="meetingHall.php" class="mymenu-link"><i class="fa-solid fa-caret-right"></i>Meeting Hall</a></li>
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
        <div class="logo-body">
            <img src="http://localhost/lucy hotel/image/lucy-hotel_logo3.svg" alt=" lucy hotel logo">
            <h1>Lucy Hotel</h1>
            <h4>Cradle of Lexury</h4>
            <p>Stay with friends and families</p>
            <p>come and enjoy precious moment with us</p>
            <button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                Read More</button>
        </div>
        
    </section>
    <!-- Read more modal value -->
<!-- for read more modals -->
<div id="id01" class="modal">
    <div class="modal-content">
        <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="http://localhost/lucy hotel/image/lucy-hotel_logo3.svg" alt=" lucy hotel logo"><h3>lucy hotel</h3>
        <img src="http://localhost/lucy hotel/image/lu.jpg" alt="hotel image" class="hotel_image">
        </div>

        <div class="notecontainer">
            <h4>we know what you love</h4>
            <p>Providing guests unique and enchanting views from their rooms with its exceptional amenities, 
                makes Lucy Hotel one of bests in its kind.
                Try our food menu, awesome services and friendly staff while you are here.</p>
        </div>
    </div>
    </div>
        

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <section id="body2">
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
                    <div class="aa">
                        <h4>Give Us your Comment</h4>
                        <form action="comment.php" method="POST">
                            <textarea name="comment" id="comment" cols="30" rows="7" placeholder="Comment"></textarea><br>
                            <input type="submit" name="send" value="Send" class="button">
                        </form>
                    </div>
                    
                </div>
            </div>
            
        </section>
        
        <div class="footer">
            <div>&copy; copyright <strong>Lucy hotel.</strong> All right reserved.</div>
            <div>Designed by <a href="#"> IT Students</a>, Wollo universty, Ethiopia.</div>
        </div> 
    </section>
    </body>
</html>